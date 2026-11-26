<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Model ActiveRecord untuk tabel "profiles".
 *
 * @property int $id
 * @property int $comp_id
 * @property string $hq_address Alamat kantor pusat
 * @property string $hq_phone Telepon kantor pusat
 * @property string $hq_fax Fax kantor pusat
 * @property string $website URL situs web resmi
 * @property string $started_operation Tahun mulai beroperasi
 * @property string $associated_companies Perusahaan afiliasi/asosiasi
 *
 * @property Company $company
 */
class Profile extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comp_id', 'hq_address', 'hq_phone', 'hq_fax', 'website', 'started_operation', 'associated_companies'], 'required'],
            [['comp_id'], 'integer'],
            [['hq_address'], 'string'],
            [['hq_phone', 'hq_fax'], 'string', 'max' => 40],
            [['website', 'associated_companies'], 'string', 'max' => 100],
            [['started_operation'], 'string', 'max' => 4],
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
            'hq_address' => 'Alamat Kantor Pusat',
            'hq_phone' => 'Telepon',
            'hq_fax' => 'Fax',
            'website' => 'Situs Web',
            'started_operation' => 'Tahun Mulai Operasi',
            'associated_companies' => 'Perusahaan Terkait',
        ];
    }

    /**
     * Mendapatkan perusahaan pemilik profil ini.
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'comp_id']);
    }
}
