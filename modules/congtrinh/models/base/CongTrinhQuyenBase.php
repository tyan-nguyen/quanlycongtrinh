<?php

namespace app\modules\congtrinh\models\base;

use Yii;
use app\models\CongTrinhPhanQuyen;

/**
 * This is the model class for table "cong_trinh_phan_quyen".
 *
 * @property int $id
 * @property int $id_cong_trinh
 * @property int $id_nguoi_dung
 * @property string $quyen
 * @property int|null $ngung_phu_trach
 * @property string|null $create_date
 * @property int|null $create_user
 */
class CongTrinhQuyenBase extends CongTrinhPhanQuyen
{
    /**
     * Danh muc quyen
     * @return string[]
     */
    public static function getDmQuyen(){
        return [
            'QUAN_LY_CHUNG'=>'Quản lý công trình',
            'TAO_XUAT_KHO'=>'Tạo phiếu xuất kho',
            'DUYET_XUAT_KHO'=>'Duyệt phiếu xuất kho'
        ];
    }
    
    /**
     * Danh muc trang thai cong trinh label
     * @param int $val
     * @return string
     */
    public static function getDmQuyenLabel($val){
        $label = '';
        if($val == 'QUAN_LY_CHUNG'){
            $label = 'Quản lý công trình';
        }else if($val == 'TAO_XUAT_KHO'){
            $label = 'Tạo phiếu xuất kho';
        }else if($val == 'DUYET_XUAT_KHO'){
            $label = 'Duyệt phiếu xuất kho';
        }
        return $label;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cong_trinh', 'id_nguoi_dung', 'quyen'], 'required'],
            [['id_cong_trinh', 'id_nguoi_dung', 'ngung_phu_trach', 'create_user'], 'integer'],
            [['create_date'], 'safe'],
            [['quyen'], 'string', 'max' => 50],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cong_trinh' => 'Id Cong Trinh',
            'id_nguoi_dung' => 'Id Nguoi Dung',
            'quyen' => 'Quyen',
            'ngung_phu_trach' => 'Ngung Phu Trach',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
            if($this->ngung_phu_trach == null){
                $this->ngung_phu_trach = 0;
            }
        }
        
        return parent::beforeSave($insert);
    }
    
    /** thuc hien xoa phan quyen khoi cong trinh 
     * kiem tra nguoi dung co them phieu chua, neu chua thi xoa, neu co thi set ngung phan cong
     * 
     * */
    public function thucHienXoa(){
        
    }
}