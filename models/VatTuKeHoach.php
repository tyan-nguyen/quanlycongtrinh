<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vat_tu_ke_hoach".
 *
 * @property int $id
 * @property float $so_luong_yeu_cau
 * @property float|null $so_luong_duoc_duyet
 * @property int $id_phieu_xuat_kho
 * @property int $id_vat_tu
 * @property float|null $don_gia
 * @property string|null $ghi_chu
 * @property int|null $id_nguoi_duyet
 * @property string $trang_thai
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property User $nguoiDuyet
 * @property PhieuXuatKho $phieuXuatKho
 * @property VatTu $vatTu
 */
class VatTuKeHoach extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vat_tu_ke_hoach';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_luong_yeu_cau', 'id_phieu_xuat_kho', 'id_vat_tu', 'trang_thai'], 'required'],
            [['so_luong_yeu_cau', 'so_luong_duoc_duyet', 'don_gia'], 'number'],
            [['id_phieu_xuat_kho', 'id_vat_tu', 'id_nguoi_duyet', 'create_user'], 'integer'],
            [['ghi_chu'], 'string'],
            [['create_date'], 'safe'],
            [['trang_thai'], 'string', 'max' => 15],
            [['id_nguoi_duyet'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_nguoi_duyet' => 'id']],
            [['id_phieu_xuat_kho'], 'exist', 'skipOnError' => true, 'targetClass' => KeHoachXuatKho::class, 'targetAttribute' => ['id_phieu_xuat_kho' => 'id']],
            [['id_vat_tu'], 'exist', 'skipOnError' => true, 'targetClass' => VatTu::class, 'targetAttribute' => ['id_vat_tu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_luong_yeu_cau' => 'So Luong Yeu Cau',
            'so_luong_duoc_duyet' => 'So Luong Duoc Duyet',
            'id_phieu_xuat_kho' => 'Id Ke hoach xuat kho',
            'id_vat_tu' => 'Id Vat Tu',
            'don_gia' => 'Don Gia',
            'ghi_chu' => 'Ghi Chu',
            'id_nguoi_duyet' => 'Id Nguoi Duyet',
            'trang_thai' => 'Trang Thai',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
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
     * Gets query for [[PhieuXuatKho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKho()
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
}
