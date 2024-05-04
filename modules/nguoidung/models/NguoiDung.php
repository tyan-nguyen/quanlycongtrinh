<?php

namespace app\modules\nguoidung\models;

use Yii;
use app\custom\CustomFunc;
use webvimark\modules\UserManagement\models\User;
use yii\helpers\ArrayHelper;
use app\modules\congtrinh\models\CongTrinhQuyen;
use app\modules\xuatkho\models\PhieuXuatKho;
use app\modules\kehoachxuatkho\models\KeHoachXuatKho;

class NguoiDung extends User
{
    public static function getDanhSachNguoiDung(){
        $list = User::find()->all();
        return ArrayHelper::map($list, 'id', 'username', 'phongBan.room_name');
    }
    
    public static function getTatCaCongTrinhDuyet(){
        $quyen = CongTrinhQuyen::find()->select(['id_cong_trinh'])->where([
            'id_nguoi_dung' => Yii::$app->user->id,
            'quyen'=>'DUYET_XUAT_KHO'
        ])->asArray()->all();
        return $quyen;
    }
    
    public static function getSoPhieuXuatKhoCanDuyet(){
        $soPhieu = PhieuXuatKho::find()
            ->where(['trang_thai'=>'CHO_DUYET'])
            ->andFilterWhere(['IN','id_cong_trinh', NguoiDung::getTatCaCongTrinhDuyet()])->count();
        return $soPhieu;
    }
    
    public static function getSoKeHoachXuatKhoDaDuyet(){
        $soKH = KeHoachXuatKho::find()
        ->where(['trang_thai'=>'DA_DUYET'])
        ->andFilterWhere(['IN','id_cong_trinh', NguoiDung::getTatCaCongTrinhDuyet()])->count();
        return $soKH;
    }
    
    public static function getSoKeHoachXuatKhoCanNghiemThu(){
        $soKH = KeHoachXuatKho::find()
            ->where(['trang_thai'=>'DA_DUYET'])
            ->andFilterWhere(['IN','id_cong_trinh', NguoiDung::getTatCaCongTrinhDuyet()])->all();
       $sum = 0;
       foreach ($soKH as $i=>$kh){
           if($kh->hanMucThiCong >= 90){
               $sum++;
           }
       }
       return $sum;
    }
    
    /* public static function getTatCaCongTrinhDuyet(){
        $quyen = CongTrinhQuyen::find()->where([
            'id_nguoi_dung' => Yii::$app->user->id,
            'quyen'=>'DUYET_XUAT_KHO'
        ])->all();
        $arrCongTrinh = array();
        foreach ($quyen as $i=>$q){
            array_push($arrCongTrinh, $q->id_cong_trinh);
        }
        return $arrCongTrinh;
    } */
}