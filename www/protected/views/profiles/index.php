<?php
/* @var $this ProfilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profiles',
);

$this->menu=array(
	array('label'=>'Create profiles', 'url'=>array('create')),
	array('label'=>'Manage profiles', 'url'=>array('admin')),
);
?>

<h1>Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
