<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CompanySearch merepresentasikan model pencarian untuk `app\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // Bypass implementasi scenarios() di parent class
        return Model::scenarios();
    }

    /**
     * Membuat instance data provider dengan query pencarian yang diaplikasikan.
     *
     * @param array $params Parameter pencarian dari GET request
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Company::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'code' => SORT_ASC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Jika validasi gagal, kembalikan tanpa record
            $query->where('0=1');
            return $dataProvider;
        }

        // Filter pencarian grid
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
