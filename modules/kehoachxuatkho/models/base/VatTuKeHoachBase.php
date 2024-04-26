<?php

namespace app\modules\kehoachxuatkho\models\base;
use app\modules\kehoachxuatkho\models\KeHoachXuatKho;
use app\modules\vattu\models\VatTu;
use Yii;
use app\models\User;
use app\models\VatTuKeHoach;
/**
 * This is the model class for table "vat_tu_xuat".
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
class VatTuKeHoachBase extends VatTuKeHoach
{

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
            'id_phieu_xuat_kho' => 'Id Phieu Xuat Kho',
            'id_vat_tu' => 'Id Vat Tu',
            'don_gia' => 'Đơn giá',
            'ghi_chu' => 'Ghi Chu',
            'id_nguoi_duyet' => 'Id Nguoi Duyet',
            'trang_thai' => 'Trang Thai',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
            
        }
        return parent::beforeSave($insert);
    }
  
}
