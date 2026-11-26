<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $company app\models\Company */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Perusahaan: <strong>[<?= Html::encode($company->code) ?>] <?= Html::encode($company->name) ?></strong></h5>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'comp_id')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'hq_address')->textarea(['rows' => 3, 'placeholder' => 'Alamat lengkap kantor pusat']) ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'hq_phone')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: (021) 1234567']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'hq_fax')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: (021) 1234568']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: www.bca.co.id']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'started_operation')->textInput(['maxlength' => 4, 'placeholder' => 'Contoh: 1957']) ?>
                </div>
            </div>

            <?= $form->field($model, 'associated_companies')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: PT BCA Finance, PT BCA Syariah']) ?>

            <div class="form-group mb-0 mt-3">
                <?= Html::submitButton($model->isNewRecord ? 'Simpan Profil' : 'Perbarui Profil', [
                    'class' => $model->isNewRecord ? 'btn btn-success px-4' : 'btn btn-primary px-4',
                ]) ?>
                <?= Html::a('Batal', ['company/view', 'id' => $company->id], ['class' => 'btn btn-outline-secondary ml-2']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
