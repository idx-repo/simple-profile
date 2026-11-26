<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Perusahaan & Emiten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="mb-0">
            <?= Html::a('<span class="mr-1">&plus;</span> Tambah Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-hover table-striped mb-0'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'code',
                        'format' => 'raw',
                        'headerOptions' => ['style' => 'width: 140px;'],
                        'value' => function ($model) {
                            return Html::a(
                                Html::tag('span', Html::encode($model->code), ['class' => 'badge badge-primary font-weight-bold px-2 py-1', 'style' => 'font-size: 0.95rem;']),
                                ['view', 'id' => $model->id]
                            );
                        },
                    ],
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id], ['class' => 'font-weight-bold text-dark']);
                        },
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Aksi',
                        'headerOptions' => ['style' => 'width: 130px; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('Lihat', $url, ['class' => 'btn btn-sm btn-outline-info mr-1']);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('Edit', $url, ['class' => 'btn btn-sm btn-outline-primary mr-1']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('Hapus', $url, [
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'data' => [
                                        'confirm' => 'Apakah Anda yakin ingin menghapus perusahaan ini beserta seluruh datanya?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
