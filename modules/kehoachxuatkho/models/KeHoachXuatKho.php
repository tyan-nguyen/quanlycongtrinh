<?php

namespace app\modules\kehoachxuatkho\models;

use Yii;
use app\modules\kehoachxuatkho\models\base\KeHoachXuatKhoBase;
use app\modules\vanchuyen\taixe\models\TaiXe;
use app\modules\vanchuyen\xe\models\Xe;
use app\modules\nguoidung\models\PhongBan;
use app\modules\nguoidung\models\NguoiDung;
use app\custom\CustomFunc;
use app\modules\congtrinh\models\CongTrinh;

class KeHoachXuatKho extends KeHoachXuatKhoBase
{
    /** -------xu ly cho so ke hoach */
    public function getDaDuyet(){
        if($this->trang_thai=='DA_DUYET'||$this->trang_thai=='KHONG_DUYET'||$this->trang_thai=='DA_GIAO_HANG')
            return true;
        else 
            return false;
    }
    public function getSoPhieu(){
        if($this->so_phieu != null){
            return 'KH' . $this->fillNumber($this->so_phieu) . '/' . $this->namCuaPhieu;
        } else {
            return 'KHN' . $this->fillNumber($this->getSoPhieuCuoi($this->nam) + 1) . '/' . $this->namCuaPhieu;
        }
    }    
    public function getSoPhieuCuoi($year=NULl){
        if($year==null)
            $year = date('Y');
        $phieuCuoi = $this::find()->where([
            'nam'=>$year,
        ])->andFilterWhere(['IN','trang_thai',$this::getDmTrangThaiCoSoPhieu()])
        ->orderBy(['so_phieu' => SORT_DESC])->one();
        
        if($phieuCuoi != null)
            return $phieuCuoi->so_phieu;
        else 
            return 0;
    }    
    public function getNamCuaPhieu(){
        if($this->nam != null){
            return $this->nam;
        } else {
            $this->nam = date('Y');
            if($this->save()){
                return date('Y');
            }
        }
    }
    public function fillNumber($number){
        $num = strlen($number);
        if( $num < 3){
            $str0 = '';
            for($i=1;$i<=(3-$num); $i++){
                $str0 .= '0';
            }
            return $str0 . $number;
        } else {
            return $number;
        }
    }
    /** //-------end xu ly cho so phieu */
    
    public function getVatTuXuat(){
        return $this->hasMany(VatTuKeHoach::class, ['id_phieu_xuat_kho' => 'id']);
    }
    
    public function getTongTien(){
        $sum = 0;
        foreach ($this->vatTuXuat as $iVt=>$vatTu){  
            $sum += $vatTu->thanhTien;
        }
        return $sum;
    }
    
    public function getTongTienDuocDuyet(){
        $sum = 0;
        foreach ($this->vatTuXuat as $iVt=>$vatTu){
            $sum += $vatTu->thanhTienDuocDuyet;
        }
        return $sum;
    }
    
    public function dsVatTuYeuCau(){
        $result = array();
        foreach ($this->vatTuXuat as $iVt=>$vatTu){            
            $result[] = [
                'id'=>$vatTu->id,
                'idPhieu'=>$vatTu->id_phieu_xuat_kho,
                'idVatTu'=>$vatTu->id_vat_tu,
                'tenVatTu'=>$vatTu->vatTu->ten_vat_tu,
                'idLoaiVatTu'=>$vatTu->vatTu->id_loai_vat_tu,
                'tenLoaiVatTu'=>$vatTu->vatTu->loaiVatTu->ten_loai_vat_tu,
                'dvt'=>$vatTu->vatTu->donViTinh->ten_dvt,
                'slyc'=>$vatTu->so_luong_yeu_cau,
                'donGia'=>$vatTu->don_gia,
                'sldd'=>$vatTu->so_luong_duoc_duyet,
                'hanMucPhanTram'=>$vatTu->hanMucPhanTram,//hien thi han muc cua vat tu theo phieu
                'hanMuc'=>$vatTu->hanMuc,//hien thi han muc cua vat tu theo phieu
                'ghiChu'=>$vatTu->ghi_chu,
                'trangThai'=>$vatTu->trang_thai,
                'thanhTien'=>$vatTu->thanhTien,
                'thanhTienDuocDuyet' => $vatTu->thanhTienDuocDuyet
            ];
        }
        return [
            'tongTien' => $this->getTongTien(),
            'tongTienDuocDuyet' => $this->getTongTienDuocDuyet(),
            'dsVatTu' => $result
        ];
    }
    
    public function getTenBoPhanYeuCau(){
        if($this->id_bo_phan_yc != null){
            return $this->boPhanYc->room_name;
        } else {
            return $this->nguoiTao!=null?$this->nguoiTao->phongBan->room_name:'';
        }
    }
    
    public function getNgayYeuCauLong(){
        $dateYc = $this->thoi_gian_yeu_cau!=null?$this->thoi_gian_yeu_cau:date('Y-m-d');
        $day = date("d", strtotime($dateYc));
        $month = date("m", strtotime($dateYc));
        $year = date("Y", strtotime($dateYc));
        
        return 'Ngày ' . $day . ' tháng ' . $month . ' năm '. $year;
        
    }
    
    public function getNgayYeuCauShort(){
        $dateYc = $this->thoi_gian_yeu_cau!=null?$this->thoi_gian_yeu_cau:date('Y-m-d');
        $custom = new CustomFunc();
        return $custom->convertYMDToDMY($dateYc);
    }
    
    public function getNgayDuyet(){
        if($this->thoi_gian_duyet != null){
            $custom = new CustomFunc();
            return $custom->convertYMDToDMY($this->thoi_gian_duyet);
        } else 
            return '';
    }
    
    public function getNgayGiaoHang(){
        if($this->ngay_giao_hang != null){
            $custom = new CustomFunc();
            return $custom->convertYMDToDMY($this->ngay_giao_hang);
        } else
            return '';
    }
    
    public function getNgayNhapGiaoHang(){
        if($this->thoi_gian_nhap_giao_hang != null){
            $custom = new CustomFunc();
            return $custom->convertYMDToDMY($this->thoi_gian_nhap_giao_hang);
        } else
            return '';
    }
    
    /**
     * Gets query for [[TaiXe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaiXe(){
        return $this->hasOne(TaiXe::class, ['id' => 'id_tai_xe']);
    }    
    
    /**
     * Gets query for [[Xe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getXe()
    {
        return $this->hasOne(Xe::class, ['id' => 'id_xe']);
    }
    
    /**
     * Gets query for [[BoPhanYc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBoPhanYc()
    {
        return $this->hasOne(PhongBan::class, ['id' => 'id_bo_phan_yc']);
    }
    /**
     * Gets query for [[BoPhanYc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiTao()
    {
        return $this->hasOne(NguoiDung::class, ['id' => 'create_user']);
    }
    /**
     * Gets query for [[BoPhanYc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiGui()
    {
        return $this->hasOne(NguoiDung::class, ['id' => 'id_nguoi_gui']);
    }
    /**
     * Gets query for [[BoPhanYc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiDuyet()
    {
        return $this->hasOne(NguoiDung::class, ['id' => 'id_nguoi_duyet']);
    }
    /**
     * Gets query for [[BoPhanYc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiNhapGiaoHang()
    {
        return $this->hasOne(NguoiDung::class, ['id' => 'id_nguoi_nhap_giao_hang']);
    }
    /**
     * Gets query for [[CongTrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongTrinh()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'id_cong_trinh']);
    }
  
}