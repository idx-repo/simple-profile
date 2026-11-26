<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shareholder */
/* @var $company app\models\Company */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="shareholder-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Perusahaan: <strong>[<?= Html::encode($company->code) ?>] <?= Html::encode($company->name) ?></strong></h5>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'comp_id')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: PT Dwimuria Investama Andalan']) ?>

            <?= $form->field($model, 'shares')->textInput(['type' => 'number', 'step' => '0.01', 'min' => 0, 'max' => 100, 'placeholder' => 'Contoh: 54.94'])->hint('Masukkan persentase saham (0.00 - 100.00)') ?>

            <div class="form-group mb-0 mt-3">
                <?= Html::submitButton($model->isNewRecord ? 'Simpan Pemegang Saham' : 'Perbarui Pemegang Saham', [
                    'class' => $model->isNewRecord ? 'btn btn-success px-4' : 'btn btn-primary px-4',
                ]) ?>
                <?= Html::a('Batal', ['company/view', 'id' => $company->id], ['class' => 'btn btn-outline-secondary ml-2']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
