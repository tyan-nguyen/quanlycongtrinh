<?php

namespace app\modules\vanchuyen\xe\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\vanchuyen\xe\models\Xe;

/**
 * XeSearch represents the model behind the search form about `app\models\Xe`.
 */
class XeSearch extends Xe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bien_so_xe', 'create_user'], 'integer'],
            [['hieu_xe', 'hang_xe', 'nam_san_xuat', 'hinh_xe', 'create_date'], 'safe'],
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
        $query = Xe::find();

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
            'nam_san_xuat' => $this->nam_san_xuat,
            'bien_so_xe' => $this->bien_so_xe,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
        ]);

        $query->andFilterWhere(['like', 'hieu_xe', $this->hieu_xe])
            ->andFilterWhere(['like', 'hang_xe', $this->hang_xe])
            ->andFilterWhere(['like', 'hinh_xe', $this->hinh_xe]);

        return $dataProvider;
    }
}
