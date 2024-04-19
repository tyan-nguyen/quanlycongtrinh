<?php

namespace app\modules\xuatkho\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\xuatkho\models\VatTuBocTach;
use app\custom\CustomFunc;

/**
 * VatTuBocTachSearch represents the model behind the search form about `app\models\VatTuBocTach`.
 */
class VatTuBocTachSearch extends VatTuBocTach
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cong_trinh', 'id_vat_tu', 'create_user'], 'integer'],
            [['so_luong'], 'number'],
            [['create_date'], 'safe'],
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
    public function search($params, $idCongTrinh=NULL)
    {
        $custom = new CustomFunc();
        $query = VatTuBocTach::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if($idCongTrinh==NULL){
            $query->andFilterWhere([
                'id_cong_trinh' => $this->id_cong_trinh
            ]);
        } else {
            $query->andFilterWhere([
                'id_cong_trinh' => $idCongTrinh
            ]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'so_luong' => $this->so_luong,
            'id_vat_tu' => $this->id_vat_tu,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);
        

        return $dataProvider;
    }
}
