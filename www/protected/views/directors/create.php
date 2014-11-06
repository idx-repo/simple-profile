<?php
/* @var $this DirectorsController */
/* @var $model directors */

$this->breadcrumbs=array(
	'Directors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List directors', 'url'=>array('index')),
	array('label'=>'Manage directors', 'url'=>array('admin')),
);
?>

<h1>Create directors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>