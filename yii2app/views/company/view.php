<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $profile app\models\Profile */
/* @var $shareholdersProvider yii\data\ActiveDataProvider */
/* @var $commissionersProvider yii\data\ActiveDataProvider */
/* @var $directorsProvider yii\data\ActiveDataProvider */

$this->title = "[{$model->code}] {$model->name}";
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->code;
?>
<div class="company-view">

    <!-- Header Card Emiten -->
    <div class="card shadow-sm mb-4 border-left-primary">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <span class="badge badge-primary px-3 py-2 mb-2 font-weight-bold" style="font-size: 1.1rem;">
                    <?= Html::encode($model->code) ?>
                </span>
                <h2 class="h3 font-weight-bold mb-1 text-gray-800"><?= Html::encode($model->name) ?></h2>
                <p class="text-muted mb-0 small">ID Emiten: #<?= $model->id ?></p>
            </div>
            <div class="mt-3 mt-md-0">
                <?= Html::a('&larr; Kembali', ['index'], ['class' => 'btn btn-outline-secondary mr-2']) ?>
                <?= Html::a('Edit Perusahaan', ['update', 'id' => $model->id], ['class' => 'btn btn-primary mr-2']) ?>
                <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Apakah Anda yakin ingin menghapus emiten ini beserta seluruh profil dan relasinya?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <!-- Master-Detail Interactive Tabs (Bootstrap 4) -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <?= Tabs::widget([
                'items' => [
                    [
                        'label' => 'Profil Perusahaan',
                        'content' => $this->render('_profile_tab', [
                            'model' => $model,
                            'profile' => $profile,
                        ]),
                        'active' => true,
                    ],
                    [
                        'label' => 'Pemegang Saham (' . count($model->shareholders) . ')',
                        'content' => $this->render('_shareholders_tab', [
                            'model' => $model,
                            'dataProvider' => $shareholdersProvider,
                        ]),
                    ],
                    [
                        'label' => 'Dewan Komisaris (' . count($model->commissioners) . ')',
                        'content' => $this->render('_commissioners_tab', [
                            'model' => $model,
                            'dataProvider' => $commissionersProvider,
                        ]),
                    ],
                    [
                        'label' => 'Dewan Direksi (' . count($model->directors) . ')',
                        'content' => $this->render('_directors_tab', [
                            'model' => $model,
                            'dataProvider' => $directorsProvider,
                        ]),
                    ],
                ],
                'options' => ['class' => 'nav-tabs mb-3 font-weight-bold'],
            ]); ?>
        </div>
    </div>

</div>
