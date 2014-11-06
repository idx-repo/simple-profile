<?php
/* @var $this ProfilesController */
/* @var $model profiles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profiles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'comp_id'); ?>
		<?php echo $form->textField($model,'comp_id'); ?>
		<?php echo $form->error($model,'comp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hq_address'); ?>
		<?php echo $form->textArea($model,'hq_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hq_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hq_phone'); ?>
		<?php echo $form->textField($model,'hq_phone',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'hq_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hq_fax'); ?>
		<?php echo $form->textField($model,'hq_fax',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'hq_fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'started_operation'); ?>
		<?php echo $form->textField($model,'started_operation',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'started_operation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'associated_companies'); ?>
		<?php echo $form->textField($model,'associated_companies',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'associated_companies'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->