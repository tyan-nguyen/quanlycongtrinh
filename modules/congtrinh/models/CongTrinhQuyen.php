<?php

namespace app\modules\congtrinh\models;

use Yii;
use app\custom\CustomFunc;
use app\modules\congtrinh\models\base\CongTrinhQuyenBase;
use app\modules\nguoidung\models\NguoiDung;

class CongTrinhQuyen extends CongTrinhQuyenBase
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