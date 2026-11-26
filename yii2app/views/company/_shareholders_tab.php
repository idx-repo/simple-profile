<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="shareholders-tab py-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 text-secondary">Struktur Kepemilikan Saham</h5>
        <?= Html::a('&plus; Tambah Pemegang Saham', ['shareholder/create', 'comp_id' => $model->id], ['class' => 'btn btn-sm btn-success']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '<p class="text-muted small">Menampilkan <strong>{begin} - {end}</strong> dari <strong>{totalCount}</strong> pemegang saham</p>',
        'emptyText' => '<div class="alert alert-light border text-center text-muted">Belum ada data pemegang saham untuk emiten ini.</div>',
        'tableOptions' => ['class' => 'table table-hover table-bordered mb-0'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::tag('span', Html::encode($data->name), ['class' => 'font-weight-bold']);
                },
            ],
            [
                'attribute' => 'shares',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width: 180px; text-align: right;'],
                'contentOptions' => ['style' => 'text-align: right; font-weight: bold;'],
                'value' => function ($data) {
                    return number_format($data->shares, 2, ',', '.') . ' %';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi',
                'headerOptions' => ['style' => 'width: 120px; text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $data) {
                        return Html::a('Edit', ['shareholder/update', 'id' => $data->id], ['class' => 'btn btn-xs btn-sm btn-outline-primary mr-1']);
                    },
                    'delete' => function ($url, $data) {
                        return Html::a('Hapus', ['shareholder/delete', 'id' => $data->id], [
                            'class' => 'btn btn-xs btn-sm btn-outline-danger',
                            'data' => [
                                'confirm' => 'Apakah Anda yakin ingin menghapus data pemegang saham ini?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
