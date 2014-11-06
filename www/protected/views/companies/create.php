<?php
/* @var $this CompaniesController */
/* @var $model companies */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List companies', 'url'=>array('index')),
	array('label'=>'Manage companies', 'url'=>array('admin')),
);
?>

<h1>Create companies</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>