'use strict';
var sendChannel;
var sendButton = document.getElementById("sendButton");
var sendTextarea = document.getElementById("dataChannelSend");
var receiveTextarea = document.getElementById("dataChannelReceive");
var hangButton = document.getElementById("hangButton");
sendButton.onclick = sendData;
hangButton.onclick = dieWindow;
/////////////////////////////////////////////
//alert(url.substring(url.indexOf("?")));
// input room name
//var room = prompt("Enter room name:");
//if (room === '') {
    var qrStr = window.location.search;
    var room = qrStr.split("?")[1].split("&")[2].split("=")[1];
    var idjobsapplied = qrStr.split("?")[1].split("&")[1].split("=")[1];
  
//} 

var isChannelReady;
var isInitiator = false;
var isStarted = false;
var localStream;
var pc;
var remoteStream;
var turnReady;
    if (window.webkitRTCPeerConnection) {
        var pc_config = {'iceServers': [{'url': 'stun:stun.l.google.com:19302'}]};
        var pc_constraints = {'optional': [{'DtlsSrtpKeyAgreement': true}]};
        var sdpConstraints = {'mandatory': {
                    'OfferToReceiveAudio':true,
                    'OfferToReceiveVideo':true }};
    }
    if (window.mozRTCPeerConnection) {
        var pc_config = {'iceServers': [{'url': 'stun:23.21.150.121'}]};
        var pc_constraints = {'optional': [{'DtlsSrtpKeyAgreement': true}]};
        var sdpConstraints = {'mandatory': {
                    'OfferToReceiveAudio':true,
                    'OfferToReceiveVideo':true, 'MozDontOfferDataChannel': true }};
    }
//var pc_config = {'iceServers': [{'url': 'stun:stun.services.mozilla.com'}]};
//var pc_constraints = {'optional': [{'DtlsSrtpKeyAgreement': true}, {'RtpDataChannels': true}]};

// Set up audio and video regardless of what devices are present.
//var sdpConstraints = {'mandatory': {
//  'OfferToReceiveAudio':true,
//  'OfferToReceiveVideo':true }};

var socket = io.connect('http://localhost:8000');

if (room !== '') {
  console.log('Create or join room', room);
  socket.emit('create or join', room);
}

socket.on('created', function (room){
  console.log('Created room ' + room);
  isInitiator = true;
   
  
});

socket.on('full', function (room){
  console.log('Room ' + room + ' is full');
});

socket.on('join', function (room){
  console.log('Another peer made a request to join room ' + room);
  console.log('This peer is the initiator of room ' + room + '!');
  isChannelReady = true;
//  when sombody joins room that means interview started
   $.ajax({
        url: "http://localhost/jfinder/index.php?r=company/jobs/startInterview&idjobsapplied="+idjobsapplied,
    }).done(function() {
        //$( this ).addClass( "done" );
    });
});

socket.on('joined', function (room){
  console.log('This peer has joined room ' + room);
  isChannelReady = true;
});

socket.on('log', function (array){
  console.log.apply(console, array);
});

////////////////////////////////////////////////

function sendMessage(message){
	console.log('Client sending message: ', message);
  // if (typeof message === 'object') {
  //   message = JSON.stringify(message);
  // }
  socket.emit('message', message);
}

socket.on('message', function (message){
  console.log('Client received message:', message);
  if (message === 'got user media') {
  	maybeStart();
  } else if (message.type === 'offer') {
    if (!isInitiator && !isStarted) {
      maybeStart();
    }
    pc.setRemoteDescription(new RTCSessionDescription(message));
    doAnswer();
  } else if (message.type === 'answer' && isStarted) {
    pc.setRemoteDescription(new RTCSessionDescription(message));
  } else if (message.type === 'candidate' && isStarted) {
    var candidate = new RTCIceCandidate({
      sdpMLineIndex: message.label,
      candidate: message.candidate
    });
    pc.addIceCandidate(candidate);
  } else if (message === 'bye' && isStarted) {
    handleRemoteHangup();
  }
});

