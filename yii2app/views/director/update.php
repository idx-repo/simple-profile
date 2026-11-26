<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Director */
/* @var $company app\models\Company */

$this->title = "Edit Direktur: [{$company->code}] {$company->name}";
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['company/index']];
$this->params['breadcrumbs'][] = ['label' => $company->code, 'url' => ['company/view', 'id' => $company->id]];
$this->params['breadcrumbs'][] = 'Edit Direktur';
?>
<div class="director-update">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'company' => $company,
    ]) ?>

</div>
