<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $confirmation_token
 * @property int $status
 * @property int|null $superadmin
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $registration_ip
 * @property string|null $bind_to_ip
 * @property string|null $email
 * @property int $email_confirmed
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property int|null $id_phong
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property PhieuXuatKho[] $phieuXuatKhos
 * @property PhieuXuatKho[] $phieuXuatKhos0
 * @property UserVisitLog[] $userVisitLogs
 * @property VatTuXuat[] $vatTuXuats
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at', 'name', 'phone', 'address'], 'required'],
            [['status', 'superadmin', 'created_at', 'updated_at', 'email_confirmed', 'id_phong'], 'integer'],
            [['username', 'password_hash', 'confirmation_token', 'bind_to_ip'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 128],
            [['name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'confirmation_token' => 'Confirmation Token',
            'status' => 'Status',
            'superadmin' => 'Superadmin',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'registration_ip' => 'Registration Ip',
            'bind_to_ip' => 'Bind To Ip',
            'email' => 'Email',
            'email_confirmed' => 'Email Confirmed',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'id_phong' => 'Id Phong',
        ];
    }

    /**
     * Gets query for [[AuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ItemNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::class, ['name' => 'item_name'])->viaTable('auth_assignment', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKhos()
    {
        return $this->hasMany(PhieuXuatKho::class, ['id_nguoi_duyet' => 'id']);
    }

    /**
     * Gets query for [[PhieuXuatKhos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKhos0()
    {
        return $this->hasMany(PhieuXuatKho::class, ['id_bo_phan_yc' => 'id']);
    }

    /**
     * Gets query for [[UserVisitLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserVisitLogs()
    {
        return $this->hasMany(UserVisitLog::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[VatTuXuats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuXuats()
    {
        return $this->hasMany(VatTuXuat::class, ['id_nguoi_duyet' => 'id']);
    }
}
