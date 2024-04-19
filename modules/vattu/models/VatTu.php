<?php

namespace app\modules\vattu\models;

use Yii;
use app\modules\vattu\models\base\VatTuBase;

class VatTu extends VatTuBase
{

    
   /**
    * $model->ngay
    */
   /**
    * Gets query for [[LoaiVatTu]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getLoaiVatTu()
    {
        return $this->hasOne(LoaiVatTu::class, ['id' => 'id_loai_vat_tu']);
    }
    /**
     * Gets query for [[DonViTinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonViTinh()
    {
        return $this->hasOne(DonViTinh::class, ['id' => 'don_vi_tinh']);
    }
}
