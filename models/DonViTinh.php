<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "don_vi_tinh".
 *
 * @property int $id
 * @property string $ma_dvt
 * @property string $ten_dvt
 *
 * @property VatTu[] $vatTus
 */
class DonViTinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'don_vi_tinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_dvt', 'ten_dvt'], 'required'],
            [['ma_dvt'], 'string', 'max' => 20],
            [['ten_dvt'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_dvt' => 'Ma Dvt',
            'ten_dvt' => 'Ten Dvt',
        ];
    }

    /**
     * Gets query for [[VatTus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTus()
    {
        return $this->hasMany(VatTu::class, ['don_vi_tinh' => 'id']);
    }
}
