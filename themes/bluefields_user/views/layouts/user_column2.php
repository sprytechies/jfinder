<?php $this->beginContent('//layouts/main'); ?>
          <?php $this->widget("application.modules.user.components.UserWidget"); ?>
          <?php echo $content;?>
      
<?php $this->endContent(); ?>