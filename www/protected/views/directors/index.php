<?php
/* @var $this DirectorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directors',
);

$this->menu=array(
	array('label'=>'Create directors', 'url'=>array('create')),
	array('label'=>'Manage directors', 'url'=>array('admin')),
);
?>

<h1>Directors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
