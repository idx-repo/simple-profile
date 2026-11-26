<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Model ActiveRecord untuk tabel "companies".
 *
 * @property int $id
 * @property string $code Kode emiten (e.g. BBCA, TLKM)
 * @property string $name Nama resmi perusahaan
 *
 * @property Profile $profile
 * @property Shareholder[] $shareholders
 * @property Commissioner[] $commissioners
 * @property Director[] $directors
 */
class Company extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Kode Emiten',
            'name' => 'Nama Perusahaan',
        ];
    }

    /**
     * Mendapatkan profil rinci perusahaan (relasi 1-ke-1).
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['comp_id' => 'id']);
    }

    /**
     * Mendapatkan daftar pemegang saham perusahaan (relasi 1-ke-banyak).
     * @return \yii\db\ActiveQuery
     */
    public function getShareholders()
    {
        return $this->hasMany(Shareholder::class, ['comp_id' => 'id']);
    }

    /**
     * Mendapatkan daftar dewan komisaris perusahaan (relasi 1-ke-banyak).
     * @return \yii\db\ActiveQuery
     */
    public function getCommissioners()
    {
        return $this->hasMany(Commissioner::class, ['comp_id' => 'id']);
    }

    /**
     * Mendapatkan daftar dewan direksi perusahaan (relasi 1-ke-banyak).
     * @return \yii\db\ActiveQuery
     */
    public function getDirectors()
    {
        return $this->hasMany(Director::class, ['comp_id' => 'id']);
    }
}
