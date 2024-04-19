<?php

namespace app\modules\vanchuyen\taixe\models;

use Yii;
use app\modules\vanchuyen\taixe\models\base\TaiXeBase;
use yii\helpers\ArrayHelper;

class TaiXe extends TaiXeBase
{
    public function getList(){
        $list = $this::find()->all();
        return ArrayHelper::map($list, 'id', 'ho_ten');
    }
}