<?php

namespace app\modules\vattu\models\base;

use app\modules\vattu\models\VatTu;

use Yii;

/**
 * This is the model class for table "loai_vat_tu".
 *
 * @property int $id
 * @property string $ten_loai_vat_tu
 * @property string $create_date
 * @property int $create_user
 *
 * @property VatTu[] $vatTus
 */
class LoaiVatTuBase extends \app\models\LoaiVatTu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_loai_vat_tu'], 'required'],
            [['create_date'], 'safe'],
            [['create_user'], 'integer'],
            [['ten_loai_vat_tu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'ten_loai_vat_tu' => 'Tên Loại Vật Tư',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Người Tạo',
        ];
    }
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
    public function getVatTus()
    {
        return $this->hasMany(VatTu::class, ['id_loai_vat_tu' => 'id']);
    }

}
