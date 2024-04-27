<?php

namespace app\modules\kehoachxuatkho\models;

use Yii;
use app\custom\CustomFunc;
use app\modules\kehoachxuatkho\models\base\KeHoachQuyenBase;
use app\modules\nguoidung\models\NguoiDung;

class KeHoachQuyen extends KeHoachQuyenBase
{
    /** relation */
    /**
     * Gets query for [[VatTu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiDung()
    {
        return $this->hasOne(NguoiDung::class, ['id' => 'id_nguoi_dung']);
    }
    
    public function getTenQuyen(){
        return $this->getDmQuyenLabel($this->quyen);
    }
}