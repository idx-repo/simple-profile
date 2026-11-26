<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shareholder */
/* @var $company app\models\Company */

$this->title = "Edit Pemegang Saham: [{$company->code}] {$company->name}";
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['company/index']];
$this->params['breadcrumbs'][] = ['label' => $company->code, 'url' => ['company/view', 'id' => $company->id]];
$this->params['breadcrumbs'][] = 'Edit Pemegang Saham';
?>
<div class="shareholder-update">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'company' => $company,
    ]) ?>

</div>
