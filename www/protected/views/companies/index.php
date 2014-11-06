<?php
/* @var $this CompaniesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'Create companies', 'url'=>array('create')),
	array('label'=>'Manage companies', 'url'=>array('admin')),
);
?>

<h1>Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
