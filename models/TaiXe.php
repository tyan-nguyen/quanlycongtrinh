<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tai_xe".
 *
 * @property int $id
 * @property string $ho_ten
 * @property string|null $dia_chi
 * @property string|null $so_dien_thoai
 * @property string|null $cccd
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property PhieuXuatKho[] $phieuXuatKhos
 */
class TaiXe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tai_xe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ho_ten'], 'required'],
            [['create_date'], 'safe'],
            [['create_user'], 'integer'],
            [['ho_ten', 'dia_chi'], 'string', 'max' => 255],
            [['so_dien_thoai'], 'string', 'max' => 15],
            [['cccd'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ho_ten' => 'Ho Ten',
            'dia_chi' => 'Dia Chi',
            'so_dien_thoai' => 'So Dien Thoai',
            'cccd' => 'Căn cước công dân',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKhos()
    {
        return $this->hasMany(PhieuXuatKho::class, ['id_tai_xe' => 'id']);
    }
}
