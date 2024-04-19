<?php

namespace app\modules\vanchuyen\Taixe\models\base;

use Yii;

/**
 * This is the model class for table "tai_xe".
 *
 * @property int $id
 * @property string $ho_ten
 * @property string|null $dia_chi
 * @property string|null $so_dien_thoai
 *  @property string|null cccd
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property PhieuXuatKho[] $phieuXuatKhos
 */
class TaiXeBase extends \app\models\TaiXe
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
            'ho_ten' => 'Họ Tên',
            'dia_chi' => 'Địa Chỉ',
            'so_dien_thoai' => 'Số Điện Thoại',
            'cccd' => 'Căn Cước Công Dân',
            'create_date' => 'Ngày tạo',
            'create_user' => 'Người tạo',
        ];
    }

    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
