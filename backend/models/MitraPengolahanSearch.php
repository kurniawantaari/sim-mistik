<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MitraPengolahan;

/**
 * MitraPengolahanSearch represents the model behind the search form about `backend\models\MitraPengolahan`.
 */
class MitraPengolahanSearch extends MitraPengolahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kdpendidikan', 'nilai'], 'integer'],
            [['nik', 'nama', 'nama_panggilan', 'jk', 'alamat', 'kdprov', 'kdkab', 'kdkec', 'kddesa', 'tmptlahir', 'tgllahir', 'pekerjaan', 'status', 'hp1', 'hp2', 'email', 'npwp', 'rekening', 'foto', 'kategori_nilai'], 'safe'],
            [['android', 'sedang_survei'], 'boolean'],
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
        $query = MitraPengolahan::find();

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
            'tgllahir' => $this->tgllahir,
            'kdpendidikan' => $this->kdpendidikan,
            'android' => $this->android,
            'nilai' => $this->nilai,
            'sedang_survei' => $this->sedang_survei,
                   ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nama_panggilan', $this->nama_panggilan])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kdprov', $this->kdprov])
            ->andFilterWhere(['like', 'kdkab', $this->kdkab])
            ->andFilterWhere(['like', 'kdkec', $this->kdkec])
            ->andFilterWhere(['like', 'kddesa', $this->kddesa])
            ->andFilterWhere(['like', 'tmptlahir', $this->tmptlahir])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'hp1', $this->hp1])
            ->andFilterWhere(['like', 'hp2', $this->hp2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'rekening', $this->rekening])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'kategori_nilai', $this->kategori_nilai]);

        return $dataProvider;
    }
}
