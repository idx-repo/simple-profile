<?php
/* @var $this ProfilesController */
/* @var $model profiles */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	'Create',
);
?>

<h1>Create profiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'compid'=>$compid)); ?>