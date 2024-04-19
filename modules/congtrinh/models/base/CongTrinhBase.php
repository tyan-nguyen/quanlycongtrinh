<?php
namespace app\modules\congtrinh\models\base;
use app\modules\congtrinh\models\CongTrinh;
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
 * @property PhieuXuatKho[] $phieuXuatKhos
 * @property VatTuBocTach[] $vatTuBocTaches
 */
class CongTrinhBase extends \app\models\CongTrinh
{
    public $quyen;
    /**
     * Danh muc trang thai cong trinh
     * @return string[]
     */
    public static function getDmTrangThai(){
        return [
            'KHOI_TAO'=>'Khởi tạo',
            'THUC_HIEN'=>'Đang thực hiện',
            'HOAN_THANH'=>'Đã hoàn thành'
        ];
    }
    
    /**
     * Danh muc trang thai cong trinh label
     * @param int $val
     * @return string
     */
    public static function getDmTrangThaiLabel($val){
        $label = '';
        if($val == 'KHOI_TAO'){
            $label = 'Khởi tạo';
        }else if($val == 'THUC_HIEN'){
            $label = 'Đang thực hiện';
        }else if($val == 'HOAN_THANH'){
            $label = 'Đã hoàn thành';
        }
        return $label;
    }
    /**
     * Danh muc trang thai cong trinh
     * @return string[]
     */
    public static function getDmTrangThaiBocTach(){
        return [
            'SOAN_THAO'=>'Soạn thảo',
            'HOAN_THANH'=>'Đã hoàn thành',
            'CHINH_SUA'=>'Chỉnh sửa'
        ];
    }    
    /**
     * Danh muc trang thai cong trinh label
     * @param int $val
     * @return string
     */
    public static function getDmTrangThaiBocTachLabel($val){
        $label = '';
        if($val == 'SOAN_THAO'){
            $label = 'Soạn thảo';
        }else if($val == 'HOAN_THANH'){
            $label = 'Đã hoàn thành';
        }else if($val == 'CHINH_SUA'){
            $label = 'Chỉnh sửa';
        }
        return $label;
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
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinhBase::class, 'targetAttribute' => ['p_id' => 'id']],
            [['quyen'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_cong_trinh' => 'Tên Công Trình',
            'dia_diem' => 'Địa Điểm',
            'tg_bat_dau' => 'Thời Gian Bắt Đầu',
            'tg_ket_thuc' => 'Thời Gian Kết Thúc',
            'p_id' => 'P ID',
            'trang_thai' => 'Trạng Thái',
            'trang_thai_boc_tach' => 'Trang Thai Boc Tach',
            'ghi_chu' => 'Ghi Chu',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Giờ Tạo',
            
            'quyen' => 'Chọn tài khoản'
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
            if($this->trang_thai == null){
                $this->trang_thai = 'KHOI_TAO';
            }
            $this->trang_thai_boc_tach = 'SOAN_THAO';
        }
        
        return parent::beforeSave($insert);
    }
    
    public function getCongTrinh()
    {
        return $this->hasOne(CongTrinhBase::class, ['id' => 'p_id']);
    }
}
