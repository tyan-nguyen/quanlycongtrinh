<?php

namespace app\modules\xuatkho\models;

use Yii;
use app\modules\xuatkho\models\base\VatTuXuatBase;
use app\modules\vattu\models\VatTu;

class VatTuXuat extends VatTuXuatBase
{
    /**
     * Gets query for [[PhieuXuatKho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKho()
    {
        return $this->hasOne(PhieuXuatKho::class, ['id' => 'id_phieu_xuat_kho']);
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
    public function danhSachJson(){
            
       return [
           'id'=>$this->id,
           'idPhieu'=>$this->id_phieu_xuat_kho,
           'idVatTu'=>$this->id_vat_tu,
           'slyc'=>$this->so_luong_yeu_cau,
           'sldd'=>$this->so_luong_duoc_duyet,
           'ghiChu'=>$this->ghi_chu,
           'trangThai'=>$this->trang_thai
        ];

    }
    /**
     * han muc
     */
    public function getHanMuc(){
        $models = VatTuXuat::find()->alias('t')->joinWith(['phieuXuatKho as p'])->where(['t.id_vat_tu'=>$this->id_vat_tu, 'p.id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])
            ->andFilterWhere(['IN','p.trang_thai',PhieuXuatKho::getDmTrangThaiDuocDuyet()])->all();
        
            $slBocTachModel =  VatTuBocTach::find()->where(['id_vat_tu'=>$this->id_vat_tu, 'id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])->one();
            $slBocTach = 0;
            if($slBocTachModel !=null){
                $slBocTach = $slBocTachModel->so_luong;
            }
        
        $sum=0;
         foreach ($models as $i=>$model){
             if($model->so_luong_duoc_duyet != null){
                $sum += $model->so_luong_duoc_duyet;
             }
        }
        if($this->phieuXuatKho->trang_thai == 'BAN_NHAP'){
            return ($sum + $this->so_luong_yeu_cau) . '/' . $slBocTach;
        } else {
            return $sum . '/' . $slBocTach;
        }
    }
    
    /**
     * han muc
     */
    public function getHanMucPhanTram(){
        $models = VatTuXuat::find()->alias('t')->joinWith(['phieuXuatKho as p'])->where(['t.id_vat_tu'=>$this->id_vat_tu, 'p.id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])
        ->andFilterWhere(['IN','p.trang_thai',PhieuXuatKho::getDmTrangThaiDuocDuyet()])->all();
        
        $slBocTachModel =  VatTuBocTach::find()->where(['id_vat_tu'=>$this->id_vat_tu, 'id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])->one();
        $slBocTach = 0;
        if($slBocTachModel !=null){
            $slBocTach = $slBocTachModel->so_luong;
        }
        
        $sum=0;
        foreach ($models as $i=>$model){
            if($model->so_luong_duoc_duyet != null){
                $sum += $model->so_luong_duoc_duyet;
            }
        }
        if($slBocTach > 0){
            if($this->phieuXuatKho->trang_thai == 'BAN_NHAP'){
                return round(($sum + $this->so_luong_yeu_cau)/$slBocTach,2)*100;
            } else {
                return round($sum/$slBocTach*100,2);
            }
        } else {
            return 0;
        }
    }
    
    /**
     * thanh tien
     */
    public function getThanhTien(){
        return $this->so_luong_yeu_cau * $this->don_gia;
    }
    /**
     * thanh tien duoc duyet
     */
    public function getThanhTienDuocDuyet(){
        return $this->so_luong_duoc_duyet * $this->don_gia;
    }
  
}