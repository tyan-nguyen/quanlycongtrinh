<?php

namespace app\modules\nguoidung\models;

use Yii;
use app\custom\CustomFunc;
use webvimark\modules\UserManagement\models\User;
use yii\helpers\ArrayHelper;
use app\modules\nguoidung\models\base\PhongBanBase;

class PhongBan extends PhongBanBase
{
    public static function getDanhSachPhongBan(){
        $list = PhongBanBase::find()->all();
        return ArrayHelper::map($list, 'id', 'room_name');
    }
}