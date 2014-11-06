<?php
/* @var $this ShareholdersController */
/* @var $model shareholders */

$this->breadcrumbs=array(
	'Shareholders'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List shareholders', 'url'=>array('index')),
	array('label'=>'Create shareholders', 'url'=>array('create')),
	array('label'=>'Update shareholders', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete shareholders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage shareholders', 'url'=>array('admin')),
);
?>

<h1>View shareholders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comp_id',
		'name',
		'shares',
	),
)); ?>
