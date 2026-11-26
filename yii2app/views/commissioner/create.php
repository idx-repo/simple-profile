<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Commissioner */
/* @var $company app\models\Company */

$this->title = "Tambah Komisaris: [{$company->code}] {$company->name}";
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['company/index']];
$this->params['breadcrumbs'][] = ['label' => $company->code, 'url' => ['company/view', 'id' => $company->id]];
$this->params['breadcrumbs'][] = 'Tambah Komisaris';
?>
<div class="commissioner-create">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'company' => $company,
    ]) ?>

</div>
