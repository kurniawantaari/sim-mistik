<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NilaiPencacahan;

/**
 * NilaiPencacahanSearch represents the model behind the search form about `backend\models\NilaiPencacahan`.
 */
class NilaiPencacahanSearch extends NilaiPencacahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idmitra', 'idkegiatan', 'konsep', 'isian', 'tulisan', 'waktu', 'kerjasama', 'koordinasi', 'sop', 'persen_error', 'pascakomputerisasi', 'r_nilai'], 'integer'],
            [['sop1', 'sop2', 'sop3', 'sop4', 'sop5','sudah_dinilai'], 'boolean'],
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
        $query = NilaiPencacahan::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'idmitra' => $this->idmitra,
            'idkegiatan' => $this->idkegiatan,
            'konsep' => $this->konsep,
            'isian' => $this->isian,
            'tulisan' => $this->tulisan,
            'waktu' => $this->waktu,
            'kerjasama' => $this->kerjasama,
            'koordinasi' => $this->koordinasi,
            'sop1' => $this->sop1,
            'sop2' => $this->sop2,
            'sop3' => $this->sop3,
            'sop4' => $this->sop4,
            'sop5' => $this->sop5,
            'sop' => $this->sop,
            'persen_error' => $this->persen_error,
            'pascakomputerisasi' => $this->pascakomputerisasi,
            'r_nilai' => $this->r_nilai,
            'sudah_dinilai'=>FALSE,
        ]);

        return $dataProvider;
    }
}
