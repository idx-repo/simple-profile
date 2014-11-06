<?php
/* @var $this ShareholdersController */
/* @var $model shareholders */

$this->breadcrumbs=array(
	'Shareholders'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List shareholders', 'url'=>array('index')),
	array('label'=>'Create shareholders', 'url'=>array('create')),
	array('label'=>'View shareholders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage shareholders', 'url'=>array('admin')),
);
?>

<h1>Update shareholders <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>