<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NilaiPengolahan;
use common\models\User;

/**
 * NilaiPengolahanSearch represents the model behind the search form about `backend\models\NilaiPengolahan`.
 */
class NilaiPengolahanSearch extends NilaiPengolahan {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'idmitra', 'idkegiatan', 'waktu_edit', 'kecepatan_edit', 'kesalahan_edit', 'waktu_entri', 'kecepatan_entri', 'kesalahan_entri', 'r_nilai'], 'integer'],
            [['sudah_dinilai'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = NilaiPengolahan::find();
        $query->joinWith(['idmitra0']);

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
        $userId = Yii::$app->user->getId();
        $user = User::findIdentity($userId);
        $userProv = $user->getKdprov();
        $userKab = $user->getKdkab();
        if ($userKab == 0) {
            $userKab = \backend\models\Kabupaten::getKabupaten($userProv);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idmitra' => $this->idmitra,
            'idkegiatan' => $this->idkegiatan,
            'waktu_edit' => $this->waktu_edit,
            'kecepatan_edit' => $this->kecepatan_edit,
            'kesalahan_edit' => $this->kesalahan_edit,
            'waktu_entri' => $this->waktu_entri,
            'kecepatan_entri' => $this->kecepatan_entri,
            'kesalahan_entri' => $this->kesalahan_entri,
            'r_nilai' => $this->r_nilai,
            'sudah_dinilai' => FALSE,
            'kdprov' => (string) $userProv,
            'kdkab' => $userKab]);
        return $dataProvider;
    }

}
