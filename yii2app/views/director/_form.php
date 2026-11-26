<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Director */
/* @var $company app\models\Company */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="director-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Perusahaan: <strong>[<?= Html::encode($company->code) ?>] <?= Html::encode($company->name) ?></strong></h5>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'comp_id')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: Jahja Setiaatmadja']) ?>

            <?= $form->field($model, 'job_desc')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: Presiden Direktur, Direktur Kepatuhan']) ?>

            <div class="form-group mb-0 mt-3">
                <?= Html::submitButton($model->isNewRecord ? 'Simpan Direktur' : 'Perbarui Direktur', [
                    'class' => $model->isNewRecord ? 'btn btn-success px-4' : 'btn btn-primary px-4',
                ]) ?>
                <?= Html::a('Batal', ['company/view', 'id' => $company->id], ['class' => 'btn btn-outline-secondary ml-2']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
