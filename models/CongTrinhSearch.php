<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Congtrinh;

/**
 * CongTrinhSearch represents the model behind the search form about `app\models\Congtrinh`.
 */
class CongTrinhSearch extends Congtrinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'p_id', 'create_user'], 'integer'],
            [['ten_cong_trinh', 'dia_diem', 'tg_bat_dau', 'tg_ket_thuc', 'trang_thai', 'create_date'], 'safe'],
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
        $query = Congtrinh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tg_bat_dau' => $this->tg_bat_dau,
            'tg_ket_thuc' => $this->tg_ket_thuc,
            'p_id' => $this->p_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);

        $query->andFilterWhere(['like', 'ten_cong_trinh', $this->ten_cong_trinh])
            ->andFilterWhere(['like', 'dia_diem', $this->dia_diem])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai]);

        return $dataProvider;
    }
}
