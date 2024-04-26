<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phieu_xuat_kho".
 *
 * @property int $id
 * @property int|null $so_phieu
 * @property int|null $nam
 * @property string|null $thoi_gian_yeu_cau
 * @property int $id_cong_trinh
 * @property int|null $id_ke_hoach
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
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property User $boPhanYc
 * @property CongTrinh $congTrinh
 * @property KeHoachXuatKho $keHoach
 * @property User $nguoiDuyet
 * @property TaiXe $taiXe
 * @property VatTuXuat[] $vatTuXuats
 * @property Xe $xe
 */
class PhieuXuatKho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phieu_xuat_kho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_phieu', 'nam', 'id_cong_trinh', 'id_ke_hoach', 'id_bo_phan_yc', 'id_tai_xe', 'id_xe', 'id_nguoi_nhap_giao_hang', 'id_nguoi_gui', 'id_nguoi_duyet', 'create_user'], 'integer'],
            [['thoi_gian_yeu_cau', 'ngay_giao_hang', 'thoi_gian_nhap_giao_hang', 'thoi_gian_duyet', 'create_date'], 'safe'],
            [['id_cong_trinh'], 'required'],
            [['ly_do', 'ghi_chu_giao_hang', 'nguoi_ky', 'y_kien_nguoi_gui', 'y_kien_nguoi_duyet'], 'string'],
            [['don_gia'], 'number'],
            [['trang_thai'], 'string', 'max' => 20],
            [['id_cong_trinh'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['id_cong_trinh' => 'id']],
            [['id_nguoi_duyet'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_nguoi_duyet' => 'id']],
            [['id_ke_hoach'], 'exist', 'skipOnError' => true, 'targetClass' => KeHoachXuatKho::class, 'targetAttribute' => ['id_ke_hoach' => 'id']],
            [['id_tai_xe'], 'exist', 'skipOnError' => true, 'targetClass' => TaiXe::class, 'targetAttribute' => ['id_tai_xe' => 'id']],
            [['id_xe'], 'exist', 'skipOnError' => true, 'targetClass' => Xe::class, 'targetAttribute' => ['id_xe' => 'id']],
            [['id_bo_phan_yc'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_bo_phan_yc' => 'id']],
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
            'id_ke_hoach' => 'Id Ke Hoach',
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
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

    /**
     * Gets query for [[BoPhanYc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBoPhanYc()
    {
        return $this->hasOne(User::class, ['id' => 'id_bo_phan_yc']);
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
     * Gets query for [[KeHoach]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKeHoach()
    {
        return $this->hasOne(KeHoachXuatKho::class, ['id' => 'id_ke_hoach']);
    }

    /**
     * Gets query for [[NguoiDuyet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiDuyet()
    {
        return $this->hasOne(User::class, ['id' => 'id_nguoi_duyet']);
    }

    /**
     * Gets query for [[TaiXe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaiXe()
    {
        return $this->hasOne(TaiXe::class, ['id' => 'id_tai_xe']);
    }

    /**
     * Gets query for [[VatTuXuats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuXuats()
    {
        return $this->hasMany(VatTuXuat::class, ['id_phieu_xuat_kho' => 'id']);
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
}
