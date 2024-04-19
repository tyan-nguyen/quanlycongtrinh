<?php

namespace app\modules\vattu\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\vattu\models\VatTu;

/**
 * VatTuSearch represents the model behind the search form about `app\modules\vattu\models\VatTu`.
 */
class VatTuSearch extends VatTu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_loai_vat_tu', 'create_user'], 'integer'],
            [['ten_vat_tu', 'create_date'], 'safe'],
            [['so_luong', 'don_gia'], 'number'],
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
        $query = VatTu::find();

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
            'so_luong' => $this->so_luong,
            'don_gia' => $this->don_gia,
            'id_loai_vat_tu' => $this->id_loai_vat_tu,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);

        $query->andFilterWhere(['like', 'ten_vat_tu', $this->ten_vat_tu]);

        return $dataProvider;
    }
}
