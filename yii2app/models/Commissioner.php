<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Model ActiveRecord untuk tabel "commisioners".
 *
 * @property int $id
 * @property int $comp_id
 * @property string $name Nama anggota dewan komisaris
 * @property string $job_desc Jabatan (Komisaris Utama, Komisaris Independen, dll.)
 *
 * @property Company $company
 */
class Commissioner extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commisioners';
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
            [['job_desc'], 'string', 'max' => 30],
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
            'name' => 'Nama Komisaris',
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
