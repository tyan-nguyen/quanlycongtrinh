<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xe".
 *
 * @property int $id
 * @property string $hieu_xe
 * @property string|null $hang_xe
 * @property string|null $nam_san_xuat
 * @property string $bien_so_xe
 * @property string|null $hinh_xe
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property PhieuXuatKho[] $phieuXuatKhos
 */
class Xe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'xe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hieu_xe', 'bien_so_xe'], 'required'],
            [['nam_san_xuat', 'create_date'], 'safe'],
            [[ 'create_user'], 'integer'],
            [['hieu_xe', 'hang_xe', 'hinh_xe','bien_so_xe'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hieu_xe' => 'Hieu Xe',
            'hang_xe' => 'Hang Xe',
            'nam_san_xuat' => 'Nam San Xuat',
            'bien_so_xe' => 'Bien So Xe',
            'hinh_xe' => 'Hinh Xe',
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
        return $this->hasMany(PhieuXuatKho::class, ['id_xe' => 'id']);
    }
}
