<?php
/* @var $this CompaniesController */
/* @var $model companies */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'['.$model->code.'] '.$model->name,
);
$this->menu=array(
	array('label'=>'Add/edit profiles', 'url'=>array('profiles/create')),
	array('label'=>'Add shareholders', 'url'=>array('shareholders/create')),
	array('label'=>'Add commissioners', 'url'=>array('commissioners/create')),
	array('label'=>'Add directors', 'url'=>array('directors/create')),
);
?>

<h1>View company: <?php echo $model->code; ?></h1>
<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'code',
		'name',
	),
));
// Profile
$mprofile = new profiles();
$mprofile->attributes = array('comp_id' => $model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$mprofile,
	'attributes'=>array(
		//'id',
		//'comp_id',
		'hq_address',
		'hq_phone',
		'hq_fax',
		'website',
		'started_operation',
		'associated_companies',
	),
));
?>

<p style='margin-top: 48px;text-align:center;'>Shareholders</p>
<?php
// Shareholders
$mshareholders = new shareholders('search');
$mshareholders->attributes = array('comp_id' => $model->id);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'shareholders-grid',
	'dataProvider'=>$mshareholders->search(),
	//'filter'=>$mshareholders,
	'columns'=>array(
		//'id',
		//'comp_id',
		'name',
		'shares',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>

<p style='margin-top: 48px;text-align:center;'>Commissioners</p>
<?php
// Commissioners
$mcommisioner = new commisioners('search');
$mcommisioner->attributes = array('comp_id' => $model->id);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'commisioners-grid',
	'dataProvider'=>$mcommisioner->search(),
	//'filter'=>$mcommisioner,
	'columns'=>array(
		//'id',
		//'comp_id',
		'name',
		'job_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>

<p style='margin-top: 48px;text-align:center;'>Directors</p>
<?php
// Directors
$mdirector = new directors('search');
$mdirector->attributes = array('comp_id' => $model->id);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'directors-grid',
	'dataProvider'=>$mdirector->search(),
	//'filter'=>$mdirector,
	'columns'=>array(
		//'id',
		//'comp_id',
		'name',
		'job_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>