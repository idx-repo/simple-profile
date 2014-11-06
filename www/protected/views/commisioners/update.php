<?php
/* @var $this CommisionersController */
/* @var $model commisioners */

$this->breadcrumbs=array(
	'Commisioners'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List commisioners', 'url'=>array('index')),
	array('label'=>'Create commisioners', 'url'=>array('create')),
	array('label'=>'View commisioners', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage commisioners', 'url'=>array('admin')),
);
?>

<h1>Update commisioners <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>