<?php

namespace app\modules\nguoidung\models\base;

use Yii;
use app\models\UserRoom;

/**
 * @property int $id
 * @property string $room_name
 */
class PhongBanBase extends UserRoom
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_name'], 'required'],
            [['room_name'], 'string', 'max' => 200],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_name' => 'Room Name',
        ];
    }
}
