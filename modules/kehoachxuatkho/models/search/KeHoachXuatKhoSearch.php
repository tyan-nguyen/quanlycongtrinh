<?php
namespace app\modules\kehoachxuatkho\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\kehoachxuatkho\models\KeHoachXuatKho;
use app\custom\CustomFunc;
use app\modules\nguoidung\models\NguoiDung;

/**
 * PhieuXuatKhoSearch represents the model behind the search form about `app\models\PhieuXuatKho`.
 */
class KeHoachXuatKhoSearch extends KeHoachXuatKho
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cong_trinh', 'id_bo_phan_yc', 'id_nguoi_duyet', 'create_user', 'so_phieu', 'nam', 'edit_mode'], 'integer'],
            [['thoi_gian_yeu_cau', 'ly_do', 'nguoi_ky', 'trang_thai', 'create_date', 'ghi_chu_nghiem_thu', 'ngay_nghiem_thu'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $idCongTrinh=NULL)
    {
        $custom = new CustomFunc();
        $query = KeHoachXuatKho::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if($idCongTrinh == null){
            $query->andFilterWhere([
                'id_cong_trinh' => $this->id_cong_trinh,
            ]);
        } else {
            $query->andFilterWhere([
                'id_cong_trinh' => $idCongTrinh,
            ]);
        }
        
        if($this->thoi_gian_yeu_cau != null){
            /* $query->andFilterWhere([
                'thoi_gian_yeu_cau' => $custom->convertDMYToYMD($this->thoi_gian_yeu_cau),
            ]); */
            $query->andWhere('date(thoi_gian_yeu_cau) = :tgyc', [':tgyc'=>$custom->convertDMYToYMD($this->thoi_gian_yeu_cau)]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            //'thoi_gian_yeu_cau' => $this->thoi_gian_yeu_cau,
            'id_bo_phan_yc' => $this->id_bo_phan_yc,
            'id_nguoi_duyet' => $this->id_nguoi_duyet,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'nam' => $this->nam,
            'so_phieu' => $this->so_phieu,
            'ngay_nghiem_thu' => $this->ngay_nghiem_thu,
        ]);

        $query->andFilterWhere(['like', 'ly_do', $this->ly_do])
            ->andFilterWhere(['like', 'nguoi_ky', $this->nguoi_ky])
            ->andFilterWhere(['like', 'trang_thai', $this->trang_thai])
            ->andFilterWhere(['like', 'ghi_chu_nghiem_thu', $this->ghi_chu_nghiem_thu]);

        return $dataProvider;
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchPhieuDuyet($params)
    {
        $custom = new CustomFunc();
        $query = KeHoachXuatKho::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if($this->thoi_gian_yeu_cau != null){
            /* $query->andFilterWhere([
             'thoi_gian_yeu_cau' => $custom->convertDMYToYMD($this->thoi_gian_yeu_cau),
             ]); */
            $query->andWhere('date(thoi_gian_yeu_cau) = :tgyc', [':tgyc'=>$custom->convertDMYToYMD($this->thoi_gian_yeu_cau)]);
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_cong_trinh' => $this->id_cong_trinh,
            //'thoi_gian_yeu_cau' => $this->thoi_gian_yeu_cau,
            'id_bo_phan_yc' => $this->id_bo_phan_yc,
            'id_nguoi_duyet' => $this->id_nguoi_duyet,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'nam' => $this->nam,
            'so_phieu' => $this->so_phieu,
            'ngay_nghiem_thu' => $this->ngay_nghiem_thu,
            'trang_thai'=>'DA_DUYET'//chi lay trang thai cho duyet
        ]);
        
       // $listCongTrinhAvailabel = NguoiDung::getTatCaCongTrinhDuyet();
        $listCongTrinhAvailabel = NguoiDung::getTatCaCongTrinhDuyet();
        if($listCongTrinhAvailabel != null){
            $query->andFilterWhere(['IN','id_cong_trinh',$listCongTrinhAvailabel ]);
        }
        else {
            $query->andFilterWhere(['IN','id_cong_trinh',[0]]);//khong load du lieu
        }
        
        
        $query->andFilterWhere(['like', 'ly_do', $this->ly_do])
        ->andFilterWhere(['like', 'nguoi_ky', $this->nguoi_ky])
        //->andFilterWhere(['like', 'trang_thai', $this->trang_thai])
        ->andFilterWhere(['like', 'ghi_chu_nghiem_thu', $this->ghi_chu_nghiem_thu]);
        
        return $dataProvider;
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchPhieuNghiemThu($params)
    {
        $custom = new CustomFunc();
        $query = KeHoachXuatKho::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if($this->thoi_gian_yeu_cau != null){
            /* $query->andFilterWhere([
             'thoi_gian_yeu_cau' => $custom->convertDMYToYMD($this->thoi_gian_yeu_cau),
             ]); */
            $query->andWhere('date(thoi_gian_yeu_cau) = :tgyc', [':tgyc'=>$custom->convertDMYToYMD($this->thoi_gian_yeu_cau)]);
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_cong_trinh' => $this->id_cong_trinh,
            //'thoi_gian_yeu_cau' => $this->thoi_gian_yeu_cau,
            'id_bo_phan_yc' => $this->id_bo_phan_yc,
            'id_nguoi_duyet' => $this->id_nguoi_duyet,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'nam' => $this->nam,
            'so_phieu' => $this->so_phieu,
            'ngay_nghiem_thu' => $this->ngay_nghiem_thu,
            'trang_thai'=>'DA_DUYET'//chi lay trang thai cho duyet
        ]);
        
        // $listCongTrinhAvailabel = NguoiDung::getTatCaCongTrinhDuyet();
        $listCongTrinhAvailabel = NguoiDung::getTatCaCongTrinhDuyet();
        if($listCongTrinhAvailabel != null){
            $query->andFilterWhere(['IN','id_cong_trinh',$listCongTrinhAvailabel ]);
        }
        else {
            $query->andFilterWhere(['IN','id_cong_trinh',[0]]);//khong load du lieu
        }
        
        
        $query->andFilterWhere(['like', 'ly_do', $this->ly_do])
        ->andFilterWhere(['like', 'nguoi_ky', $this->nguoi_ky])
        //->andFilterWhere(['like', 'trang_thai', $this->trang_thai])
        ->andFilterWhere(['like', 'ghi_chu_nghiem_thu', $this->ghi_chu_nghiem_thu]);
        
        return $dataProvider;
    }
}