////////////////////////////////////////////////////

var localVideo = document.getElementById('localVideo');
var remoteVideo = document.getElementById('remoteVideo');

function handleUserMedia(stream) {
  console.log('Adding local stream.');
  localVideo.src = window.URL.createObjectURL(stream);
  localStream = stream;
  sendMessage('got user media');
  if(isInitiator==true){
        $.ajax({
            url: "http://localhost/jfinder/index.php?r=company/jobs/startChat&idjobsapplied="+idjobsapplied,
        }).done(function() {
            //$( this ).addClass( "done" );
        });
    }
  if (isInitiator) {
    maybeStart();
  }
}

function handleUserMediaError(error){
   console.log('getUserMedia error: ', error);
    alert(error);
    //window.open("chrome://settings/content");
}

var constraints = {video: true, audio : true};
getUserMedia(constraints, handleUserMedia, handleUserMediaError);

console.log('Getting user media with constraints', constraints);

//if (location.hostname != "localhost") {
  // requestTurn('https://computeengineondemand.appspot.com/turn?username=41784574&key=4080218913');
//}

function maybeStart() {
  if (!isStarted && typeof localStream != 'undefined' && isChannelReady) {
    createPeerConnection();
    pc.addStream(localStream);
    isStarted = true;
    console.log('isInitiator', isInitiator);
    if (isInitiator) {
        
      doCall();
       
    }
  }
}

window.onbeforeunload = function(e){
	sendMessage('bye');
}

/////////////////////////////////////////////////////////

function createPeerConnection() {
  try {
    pc = new RTCPeerConnection(null, pc_constraints);
    pc.onicecandidate = handleIceCandidate;
    pc.onaddstream = handleRemoteStreamAdded;
    pc.onremovestream = handleRemoteStreamRemoved;
    console.log('Created RTCPeerConnnection');
  } catch (e) {
    console.log('Failed to create PeerConnection, exception: ' + e.message);
    alert('Cannot create RTCPeerConnection object.');
      return;
  }
  
  try {
      // Reliable Data Channels not yet supported in Chrome
      sendChannel = pc.createDataChannel("sendDataChannel",
        {reliable: false});
      sendChannel.onmessage = handleMessage;
      trace('Created send data channel');
    } catch (e) {
      alert('Failed to create data channel. ' +
            'You need Chrome M25 or later with RtpDataChannel enabled');
      trace('createDataChannel() failed with exception: ' + e.message);
    }
    sendChannel.onopen = handleSendChannelStateChange;
    sendChannel.onclose = handleSendChannelStateChange;
    pc.ondatachannel = gotReceiveChannel;
}

function handleIceCandidate(event) {
  console.log('handleIceCandidate event: ', event);
  if (event.candidate) {
    sendMessage({
      type: 'candidate',
      label: event.candidate.sdpMLineIndex,
      id: event.candidate.sdpMid,
      candidate: event.candidate.candidate});
  } else {
    console.log('End of candidates.');
  }
}

function handleRemoteStreamAdded(event) {
  console.log('Remote stream added.');
  Example1.Timer.toggle();
  remoteVideo.src = window.URL.createObjectURL(event.stream);
  remoteStream = event.stream;
  hangButton.disabled = false;
  sendButton.disabled = false;
}

function handleCreateOfferError(event){
  console.log('createOffer() error: ', e);
}
function doCall() {
  console.log('Sending offer to peer');
  pc.createOffer(setLocalAndSendMessage, handleCreateOfferError,sdpConstraints);
}

function doAnswer() {
  console.log('Sending answer to peer.');
  try{
        pc.createAnswer(setLocalAndSendMessage, handleCreateOfferError, sdpConstraints);
  }catch(e){
    trace('createAnswer() failed with exception: ' + e.message);
  }
}

