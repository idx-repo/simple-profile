<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $profile app\models\Profile */
?>
<div class="profile-tab py-2">
    <?php if ($profile): ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0 text-secondary">Rincian Informasi Kontak & Operasional</h5>
            <div>
                <?= Html::a('Edit Profil', ['profile/update', 'id' => $profile->id], ['class' => 'btn btn-sm btn-outline-primary mr-1']) ?>
                <?= Html::a('Hapus Profil', ['profile/delete', 'id' => $profile->id], [
                    'class' => 'btn btn-sm btn-outline-danger',
                    'data' => [
                        'confirm' => 'Hapus informasi profil perusahaan ini?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <?= DetailView::widget([
            'model' => $profile,
            'options' => ['class' => 'table table-bordered table-striped detail-view'],
            'attributes' => [
                'hq_address:ntext',
                'hq_phone',
                'hq_fax',
                [
                    'attribute' => 'website',
                    'format' => 'raw',
                    'value' => function ($profile) {
                        $url = $profile->website;
                        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                            $url = "http://" . $url;
                        }
                        return Html::a(Html::encode($profile->website), $url, ['target' => '_blank', 'rel' => 'noopener noreferrer']);
                    },
                ],
                [
                    'attribute' => 'started_operation',
                    'label' => 'Mulai Beroperasi (Tahun)',
                ],
                'associated_companies',
            ],
        ]) ?>
    <?php else: ?>
        <div class="alert alert-info d-flex justify-content-between align-items-center" role="alert">
            <div>
                <strong>Profil belum tersedia.</strong> Belum ada informasi alamat, telepon, atau kontak kantor pusat untuk emiten ini.
            </div>
            <?= Html::a('&plus; Tambah Profil', ['profile/create', 'comp_id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    <?php endif; ?>
</div>
