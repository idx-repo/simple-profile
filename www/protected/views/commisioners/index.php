<?php
/* @var $this CommisionersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Commisioners',
);

$this->menu=array(
	array('label'=>'Create commisioners', 'url'=>array('create')),
	array('label'=>'Manage commisioners', 'url'=>array('admin')),
);
?>

<h1>Commisioners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
