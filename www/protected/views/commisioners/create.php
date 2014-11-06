<?php
/* @var $this CommisionersController */
/* @var $model commisioners */

$this->breadcrumbs=array(
	'Commisioners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List commisioners', 'url'=>array('index')),
	array('label'=>'Manage commisioners', 'url'=>array('admin')),
);
?>

<h1>Create commisioners</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>