<?php

namespace app\modules\vattu\models\base;

use app\modules\vattu\models\LoaiVatTu;

use Yii;
use app\modules\vattu\models\DonViTinh;

/**
 * This is the model class for table "vat_tu".
 *
 * @property int $id
 * @property string|null $ma_vat_tu
 * @property string $ten_vat_tu
 * @property float $so_luong
 * @property float $don_gia
 * @property int|null $don_vi_tinh
 * @property int $id_loai_vat_tu
 * @property string $create_date
 * @property int $create_user
 *
 * @property LoaiVatTu $loaiVatTu
 * @property VatTuBocTach[] $vatTuBocTaches
 * @property VatTuXuat[] $vatTuXuats
 */
class VatTuBase extends \app\models\Vattu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_vat_tu', 'so_luong', 'don_gia', 'id_loai_vat_tu'], 'required'],
            [['so_luong', 'don_gia'], 'number'],
            [['don_vi_tinh', 'id_loai_vat_tu', 'create_user'], 'integer'],
            [['create_date'], 'safe'],
            [['ten_vat_tu'], 'string', 'max' => 255],
            [['ma_vat_tu'], 'string', 'max' => 20],
            [['id_loai_vat_tu'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiVatTuBase::class, 'targetAttribute' => ['id_loai_vat_tu' => 'id']],
            [['don_vi_tinh'], 'exist', 'skipOnError' => true, 'targetClass' => DonViTinh::class, 'targetAttribute' => ['don_vi_tinh' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_vat_tu' => 'Ma Vat Tu',
            'ten_vat_tu' => 'Tên Vật Tư',
            'so_luong' => 'Số Lượng',
            'don_gia' => 'Đơn Giá',
            'don_vi_tinh' => 'Don Vi Tinh',
            'id_loai_vat_tu' => 'Id Loại Vật Tư',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Người Tạo',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }

    public function getLoaiVatTu()
    {
        return $this->hasOne(LoaiVatTu::class, ['id' => 'id_loai_vat_tu']);
    }

}