function setLocalAndSendMessage(sessionDescription) {
  // Set Opus as the preferred codec in SDP if Opus is present.
  sessionDescription.sdp = preferOpus(sessionDescription.sdp);
  pc.setLocalDescription(sessionDescription);
  console.log('setLocalAndSendMessage sending message' , sessionDescription);
  sendMessage(sessionDescription);
}

function requestTurn(turn_url) {
  var turnExists = false;
  for (var i in pc_config.iceServers) {
    if (pc_config.iceServers[i].url.substr(0, 5) === 'turn:') {
      turnExists = true;
      turnReady = true;
      break;
    }
  }
  if (!turnExists) {
    console.log('Getting TURN server from ', turn_url);
    // No TURN server. Get one from computeengineondemand.appspot.com:
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if (xhr.readyState === 4 && xhr.status === 200) {
        var turnServer = JSON.parse(xhr.responseText);
      	console.log('Got TURN server: ', turnServer);
        pc_config.iceServers.push({
          'url': 'turn:' + turnServer.username + '@' + turnServer.turn,
          'credential': turnServer.password
        });
        turnReady = true;
      }
    };
    xhr.open('GET', turn_url, true);
    xhr.send();
  }
}

function handleRemoteStreamRemoved(event) {
  console.log('Remote stream removed. Event: ', event);
}

function hangup() {
  console.log('Hanging up.');
  stop();
  $("#dataChannelReceive").append("The other person Hangs Out");
  sendMessage('bye');
}

function handleRemoteHangup() {
 	console.log('Session terminated.');
	stop();
  $("#dataChannelReceive").append("Session Terminated");
    $.ajax({
        url: "http://localhost/jfinder/index.php?r=company/jobs/endChat&idjobsapplied="+idjobsapplied+"&title="+room,
    }).done(function() {
        //$( this ).addClass( "done" );
    });
//  var newWindow = window.open('http://localhost/jfinder/index.php?r=company/jobs/endChat&idjobsapplied='+idjobsapplied,'Video', 800, 600);
//    $(newWindow.document).ready(
//    function() { newWindow.close(); }
//    );
  //send("The Other Person Hangs up");
  // isInitiator = false;
}

function stop() {
  	isStarted = false;
  // isAudioMuted = false;
  // isVideoMuted = false;
  	pc.close();
  	pc = null;
  	trace('connection closed');
    Example1.Timer.toggle();
    sendButton.disabled = true;
    hangButton.disabled = true;
}

function dieWindow() {
  console.log('Session terminated.');
  sendMessage('bye');
  $("#dataChannelReceive").append("Session Terminated");
  stop();
  //window.close()
  // isInitiator = false;
}

///////////////////////////////////////////

// Set Opus as the default audio codec if it's present.
function preferOpus(sdp) {
  var sdpLines = sdp.split('\r\n');
  var mLineIndex;
  // Search for m line.
  for (var i = 0; i < sdpLines.length; i++) {
      if (sdpLines[i].search('m=audio') !== -1) {
        mLineIndex = i;
        break;
      }
  }
  if (mLineIndex === null) {
    return sdp;
  }

  // If Opus is available, set it as the default in m line.
  for (i = 0; i < sdpLines.length; i++) {
    if (sdpLines[i].search('opus/48000') !== -1) {
      var opusPayload = extractSdp(sdpLines[i], /:(\d+) opus\/48000/i);
      if (opusPayload) {
        sdpLines[mLineIndex] = setDefaultCodec(sdpLines[mLineIndex], opusPayload);
      }
      break;
    }
  }

  // Remove CN in m line and sdp.
  sdpLines = removeCN(sdpLines, mLineIndex);

  sdp = sdpLines.join('\r\n');
  return sdp;
}

function extractSdp(sdpLine, pattern) {
  var result = sdpLine.match(pattern);
  return result && result.length === 2 ? result[1] : null;
}

