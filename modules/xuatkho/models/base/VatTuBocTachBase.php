<?php

namespace app\modules\xuatkho\models\base;
use app\modules\congtrinh\models\CongTrinh;
use app\modules\vattu\models\VatTu;
use Yii;

/**
 * This is the model class for table "vat_tu_boc_tach".
 *
 * @property int $id
 * @property float $so_luong
 * @property float|null $don_gia
 * @property int $id_cong_trinh
 * @property int $id_vat_tu
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property CongTrinh $congTrinh
 * @property VatTu $vatTu
 */
class VatTuBocTachBase extends \app\models\VatTuBocTach
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_luong', 'id_cong_trinh', 'id_vat_tu'], 'required'],
            [['so_luong', 'don_gia'], 'number'],
            [['id_cong_trinh', 'id_vat_tu', 'create_user'], 'integer'],
            [['create_date'], 'safe'],
            [['id_cong_trinh'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['id_cong_trinh' => 'id']],
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
            'so_luong' => 'Số lượng',
            'don_gia' => 'Đơn giá',
            'id_cong_trinh' => 'Công trình',
            'id_vat_tu' => 'Vật tư',
            'create_date' => 'Ngày tạo',
            'create_user' => 'Người tạo',
        ];
    }

    /**
     * Gets query for [[CongTrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongTrinh()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'id_cong_trinh']);
    }

    /**
     * Gets query for [[VatTu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTu()
    {
        return $this->hasOne(VatTu::class, ['id' => 'id_vat_tu']);
    }
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
