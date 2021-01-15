<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'comn_content', array('class'=>'my-2')); ?>
		<?php echo $form->textArea($model,'comn_content',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'comn_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author', array('class'=>'my-2')); ?>
		<?php echo $form->textField($model,'author',array('size'=>30,'maxlength'=>30, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Comentar' : 'Save', array('class'=>'my-3 btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->