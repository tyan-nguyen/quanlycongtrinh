<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ke_hoach_phan_quyen".
 *
 * @property int $id
 * @property int $id_ke_hoach
 * @property int $id_nguoi_dung
 * @property string $quyen
 * @property int|null $ngung_phu_trach
 * @property string|null $create_date
 * @property int|null $create_user
 */
class KeHoachPhanQuyen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ke_hoach_phan_quyen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ke_hoach', 'id_nguoi_dung', 'quyen'], 'required'],
            [['id_ke_hoach', 'id_nguoi_dung', 'ngung_phu_trach', 'create_user'], 'integer'],
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
            'id_ke_hoach' => 'Id ke hoach',
            'id_nguoi_dung' => 'Id Nguoi Dung',
            'quyen' => 'Quyen',
            'ngung_phu_trach' => 'Ngung Phu Trach',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }
}
