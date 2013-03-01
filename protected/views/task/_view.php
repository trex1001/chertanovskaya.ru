<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creatorId')); ?>:</b>
	<?php echo CHtml::encode($data->creatorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datetimeOfCreate')); ?>:</b>
	<?php echo CHtml::encode($data->datetimeOfCreate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datetimeOfUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->datetimeOfUpdate); ?>
	<br />


</div>