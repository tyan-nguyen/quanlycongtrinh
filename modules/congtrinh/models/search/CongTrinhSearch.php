<?php

namespace app\modules\congtrinh\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\congtrinh\models\CongTrinh;
use app\custom\CustomFunc;

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
            [['ten_cong_trinh', 'dia_diem', 'tg_bat_dau', 'tg_ket_thuc', 'trang_thai', 'trang_thai_boc_tach', 'create_date'], 'safe'],
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
        $custom = new CustomFunc();

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
           // 'tg_bat_dau' => $this->tg_bat_dau,
           // 'tg_ket_thuc' => $this->tg_ket_thuc,
            'p_id' => $this->p_id,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);
        
        if($this->tg_bat_dau != null){
            $query->andFilterWhere([
                'tg_bat_dau' => $custom->convertDMYToYMD($this->tg_bat_dau),
            ]);
        }
        
        if($this->tg_ket_thuc != null){
            $query->andFilterWhere([
                'tg_ket_thuc' => $custom->convertDMYToYMD($this->tg_ket_thuc),
            ]);
        }

        $query->andFilterWhere(['like', 'ten_cong_trinh', $this->ten_cong_trinh])
            ->andFilterWhere(['like', 'dia_diem', $this->dia_diem])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai])
            ->andFilterWhere(['like', 'trang_thai_boc_tach', $this->trang_thai_boc_tach]);

        return $dataProvider;
    }
}
