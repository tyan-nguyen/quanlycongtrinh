<?php

namespace app\modules\vanchuyen\xe\models;

use Yii;
use app\modules\vanchuyen\xe\models\base\XeBase;
use yii\helpers\ArrayHelper;

class Xe extends XeBase
{
    public function getList(){
        $list = $this::find()->all();
        return ArrayHelper::map($list, 'id', 'bien_so_xe');
    }
}