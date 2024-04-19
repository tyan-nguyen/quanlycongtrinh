<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PhieuXuatKho;

/**
 * PhieuXuatKhoSearch represents the model behind the search form about `app\models\PhieuXuatKho`.
 */
class PhieuXuatKhoSearch extends PhieuXuatKho
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cong_trinh', 'id_bo_phan_yc', 'id_tai_xe', 'id_xe', 'id_nguoi_duyet', 'create_user'], 'integer'],
            [['thoi_gian_yeu_cau', 'ly_do', 'nguoi_ky', 'trang_thai', 'create_date'], 'safe'],
            [['thanh_tien'], 'number'],
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
        $query = PhieuXuatKho::find();

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
            'thoi_gian_yeu_cau' => $this->thoi_gian_yeu_cau,
            'id_cong_trinh' => $this->id_cong_trinh,
            'id_bo_phan_yc' => $this->id_bo_phan_yc,
            'id_tai_xe' => $this->id_tai_xe,
            'id_xe' => $this->id_xe,
            'id_nguoi_duyet' => $this->id_nguoi_duyet,
            'thanh_tien' => $this->thanh_tien,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);

        $query->andFilterWhere(['like', 'ly_do', $this->ly_do])
            ->andFilterWhere(['like', 'nguoi_ky', $this->nguoi_ky])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai]);

        return $dataProvider;
    }
}
