<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LoaiVatTu;

/**
 * LoaiVatTuSearch represents the model behind the search form about `app\models\LoaiVatTu`.
 */
class LoaiVatTuSearch extends LoaiVatTu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_user'], 'integer'],
            [['ten_loai_vat_tu', 'create_date'], 'safe'],
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
        $query = LoaiVatTu::find();

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
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);

        $query->andFilterWhere(['like', 'ten_loai_vat_tu', $this->ten_loai_vat_tu]);

        return $dataProvider;
    }
}
