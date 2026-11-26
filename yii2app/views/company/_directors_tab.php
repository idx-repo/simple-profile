<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="directors-tab py-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 text-secondary">Susunan Dewan Direksi</h5>
        <?= Html::a('&plus; Tambah Direktur', ['director/create', 'comp_id' => $model->id], ['class' => 'btn btn-sm btn-success']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '<p class="text-muted small">Menampilkan <strong>{begin} - {end}</strong> dari <strong>{totalCount}</strong> direktur</p>',
        'emptyText' => '<div class="alert alert-light border text-center text-muted">Belum ada data direksi untuk emiten ini.</div>',
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
                'attribute' => 'job_desc',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width: 260px;'],
                'value' => function ($data) {
                    return Html::tag('span', Html::encode($data->job_desc), ['class' => 'badge badge-info px-2 py-1', 'style' => 'font-size: 0.9rem;']);
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
                        return Html::a('Edit', ['director/update', 'id' => $data->id], ['class' => 'btn btn-xs btn-sm btn-outline-primary mr-1']);
                    },
                    'delete' => function ($url, $data) {
                        return Html::a('Hapus', ['director/delete', 'id' => $data->id], [
                            'class' => 'btn btn-xs btn-sm btn-outline-danger',
                            'data' => [
                                'confirm' => 'Apakah Anda yakin ingin menghapus direktur ini?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
