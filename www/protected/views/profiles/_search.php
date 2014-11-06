<?php
/* @var $this ProfilesController */
/* @var $model profiles */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comp_id'); ?>
		<?php echo $form->textField($model,'comp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hq_address'); ?>
		<?php echo $form->textArea($model,'hq_address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hq_phone'); ?>
		<?php echo $form->textField($model,'hq_phone',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hq_fax'); ?>
		<?php echo $form->textField($model,'hq_fax',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'started_operation'); ?>
		<?php echo $form->textField($model,'started_operation',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'associated_companies'); ?>
		<?php echo $form->textField($model,'associated_companies',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->