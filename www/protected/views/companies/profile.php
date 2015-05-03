<?php
/* @var $this ProfilesController */
/* @var $model profiles */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List profiles', 'url'=>array('index')),
	array('label'=>'Create profiles', 'url'=>array('create')),
	array('label'=>'Update profiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete profiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage profiles', 'url'=>array('admin')),
);
?>

<h1>View profiles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comp_id',
		'hq_address',
		'hq_phone',
		'hq_fax',
		'website',
		'started_operation',
		'associated_companies',
	),
)); ?>
