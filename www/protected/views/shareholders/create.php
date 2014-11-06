<?php
/* @var $this ShareholdersController */
/* @var $model shareholders */

$this->breadcrumbs=array(
	'Shareholders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List shareholders', 'url'=>array('index')),
	array('label'=>'Manage shareholders', 'url'=>array('admin')),
);
?>

<h1>Create shareholders</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>