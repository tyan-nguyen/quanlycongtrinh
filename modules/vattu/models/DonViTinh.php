<?php

namespace app\modules\vattu\models;

use Yii;
use yii\helpers\ArrayHelper;

class DonViTinh extends \app\models\DonViTinh
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_dvt' => 'Mã đơn vị tính',
            'ten_dvt' => 'Tên đơn vị tính',
        ];
    }
    
    public function getList(){
        $list = $this::find()->all();
        return ArrayHelper::map($list, 'id', 'ten_dvt');
    }
}
    