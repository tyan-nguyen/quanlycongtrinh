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
 * @property string|null $ngay_nghiem_thu
 * @property string|null $ghi_chu_nghiem_thu
 * @property int|null $id_nguoi_nghiem_thu
 * @property string|null $thoi_gian_nhap_nghiem_thu
 * @property string|null $nguoi_ky
 * @property int|null $id_nguoi_gui
 * @property int|null $id_nguoi_duyet
 * @property string|null $trang_thai
 * @property string|null $y_kien_nguoi_gui
 * @property string|null $y_kien_nguoi_duyet
 * @property string|null $thoi_gian_duyet
 * @property int|null $tao_khong_qui_trinh
 * @property int|null $xuat_khong_qui_trinh
 * @property int|null $edit_mode
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property CongTrinh $congTrinh
 * @property KeHoachPhanQuyen[] $keHoachPhanQuyens
 * @property PhieuXuatKho[] $phieuXuatKhos
 * @property VatTuKeHoach[] $vatTuKeHoaches
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
            [['so_phieu', 'nam', 'id_cong_trinh', 'id_bo_phan_yc', 'id_nguoi_nghiem_thu', 'id_nguoi_gui', 'id_nguoi_duyet', 'tao_khong_qui_trinh', 'xuat_khong_qui_trinh', 'edit_mode', 'create_user'], 'integer'],
            [['thoi_gian_yeu_cau', 'ngay_nghiem_thu', 'thoi_gian_nhap_nghiem_thu', 'thoi_gian_duyet', 'create_date'], 'safe'],
            [['id_cong_trinh'], 'required'],
            [['ly_do', 'ghi_chu_nghiem_thu', 'nguoi_ky', 'y_kien_nguoi_gui', 'y_kien_nguoi_duyet'], 'string'],
            [['trang_thai'], 'string', 'max' => 20],
            [['id_cong_trinh'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['id_cong_trinh' => 'id']],
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
            'ngay_nghiem_thu' => 'Ngay Nghiem Thu',
            'ghi_chu_nghiem_thu' => 'Ghi Chu Nghiem Thu',
            'id_nguoi_nghiem_thu' => 'Id Nguoi Nghiem Thu',
            'thoi_gian_nhap_nghiem_thu' => 'Thoi Gian Nhap Nghiem Thu',
            'nguoi_ky' => 'Nguoi Ky',
            'id_nguoi_gui' => 'Id Nguoi Gui',
            'id_nguoi_duyet' => 'Id Nguoi Duyet',
            'trang_thai' => 'Trang Thai',
            'y_kien_nguoi_gui' => 'Y Kien Nguoi Gui',
            'y_kien_nguoi_duyet' => 'Y Kien Nguoi Duyet',
            'thoi_gian_duyet' => 'Thoi Gian Duyet',
            'tao_khong_qui_trinh' => 'Tao Khong Qui Trinh',
            'xuat_khong_qui_trinh' => 'Xuat Khong Qui Trinh',
            'edit_mode' => 'Edit Mode',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
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

    /**
     * Gets query for [[KeHoachPhanQuyens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKeHoachPhanQuyens()
    {
        return $this->hasMany(KeHoachPhanQuyen::class, ['id_ke_hoach' => 'id']);
    }

    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKhos()
    {
        return $this->hasMany(PhieuXuatKho::class, ['id_ke_hoach' => 'id']);
    }

    /**
     * Gets query for [[VatTuKeHoaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuKeHoaches()
    {
        return $this->hasMany(VatTuKeHoach::class, ['id_phieu_xuat_kho' => 'id']);
    }
}
