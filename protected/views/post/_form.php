<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title', array('class'=>'my-2')); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>100, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content', array('class'=>'my-2')); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags', array('class'=>'my-2')); ?>
		<?php echo $form->textField($model,'tags', array('size'=>10,'maxlength'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author', array('class'=>'my-2')); ?>
		<?php echo $form->textField($model,'author', array('size'=>10,'maxlength'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Postar' : 'Save', array('class'=>'my-3 btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->