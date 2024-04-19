<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cong_trinh".
 *
 * @property int $id
 * @property string $ten_cong_trinh
 * @property string|null $dia_diem
 * @property string|null $tg_bat_dau
 * @property string|null $tg_ket_thuc
 * @property int|null $p_id
 * @property string|null $trang_thai
 * @property string|null $trang_thai_boc_tach
 * @property string|null $ghi_chu
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property CongTrinh[] $congTrinhs
 * @property CongTrinh $p
 * @property PhieuXuatKho[] $phieuXuatKhos
 * @property VatTuBocTach[] $vatTuBocTaches
 */
class CongTrinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cong_trinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_cong_trinh'], 'required'],
            [['tg_bat_dau', 'tg_ket_thuc', 'create_date'], 'safe'],
            [['p_id', 'create_user'], 'integer'],
            [['ghi_chu'], 'string'],
            [['ten_cong_trinh', 'dia_diem'], 'string', 'max' => 255],
            [['trang_thai', 'trang_thai_boc_tach'], 'string', 'max' => 20],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['p_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_cong_trinh' => 'Ten Cong Trinh',
            'dia_diem' => 'Dia Diem',
            'tg_bat_dau' => 'Tg Bat Dau',
            'tg_ket_thuc' => 'Tg Ket Thuc',
            'p_id' => 'P ID',
            'trang_thai' => 'Trang Thai',
            'trang_thai_boc_tach' => 'Trang Thai Boc Tach',
            'ghi_chu' => 'Ghi Chu',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

    /**
     * Gets query for [[CongTrinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongTrinhs()
    {
        return $this->hasMany(CongTrinh::class, ['p_id' => 'id']);
    }

    /**
     * Gets query for [[P]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'p_id']);
    }

    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKhos()
    {
        return $this->hasMany(PhieuXuatKho::class, ['id_cong_trinh' => 'id']);
    }

    /**
     * Gets query for [[VatTuBocTaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuBocTaches()
    {
        return $this->hasMany(VatTuBocTach::class, ['id_cong_trinh' => 'id']);
    }
}
