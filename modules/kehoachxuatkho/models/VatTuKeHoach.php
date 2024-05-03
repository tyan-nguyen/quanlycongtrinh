<?php

namespace app\modules\kehoachxuatkho\models;

use Yii;
use app\modules\kehoachxuatkho\models\base\VatTuKeHoachBase;
use app\modules\vattu\models\VatTu;
use app\modules\xuatkho\models\VatTuXuat;
use app\modules\xuatkho\models\PhieuXuatKho;

class VatTuKeHoach extends VatTuKeHoachBase
{
    /**
     * Gets query for [[PhieuXuatKho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKeHoachXuatKho()
    {
        return $this->hasOne(KeHoachXuatKho::class, ['id' => 'id_phieu_xuat_kho']);
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
        /* $models = VatTuKeHoach::find()->alias('t')->joinWith(['phieuXuatKho as p'])->where(['t.id_vat_tu'=>$this->id_vat_tu, 'p.id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])
        ->andFilterWhere(['IN','p.trang_thai',KeHoachXuatKho::getDmTrangThaiDuocDuyet()])->all();
        
        $slBocTachModel =  KeHoachXuatKho::find()->where(['id_vat_tu'=>$this->id_vat_tu, 'id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])->one();
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
        } */
        $soLuongXuat = VatTuXuat::find()->alias('t')->joinWith(['phieuXuatKho as p'])->where(['t.id_vat_tu'=>$this->id_vat_tu, 'p.id_ke_hoach'=>$this->id_phieu_xuat_kho])
        ->andFilterWhere(['IN','p.trang_thai',KeHoachXuatKho::getDmTrangThaiDuocDuyet()])->sum('t.so_luong_duoc_duyet');
        
        return ($soLuongXuat != null) ? $soLuongXuat : 0;
    }
    
    /**
     * han muc
     */
    public function getHanMucPhanTram(){
       /*  $models = VatTuKeHoach::find()->alias('t')->joinWith(['phieuXuatKho as p'])->where(['t.id_vat_tu'=>$this->id_vat_tu, 'p.id_cong_trinh'=>$this->phieuXuatKho->id_cong_trinh])
        ->andFilterWhere(['IN','p.trang_thai',KeHoachXuatKho::getDmTrangThaiDuocDuyet()])->all();
        
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
        } */
        if($this->so_luong_duoc_duyet > 0){
            return round($this->hanMuc/$this->so_luong_duoc_duyet*100, 2);
        } else{
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