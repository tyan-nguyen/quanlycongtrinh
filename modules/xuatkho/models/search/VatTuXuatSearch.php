<?php

namespace app\modules\xuatkho\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\xuatkho\models\VatTuXuat;

/**
 * VatTuXuatSearch represents the model behind the search form about `app\models\VatTuXuat`.
 */
class VatTuXuatSearch extends VatTuXuat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_phieu_xuat_kho', 'id_vat_tu', 'id_nguoi_duyet', 'create_user'], 'integer'],
            [['so_luong_yeu_cau', 'so_luong_duoc_duyet'], 'number'],
            [['ghi_chu', 'trang_thai', 'create_date'], 'safe'],
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
        $query = VatTuXuat::find();

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
            'so_luong_yeu_cau' => $this->so_luong_yeu_cau,
            'so_luong_duoc_duyet' => $this->so_luong_duoc_duyet,
            'id_phieu_xuat_kho' => $this->id_phieu_xuat_kho,
            'id_vat_tu' => $this->id_vat_tu,
            'id_nguoi_duyet' => $this->id_nguoi_duyet,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);

        $query->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai]);

        return $dataProvider;
    }
}
