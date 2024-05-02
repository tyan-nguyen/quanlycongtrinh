<?php
namespace app\modules\kehoachxuatkho\models\base;

use app\modules\congtrinh\models\CongTrinh;
use Yii;
use app\models\User;
/**
 * This is the model class for table "ke_hoach_xuat_kho".
 *
 * @property int $id
 * @property int|null $so_phieu
 * @property int|null $nam
 * @property string $thoi_gian_yeu_cau
 * @property int $id_cong_trinh
 * @property int $id_bo_phan_yc
 * @property string $ly_do
 * @property string|null $ngay_nghiem_thu
 * @property string|null $ghi_chu_nghiem_thu
 * @property int|null $id_nguoi_nghiem_thu
 * @property string|null $thoi_gian_nhap_nghiem_thu
 * @property string|null $nguoi_ky
 * @property int|null $id_nguoi_gui
 * @property int|null $id_nguoi_duyet
 * @property string $trang_thai
 * @property string|null $y_kien_nguoi_gui
 * @property string|null $y_kien_nguoi_duyet
 * @property string|null $thoi_gian_duyet
 * @property int|null $tao_khong_qui_trinh
 * @property int|null $xuat_khong_qui_trinh
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property User $boPhanYc
 * @property CongTrinh $congTrinh
 * @property User $nguoiDuyet
 * @property TaiXe $taiXe
 * @property VatTuXuat[] $vatTuXuats
 * @property Xe $xe
 */
class KeHoachXuatKhoBase extends \app\models\KeHoachXuatKho
{
    public $kiemTraVatTuDaDuyet;
    /**
     * Danh muc trang thai phieu xuat kho
     * @return string[]
     */
    public static function getDmTrangThai(){
        return [
            'BAN_NHAP'=>'Bản nháp',
            'CHO_DUYET'=>'Chờ duyệt',
            'DA_DUYET'=>'Đã duyệt',
            'KHONG_DUYET'=>'Không duyệt',
            'DA_HOAN_THANH'=>'Nghiệm thu',
        ];
    }
    
    /**
     * Danh muc trang thai phieu xuat kho label
     * @param int $val
     * @return string
     */
    public static function getDmTrangThaiLabel($val){
        $label = '';
        if($val == 'BAN_NHAP'){
            $label = 'Bản nháp';
        }else if($val == 'CHO_DUYET'){
            $label = 'Chờ duyệt';
        }else if($val == 'DA_DUYET'){
            $label = 'Đã duyệt';
        }else if($val == 'KHONG_DUYET'){
            $label = 'Không duyệt';
        }else if($val == 'DA_HOAN_THANH'){
            $label = 'Nghiệm thu';
        }
        return $label;
    }
    
    /**
     * danh muc trang thai da vo so phieu
     */
    public static function getDmTrangThaiCoSoPhieu(){
        return [
            'CHO_DUYET',
            'DA_DUYET',
            'KHONG_DUYET',
            'DA_HOAN_THANH'
        ];
    }
    
    /**
     * danh muc trang thai duoc duyet hoac ok
     */
    public static function getDmTrangThaiDuocDuyet(){
        return [
            'DA_DUYET',
            'DA_HOAN_THANH'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cong_trinh'], 'required'],
            [['ly_do'], 'required', 'on'=>'gui-phieu'], //on gui yeu cau
            [['y_kien_nguoi_duyet'], 'required', 'on'=>'duyet-phieu'], //on gui yeu cau
            [['ghi_chu_nghiem_thu', 'ngay_nghiem_thu'], 'required', 'on'=>'duyet-giao-hang'], //on gui yeu cau
            [['thoi_gian_yeu_cau', 'create_date', 'ngay_nghiem_thu', 'thoi_gian_duyet', 'thoi_gian_nhap_nghiem_thu', 'kiemTraVatTuDaDuyet'], 'safe'],
            [['so_phieu', 'nam', 'id_cong_trinh', 'id_bo_phan_yc', 'id_nguoi_nghiem_thu', 'id_nguoi_gui', 'id_nguoi_duyet', 'tao_khong_qui_trinh', 'xuat_khong_qui_trinh', 'create_user'], 'integer'],
            [['ly_do', 'ghi_chu_nghiem_thu', 'nguoi_ky', 'y_kien_nguoi_gui', 'y_kien_nguoi_duyet'], 'string'],
            [['trang_thai'], 'string', 'max' => 20],
            [['id_cong_trinh'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['id_cong_trinh' => 'id']],
            [['id_nguoi_duyet'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_nguoi_duyet' => 'id']],
            [['id_bo_phan_yc'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_bo_phan_yc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_phieu' => 'Số Kế hoạch',
            'nam' => 'Năm vào sổ',
            
            'id_cong_trinh' => 'Công trình',
            'id_bo_phan_yc' => 'Bộ phận yêu cầu',
            'ly_do' => 'Lý do xuất kho',
            
            'ngay_nghiem_thu' => 'Ngày nghiệm thu',
            'ghi_chu_nghiem_thu' => 'Ghi chú nghiệm thu',
            'id_nguoi_nghiem_thu' => 'Người nghiệm thu',
            'thoi_gian_nhap_nghiem_thu' => 'Thời gian nhập nghiệm thu',
            
            'nguoi_ky' => 'Nguoi Ky',//
            'id_nguoi_gui' => 'Người gửi',
            'y_kien_nguoi_gui' => 'Ý kiến người gửi',
            'thoi_gian_yeu_cau' => 'Thời gian yêu cầu',
            'id_nguoi_duyet' => 'Người duyệt',
            'thoi_gian_duyet' => 'Thời gian duyệt',
            'y_kien_nguoi_duyet' => 'Ý kiến người duyệt',
            'trang_thai' => 'Trạng thái',
            'tao_khong_qui_trinh' => 'Thêm mới không qua qui trình',
            'xuat_khong_qui_trinh' => 'Xuất vật tư không qua qui trình',
            'create_date' => 'Ngày tạo',
            'create_user' => 'Người tạo',
            
            'kiemTraVatTuDaDuyet' => 'Kiểm tra duyệt vật tư: ',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
            if($this->trang_thai == NULL)
                $this->trang_thai = 'BAN_NHAP';
            if($this->nam == NULL)
                $this->nam = date('Y');
            if($this->xuat_khong_qui_trinh == NULL)
                $this->xuat_khong_qui_trinh  = 0;
            if($this->tao_khong_qui_trinh == NULL)
                $this->tao_khong_qui_trinh  = 0;
        }
        return parent::beforeSave($insert);
    }
    
}