// Set the selected codec to the first in m line.
function setDefaultCodec(mLine, payload) {
  var elements = mLine.split(' ');
  var newLine = [];
  var index = 0;
  for (var i = 0; i < elements.length; i++) {
    if (index === 3) { // Format of media starts from the fourth.
      newLine[index++] = payload; // Put target payload to the first.
    }
    if (elements[i] !== payload) {
      newLine[index++] = elements[i];
    }
  }
  return newLine.join(' ');
}

// Strip CN from sdp before CN constraints is ready.
function removeCN(sdpLines, mLineIndex) {
  var mLineElements = sdpLines[mLineIndex].split(' ');
  // Scan from end for the convenience of removing an item.
  for (var i = sdpLines.length-1; i >= 0; i--) {
    var payload = extractSdp(sdpLines[i], /a=rtpmap:(\d+) CN\/\d+/i);
    if (payload) {
      var cnPos = mLineElements.indexOf(payload);
      if (cnPos !== -1) {
        // Remove CN payload from m line.
        mLineElements.splice(cnPos, 1);
      }
      // Remove CN line in sdp
      sdpLines.splice(i, 1);
    }
  }

  sdpLines[mLineIndex] = mLineElements.join(' ');
  return sdpLines;
}

function sendData() {
  var data = sendTextarea.value;
  sendChannel.send(data);
  $("#dataChannelReceive").append("<div class='you' tabindex='0'><div class='user-photo'><img src='../images/chat/photo.jpg'></div><div class='user-chat'><div class='user-intro'><div class='chat-user-name'>you</div><div class='time'>"+getTime()+"</div></div><div class='user-msg'>"+data+"</div></div></div>");
  
  trace('Sent data: ' + data);
  sendTextarea.value = '';
  
  $.ajax({
        url: "http://localhost/jfinder/index.php?r=company/jobs/saveMessage",
        data:{"idjobsapplied":idjobsapplied,"message":data}
    }).done(function() {
        //$( this ).addClass( "done" );
    });
}
function getTime(){
  var currentdate = new Date(); 
  var datetime =+ currentdate.getHours() + ":"  
                + currentdate.getMinutes();
  // var datetime = currentdate.getDate() + "/"
  //               + (currentdate.getMonth()+1)  + "/" 
  //               + currentdate.getFullYear() + " @ "  
  //               + currentdate.getHours() + ":"  
  //               + currentdate.getMinutes() + ":" 
  //               + currentdate.getSeconds();

                return datetime;
}
function handleMessage(event) {
  trace('Received message: ' + event.data);
  $("#dataChannelReceive").append("<div class='other' tabindex='1'><div class='user-photo'><img src='../images/chat/photo.jpg'></div><div class='user-chat'><div class='user-intro'><div class='chat-user-name'>other</div><div class='time'>"+getTime()+"</div></div><div class='user-msg'>"+event.data+"</div></div></div>");
  //receiveTextarea.value += event.data + '\n';
}

function gotReceiveChannel(event) {
  trace('Receive Channel Callback');
  sendChannel = event.channel;
  sendChannel.onmessage = handleMessage;
  sendChannel.onopen = handleReceiveChannelStateChange;
  sendChannel.onclose = handleReceiveChannelStateChange;
}

function handleSendChannelStateChange() {
  var readyState = sendChannel.readyState;
  trace('Send channel state is: ' + readyState);
  // enableMessageInterface(readyState == "open");
}

function handleReceiveChannelStateChange() {
  var readyState = sendChannel.readyState;
  trace('Receive channel state is: ' + readyState);
  // enableMessageInterface(readyState == "open");
}

function enableMessageInterface(shouldEnable) {
    if (shouldEnable) {
    dataChannelSend.disabled = false;
    dataChannelSend.focus();
    dataChannelSend.placeholder = "";
    sendButton.disabled = false;
  } else {
    dataChannelSend.disabled = true;
    sendButton.disabled = true;
  }
}

function mergeConstraints(cons1, cons2) {
  var merged = cons1;
  for (var name in cons2.mandatory) {
    merged.mandatory[name] = cons2.mandatory[name];
  }
  merged.optional.concat(cons2.optional);
  return merged;
}