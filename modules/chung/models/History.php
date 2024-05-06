<?php

namespace app\modules\chung\models;

use Yii;

use app\modules\bophan\models\NhanVien;
use app\modules\bophan\models\BoPhan;
use app\modules\bophan\models\DoiTac;
use app\modules\kholuutru\models\KhoLuuTru;
use app\modules\taisan\models\HeThong;
use app\modules\taisan\models\LoaiThietBi;
use app\modules\taisan\models\ThietBi;
use app\modules\taisan\models\ViTri;
use app\modules\user\models\User;
use app\modules\baotri\models\LoaiBaoTri;
use app\components\CustomFunc;
use app\widgets\views\HistoryWidget;
use app\modules\kehoachxuatkho\models\KeHoachXuatKho;

class History extends HistoryBase
{
    /**
    * get lich su thuoc id tham chieu
    * @param string $loai
    * @param int $idthamchieu
    * @return \yii\db\ActiveRecord[]
    */
    public static function getHistoryThamChieu($loai, $idthamchieu){
        return History::find()->where([
            'loai'=>$loai,
            'id_tham_chieu'=>$idthamchieu
        ])->orderBy('id DESC')->all();
    }
    
    /**
     * Hien thi lich su cho view cua cac module co cau hinh luu lich su
     * @param string $loai
     * @param int $idthamchieu
     */
    public static function showHistory($loai,$idthamchieu){
        $his = History::getHistoryThamChieu($loai, $idthamchieu);
        echo HistoryWidget::widget([
            'data'=>$his
        ]);
    }
    
    /**
     * xoa tat ca lich su thuoc id tham chieu(khi xoa tham chieu)
     * @param string $loai
     * @param int $idthamchieu
     */
    public static function xoaHistoryThamChieu($loai, $idthamchieu){
        $models = History::getHistoryThamChieu($loai, $idthamchieu);
        foreach ($models as $indexMod=>$model){
            $model->delete();
        }
    }
    
    /**
     * lay link lien ket den id tham chieu (view action)
     * @return string
     */
    public function getShowLink(){
        switch ($this->loai){
            case KeHoachXuatKho::MODEL_ID:
                $module = 'kehoachxuatkho';
                $control = 'phieu-xuat-kho';
                break;
            default:
                $module = 'module';
                $control = 'control';
        }

        $link = '/' . $module . '/' . $control;
        return Yii::getAlias('@web') . $link . '/view?id=' . $this->id_tham_chieu;
    }
    
    /**
     * hien thi ten cua id tham chieu de hien thi trong lich su hoat dong
     * @return string
     */
    public function getShowName(){
        $name = '';
        switch ($this->loai){
            case KeHoachXuatKho::MODEL_ID:
                $query = KeHoachXuatKho::findOne($this->id_tham_chieu);
                $name = $query != null ? $query->soPhieu : '';
                break;
            default:
                $name = '';
        }
        
        return $name;
    }
    
    /**
     * hien thi ten loai tham chieu de hien thi trong lich su hoat dong
     * @return string
     */
    public function getShowLoai(){
        $name = '';
        switch ($this->loai){
            case KeHoachXuatKho::MODEL_ID:
                $name = 'Dữ liệu Kế hoạch';
                break;
            default:
                $name = '';
        }
        
        return $name;
    }
    
    /**
     * hien thi thoi gian tao d/m/y H:i:s
     * @return string
     */
    public function getThoiGianTao(){
        $cus = new CustomFunc();
        return $cus->convertYMDHISToDMYHIS($this->thoi_gian_tao);
    }
    
}
