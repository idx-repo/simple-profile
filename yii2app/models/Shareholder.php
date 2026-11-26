<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Model ActiveRecord untuk tabel "shareholders".
 *
 * @property int $id
 * @property int $comp_id
 * @property string $name Nama pemegang saham
 * @property float $shares Persentase kepemilikan saham
 *
 * @property Company $company
 */
class Shareholder extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shareholders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comp_id', 'name', 'shares'], 'required'],
            [['comp_id'], 'integer'],
            [['shares'], 'number', 'min' => 0, 'max' => 100],
            [['name'], 'string', 'max' => 100],
            [['comp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['comp_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comp_id' => 'Perusahaan',
            'name' => 'Nama Pemegang Saham',
            'shares' => 'Persentase Kepemilikan (%)',
        ];
    }

    /**
     * Mendapatkan perusahaan terkait.
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'comp_id']);
    }
}
