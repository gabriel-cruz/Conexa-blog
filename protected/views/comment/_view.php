<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('comn_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->comn_id), array('view', 'id'=>$data->comn_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comn_content')); ?>:</b>
	<?php echo CHtml::encode($data->comn_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />


</div>