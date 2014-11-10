<?php
/* @var $this CompaniesController */
/* @var $model companies */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Create',
);
?>

<h1>Create companies</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>