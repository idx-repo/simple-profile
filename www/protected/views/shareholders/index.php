<?php
/* @var $this ShareholdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shareholders',
);

$this->menu=array(
	array('label'=>'Create shareholders', 'url'=>array('create')),
	array('label'=>'Manage shareholders', 'url'=>array('admin')),
);
?>

<h1>Shareholders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
