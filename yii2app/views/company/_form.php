<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'code')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Contoh: BBCA, TLKM, ASII',
                        'style' => 'text-transform: uppercase;',
                    ])->hint('Kode emiten unik terdaftar di Bursa Efek Indonesia (maks. 5 karakter)') ?>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'name')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Contoh: Bank Central Asia Tbk.',
                    ])->hint('Nama resmi entitas perusahaan') ?>
                </div>
            </div>

            <div class="form-group mb-0 mt-3">
                <?= Html::submitButton($model->isNewRecord ? 'Simpan Perusahaan' : 'Perbarui Perusahaan', [
                    'class' => $model->isNewRecord ? 'btn btn-success px-4' : 'btn btn-primary px-4',
                ]) ?>
                <?= Html::a('Batal', $model->isNewRecord ? ['index'] : ['view', 'id' => $model->id], ['class' => 'btn btn-outline-secondary ml-2']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
