<?php
/* @var $this DirectorsController */
/* @var $model directors */

$this->breadcrumbs=array(
	'Directors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List directors', 'url'=>array('index')),
	array('label'=>'Create directors', 'url'=>array('create')),
	array('label'=>'View directors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage directors', 'url'=>array('admin')),
);
?>

<h1>Update directors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>