<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kabupaten;

/**
 * KabupatenSearch represents the model behind the search form about `backend\models\Kabupaten`.
 */
class KabupatenSearch extends Kabupaten
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdprov', 'kdkab', 'nmkab'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kabupaten::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'kdprov', $this->kdprov])
            ->andFilterWhere(['like', 'kdkab', $this->kdkab])
            ->andFilterWhere(['like', 'nmkab', $this->nmkab]);

        return $dataProvider;
    }
}
