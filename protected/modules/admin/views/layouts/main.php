<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <span id="stripe">&nbsp;</span>

        <div class="container">
            <div id="mainmenu">
                <?php
                if(Yii::app()->user->isGuest){
                        $this->widget('bootstrap.widgets.TbNavbar', array(
                            'fixed' => false,
                            'brand' => 'Jfinder Admin',
                            'brandUrl' => Yii::app()->createAbsoluteUrl('/admin'),
                            'brandOptions' => array(
                                'id' => 'brand'
                            ),
                            'fluid' => true,
                            'collapse' => true,
                            'items' => array(
                                array(
                                    'class' => 'bootstrap.widgets.TbMenu',
                                    'items' => array(),
                                ),
                               ))
                        );
                }
                else{
                        $this->widget('bootstrap.widgets.TbNavbar', array(
                            'fixed' => false,
                            'brand' => 'Dashboard',
                            'brandUrl' => Yii::app()->createAbsoluteUrl('/admin'),
                            'brandOptions' => array(
                                'id' => 'brand'
                            ),
                            'fluid' => true,
                            'collapse' => true,
                            'items' => array(
                                array(
                                    'class' => 'bootstrap.widgets.TbMenu',
                                    'items' => array(
                                        array('label' => 'Home',
                                            'url' => array('/admin/dashboard/index'),
                                            'active' => Yii::app()->controller->id == 'index'),
                                        array('label' => 'Users',
                                            'url' => array('/admin/user/index'),
                                            'active' => Yii::app()->controller->id == 'user'),
                                        array('label' => 'Company',
                                            'url' => array('/admin/company/index'),
                                            'active' => Yii::app()->controller->id == 'company'),
                                        array('label' => 'Jobs',
                                            'url' => array('/admin/Jobs/index'),
                                            'active' => Yii::app()->controller->id == 'jobs'),
                                        array('label' => 'Terms',
                                            'url' => array('/admin/JobTerms/index'),
                                            'active' => Yii::app()->controller->id == 'jobTerms'),
                                        array('label' => 'Logout',
                                            'url' => array('/site/logout'),
                                            ),
        //                                array('label' => 'Users',
        //                                    'url' => array('/admin/default/demo3'),
        //                                    'active' => Yii::app()->controller->action->id == 'demo3'),
        //                                array('label' => 'Users',
        //                                    'url' => array('/admin/default/demo4'),
        //                                    'active' => Yii::app()->controller->action->id == 'demo4'),
                                    ),
                                ),
                                '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                            ))
                        );
                }
                ?>
            </div><!-- mainmenu -->
            <div id="page">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>

                <?php echo $content; ?>

                <div class="clear"></div>

                <div class="row">
                    <div class="span12" id="footer">
                        Copyright &copy; <?php echo date('Y'); ?> by <?php echo CHtml::encode(Yii::app()->name); ?>.<br/>
                        All Rights Reserved.<br/>
                    </div><!-- footer -->
                </div>
            </div><!-- page -->
        </div><!-- page -->
    </body>
</html>