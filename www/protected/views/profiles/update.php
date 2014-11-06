<?php
/* @var $this ProfilesController */
/* @var $model profiles */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List profiles', 'url'=>array('index')),
	array('label'=>'Create profiles', 'url'=>array('create')),
	array('label'=>'View profiles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage profiles', 'url'=>array('admin')),
);
?>

<h1>Update profiles <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>