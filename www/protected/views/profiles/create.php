<?php
/* @var $this ProfilesController */
/* @var $model profiles */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List profiles', 'url'=>array('index')),
	array('label'=>'Manage profiles', 'url'=>array('admin')),
);
?>

<h1>Create profiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>