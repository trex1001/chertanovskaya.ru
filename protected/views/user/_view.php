<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datetimeOfCreate')); ?>:</b>
	<?php echo CHtml::encode($data->datetimeOfCreate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datetimeOfUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->datetimeOfUpdate); ?>
	<br />


</div>