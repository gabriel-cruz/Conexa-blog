<?php
$this->breadcrumbs = array(
	$model->title,
);
$this->pageTitle = $model->title;
?>

<?php $this->renderPartial('_view', array(
	'data' => $model,
)); ?>

<div id="comments">
	<?php if ($model->commentCount >= 1) : ?>
		<h3>
			<?php echo $model->commentCount . ' comentário(s)'; ?>	
		</h3>

		<?php $this->renderPartial('_comments', array(
			'post' => $model,
			'comments' => $model->comments,
		)); ?>
	<?php endif; ?>

</div>

<div>

	<?php $this->renderPartial('/comment/_form', array(
		'model'=> $comment,
	)); ?>

</div>