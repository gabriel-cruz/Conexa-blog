<?php if (!empty($GET['tag'])) : ?>
	<h1> Posts com <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
	'template' => "{items}\n{pager}",
	'htmlOptions'=>array('class'=>'border'),

)); ?>