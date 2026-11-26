<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Model ActiveRecord untuk tabel "directors".
 *
 * @property int $id
 * @property int $comp_id
 * @property string $name Nama anggota direksi
 * @property string $job_desc Jabatan (Direktur Utama, Direktur Keuangan, dll.)
 *
 * @property Company $company
 */
class Director extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comp_id', 'name', 'job_desc'], 'required'],
            [['comp_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['job_desc'], 'string', 'max' => 40],
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
            'name' => 'Nama Direktur',
            'job_desc' => 'Jabatan',
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
