<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ke_hoach_xuat_kho".
 *
 * @property int $id
 * @property int|null $so_phieu
 * @property int|null $nam
 * @property string|null $thoi_gian_yeu_cau
 * @property int $id_cong_trinh
 * @property int|null $id_bo_phan_yc
 * @property string|null $ly_do
 * @property int|null $id_tai_xe
 * @property int|null $id_xe
 * @property string|null $ngay_giao_hang
 * @property string|null $ghi_chu_giao_hang
 * @property int|null $id_nguoi_nhap_giao_hang
 * @property string|null $thoi_gian_nhap_giao_hang
 * @property string|null $nguoi_ky
 * @property int|null $id_nguoi_gui
 * @property int|null $id_nguoi_duyet
 * @property float|null $don_gia
 * @property string|null $trang_thai
 * @property string|null $y_kien_nguoi_gui
 * @property string|null $y_kien_nguoi_duyet
 * @property string|null $thoi_gian_duyet
 * @property int|null $tao_khong_qui_trinh
 * @property int|null $xuat_khong_qui_trinh
 * @property string|null $create_date
 * @property int|null $create_user
 */
class KeHoachXuatKho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ke_hoach_xuat_kho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_phieu', 'nam', 'id_cong_trinh', 'id_bo_phan_yc', 'id_tai_xe', 'id_xe', 'id_nguoi_nhap_giao_hang', 'id_nguoi_gui', 'id_nguoi_duyet', 'tao_khong_qui_trinh', 'xuat_khong_qui_trinh', 'create_user'], 'integer'],
            [['thoi_gian_yeu_cau', 'ngay_giao_hang', 'thoi_gian_nhap_giao_hang', 'thoi_gian_duyet', 'create_date'], 'safe'],
            [['id_cong_trinh'], 'required'],
            [['ly_do', 'ghi_chu_giao_hang', 'nguoi_ky', 'y_kien_nguoi_gui', 'y_kien_nguoi_duyet'], 'string'],
            [['don_gia'], 'number'],
            [['trang_thai'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_phieu' => 'So Phieu',
            'nam' => 'Nam',
            'thoi_gian_yeu_cau' => 'Thoi Gian Yeu Cau',
            'id_cong_trinh' => 'Id Cong Trinh',
            'id_bo_phan_yc' => 'Id Bo Phan Yc',
            'ly_do' => 'Ly Do',
            'id_tai_xe' => 'Id Tai Xe',
            'id_xe' => 'Id Xe',
            'ngay_giao_hang' => 'Ngay Giao Hang',
            'ghi_chu_giao_hang' => 'Ghi Chu Giao Hang',
            'id_nguoi_nhap_giao_hang' => 'Id Nguoi Nhap Giao Hang',
            'thoi_gian_nhap_giao_hang' => 'Thoi Gian Nhap Giao Hang',
            'nguoi_ky' => 'Nguoi Ky',
            'id_nguoi_gui' => 'Id Nguoi Gui',
            'id_nguoi_duyet' => 'Id Nguoi Duyet',
            'don_gia' => 'Don Gia',
            'trang_thai' => 'Trang Thai',
            'y_kien_nguoi_gui' => 'Y Kien Nguoi Gui',
            'y_kien_nguoi_duyet' => 'Y Kien Nguoi Duyet',
            'thoi_gian_duyet' => 'Thoi Gian Duyet',
            'tao_khong_qui_trinh' => 'Tao Khong Qui Trinh',
            'xuat_khong_qui_trinh' => 'Xuat Khong Qui Trinh',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }
}
