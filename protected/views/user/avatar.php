<?php
/* @var $this UserController */
/* @var $model User */
?>
<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::errorSummary($model->avatar) ?>
<?php echo CHtml::activeFileField($model->avatar, 'image'); ?>
<?php echo CHtml::submitButton();?>
<?php echo CHtml::hiddenField("newAvatar");?>
<?php echo CHtml::endForm();?>

<?php if(!$model->avatar->isNewRecord)$this->widget("CutAvatar",array("model"=>$model->avatar))?>



