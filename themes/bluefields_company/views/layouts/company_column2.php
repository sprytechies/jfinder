<?php $this->beginContent('//layouts/main'); ?>

           <?php echo $content;?>
<?php  $this->widget("application.modules.company.components.CompanyWidget");?>
<?php $this->endContent(); ?>
