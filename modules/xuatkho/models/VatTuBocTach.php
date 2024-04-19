<?php

namespace app\modules\xuatkho\models;

use Yii;
use app\modules\xuatkho\models\base\VatTuBocTachBase;
use app\modules\congtrinh\models\CongTrinh;
use app\modules\vattu\models\VatTu;
use app\custom\CustomFunc;
use app\modules\nguoidung\models\NguoiDung;

class VatTuBocTach extends VatTuBocTachBase
{
    /**
     * Gets query for [[CongTrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongTrinh()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'id_cong_trinh']);
    }
    
    /**
     * Gets query for [[VatTu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTu()
    {
        return $this->hasOne(VatTu::class, ['id' => 'id_vat_tu']);
    }
    
    /**
    * $model->ngay
    */
    public function danhSachJson(){
        
        return [
            'id'=>$this->id,
            'idCongTrinh'=>$this->id_cong_trinh,
            'idVatTu'=>$this->id_vat_tu,
            'soluong'=>$this->so_luong,
            'donGia'=>$this->don_gia,
        ];
        
    }
    /**
     * thanh tien
     */
    public function getThanhTien(){
        return $this->so_luong * $this->don_gia;
    }
    
    /**
     * get khoi luong thi cong thuc te so voi boc tach
     */
    public function getKhoiLuongThiCongThucTePercent(){
        $kltc = $this->congTrinh->getKhoiLuongThiCongOfVatTu($this->id_vat_tu);
        return $this->so_luong>0 ? round($kltc/$this->so_luong*100,2) : 0;
    }
    
    /**
     * get khoi luong thi cong thuc te so voi boc tach
     */
    public function getKhoiLuongThiCongThucTeProcess(){
        $kltc = $this->congTrinh->getKhoiLuongThiCongOfVatTu($this->id_vat_tu);
        return '
            <div class="progress-group">
                <span class="progress-text">&nbsp;</span>
                <span class="progress-number"><b>'. $kltc .'</b>/'.
                    $this->so_luong
                    .'</span>
                <div class="progress sm">
                     <div class="progress-bar progress-bar-green" style="width: '. $this->getKhoiLuongThiCongThucTePercent() .'%"></div>
                </div>
            </div>
        ';
    }
    /**
     * ngay tao
     */
    public function getNgayTao(){
        $custom = new CustomFunc();
        return $custom->convertYMDHISToDMY($this->create_date);
    }
    /**
     * nguoi tao
     */
    public function getNguoiTao(){
        $nguoiDung = NguoiDung::findOne($this->create_user);
        if($nguoiDung != null){
            return $nguoiDung->name;
        } else {
            return '';
        }
    }
}