<?php

namespace app\modules\congtrinh\models;

use Yii;
use app\modules\congtrinh\models\base\CongTrinhBase;
use app\custom\CustomFunc;
use app\modules\xuatkho\models\PhieuXuatKho;
use app\modules\xuatkho\models\VatTuBocTach;
use app\modules\xuatkho\models\VatTuXuat;
use yii\helpers\ArrayHelper;

class CongTrinh extends CongTrinhBase
{
    /** relations */
    /**
     * Gets query for [[CongTrinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhanQuyen()
    {
        return $this->hasMany(CongTrinhQuyen::class, ['id_cong_trinh' => 'id']);
    }
    
    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKhos()
    {
        return $this->hasMany(PhieuXuatKho::class, ['id_cong_trinh' => 'id']);
    }
    
    /**
     * Gets query for [[VatTuBocTaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuBocTach()
    {
        return $this->hasMany(VatTuBocTach::class, ['id_cong_trinh' => 'id']);
    }
    
    public function getTongTienBocTach(){
        $sum = 0;
        foreach ($this->vatTuBocTach as $iVt=>$vatTu){
            $sum += $vatTu->thanhTien;
        }
        return $sum;
    }
    
    public function dsVatTuBocTach(){
        $result = array();
        foreach ($this->vatTuBocTach as $iVt=>$vatTu){
            $result[] = [
                'id'=>$vatTu->id,
                'idVatTu'=>$vatTu->id_vat_tu,
                'tenVatTu'=>$vatTu->vatTu->ten_vat_tu,
                'idLoaiVatTu'=>$vatTu->vatTu->id_loai_vat_tu,
                'tenLoaiVatTu'=>$vatTu->vatTu->loaiVatTu->ten_loai_vat_tu,
                'dvt'=>$vatTu->vatTu->donViTinh->ten_dvt,
                'soLuong'=>$vatTu->so_luong,
                'donGia'=>$vatTu->don_gia,
                'thanhTien'=>$vatTu->thanhTien
            ];
        }
        return [
            'tongTien' => $this->getTongTienBocTach(),
            'dsVatTu' => $result
        ];
    }
    
    /**
     * lay tong kinh phi thuc te cua cong trinh
     */
    public function getTongTienThucTe(){
        $sum = 0;
        $phieuDaXuat = PhieuXuatKho::find()->where([
            'id_cong_trinh' => $this->id,
        ])->andFilterWhere(['IN','trang_thai',PhieuXuatKho::getDmTrangThaiCoSoPhieu()])->all(); 
        foreach ($phieuDaXuat as $indexPhieu => $phieu){
            $sum += $phieu->tongTienDuocDuyet;
        }
        return $sum;
    }
    /**
     * lay tong khoi luong thi cong thuc te cua tung vat tu theo cong trinh
     * $id-vat-tu
     * @return number
     */
    public function getKhoiLuongThiCongOfVatTu($idVatTu){
        return VatTuXuat::find()->alias('t')->joinWith(['phieuXuatKho as p'])->where([
            'p.id_cong_trinh' => $this->id,
            'id_vat_tu' => $idVatTu
        ])->andFilterWhere(['IN','p.trang_thai',PhieuXuatKho::getDmTrangThaiDuocDuyet()])->sum('so_luong_duoc_duyet');
    }
    /**
    * thoi gian bat dau
    */
    public function getThoiGianBatDau(){
        $custom = new CustomFunc();
        return $custom->convertYMDToDMY($this->tg_bat_dau);
    }
    /**
     * thoi gian ket thu
     */
    public function getThoiGianKetThuc(){
        $custom = new CustomFunc();
        return $custom->convertYMDToDMY($this->tg_ket_thuc);
    }
    /**
     * ngay tao du lieu
     */
    public function getThoiGianTaoDuLieu(){
        $custom = new CustomFunc();
        return $custom->convertYMDToDMY($this->create_date);
    }
    /**
     * nguoi tao du lieu
     */
    public function getNguoiTaoDuLieu(){
        $custom = new CustomFunc();
        return $custom->getTenTaiKhoan($this->create_user);
    }
    
    /**
     * return 
     */
    public function getQuyenQuanLy(){
        $quyen = CongTrinhQuyen::find()->where([
            'id_cong_trinh'=>$this->id,
            'id_nguoi_dung'=>Yii::$app->user->id,
            'quyen'=>'QUAN_LY_CHUNG',
            'ngung_phu_trach'=>0
        ])->one();
        if($quyen==null)
            return false;
        else 
            return true;
    }
    /**
     * return
     */
    public function getQuyenDuyet(){
        $quyen = CongTrinhQuyen::find()->where([
            'id_cong_trinh'=>$this->id,
            'id_nguoi_dung'=>Yii::$app->user->id,
            'quyen'=>'DUYET_XUAT_KHO',
            'ngung_phu_trach'=>0
        ])->one();
        if($quyen==null)
            return false;
            else
                return true;
    }
    /**
     * return
     */
    public function getQuyenTao(){
        $quyen = CongTrinhQuyen::find()->where([
            'id_cong_trinh'=>$this->id,
            'id_nguoi_dung'=>Yii::$app->user->id,
            'quyen'=>'TAO_XUAT_KHO',
            'ngung_phu_trach'=>0
        ])->one();
        if($quyen==null)
            return false;
            else
                return true;
    }
    
    public function getDsNguoiTao(){
        $list = CongTrinhQuyen::find()->where([
            'id_cong_trinh' => $this->id,
            'quyen' => 'TAO_XUAT_KHO'
        ])->orderBy(['ngung_phu_trach'=>SORT_ASC])->all();
        return ArrayHelper::map($list, 'id_nguoi_dung', function($model) {
            if($model->ngung_phu_trach){
                return $model->nguoiDung->name . ' (Ngưng phụ trách)';
            } else {
                return $model->nguoiDung->name;
            }
        });
    }
}