<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::errorSummary($model) ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<?php echo CHtml::submitButton();?>
<?php echo CHtml::endForm();?>