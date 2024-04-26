<?php

namespace app\modules\kehoachxuatkho\controllers;

use Yii;
use app\modules\kehoachxuatkho\models\KeHoachXuatKho;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\kehoachxuatkho\models\VatTuKeHoach;
use app\modules\vattu\models\LoaiVatTu;
use app\modules\vattu\models\VatTu;
use app\modules\congtrinh\models\CongTrinh;
use app\modules\kehoachxuatkho\models\search\KeHoachXuatKhoSearch;

/**
 * Default controller for the `xuatkho` module
 */
class PhieuXuatKhoController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
    
    public function actionGetListVatTu($selected){
        Yii::$app->response->format = Response::FORMAT_JSON;
        //lay list vat tu
        $options = '<option>--Select--</option>';
        $lvts = LoaiVatTu::find()->all();
        foreach ($lvts as $iLvt=>$lvt){
            $vts = VatTu::find()->where(['id_loai_vat_tu'=>$lvt->id])->all();
            if($vts != null){
                $options .= '<optgroup label="'. $lvt->ten_loai_vat_tu .'">';
                foreach ($vts as $iVt=>$vt){
                    $options .= '<option value="'. $vt->id .'" '. ($vt->id==$selected ? 'selected' : '') .'>'. $vt->ten_vat_tu .'</option>';
                }
                $options .= '</optgroup>';
            }
        }
        /* $options .= '<optgroup label="Swedish Cars">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        </optgroup>
        <optgroup label="German Cars">
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
        </optgroup>'; */
        return ['options' => $options];
    }
    
    public function actionGetVatTuAjax($idvt){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $vt = VatTu::findOne($idvt);
        if($vt != null){
            return [
                'status'=>'success', 
                'donGia' => $vt->don_gia, 
                'dvt' => $vt->donViTinh->ten_dvt, 
                'loaiVatTu' => $vt->loaiVatTu->ten_loai_vat_tu
            ];
        } else {
            return ['status'=>'failed'];
        }
    }
    
    public function actionSaveVatTu($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phieu = KeHoachXuatKho::findOne($id);
        if($phieu != null){
            if(isset($_POST['id']) && $_POST['id'] != null){
                //update
                $model= VatTuKeHoach::findOne($_POST['id']);
                $model->trang_thai = 'MOI';
                if(isset($_POST['slyc']))
                    $model->so_luong_yeu_cau = $_POST['slyc'];
               // $model->id_vat_tu = $_POST['idVatTu'];
                if(isset($_POST['sldd'])){
                    $model->so_luong_duoc_duyet = $_POST['sldd'];
                    $model->trang_thai = 'DA_DUYET';
                }
                if(isset($_POST['donGia']))
                    $model->don_gia = $_POST['donGia'];
                if(isset($_POST['ghiChu']))
                    $model->ghi_chu =$_POST['ghiChu'];
               
                if($model->save()){
                    $phieu->refresh();
                    return [
                        'type'=>'update',
                        'status'=>'success',
                        'results'=>$phieu->dsVatTuYeuCau(),
                        'vatTuXuat'=>$model->danhSachJson()
                    ];
                } else {
                    return [
                        'status' => 'error',
                        'message' => 'can not save from update'
                    ];
                }
            } else {
                //check vat tu da co trong phieu xuat chua
                $vatTu = VatTuKeHoach::find()->where([
                    'id_phieu_xuat_kho' => $id,
                    'id_vat_tu' => $_POST['idVatTu'],
                ])->one();
                if($vatTu != null){
                    return [
                        'status' => 'error',
                        'message' => 'Vật tư đã tồn tại trong phiếu. Vui lòng kiểm tra lại!'
                    ];
                } else {
                    //create
                    $model = new VatTuKeHoach();
                    $model->id_phieu_xuat_kho = $id;
                    $model->so_luong_yeu_cau = $_POST['slyc'];
                    $model->id_vat_tu = $_POST['idVatTu'];
                    $model->don_gia = $_POST['donGia'];
                    $model->ghi_chu = isset($_POST['ghiChu'])?$_POST['ghiChu']:'';
                    $model->trang_thai = 'MOI';
                    if($model->save()){
                        $phieu->refresh();
                        return [
                            'type'=>'create',
                            'status'=>'success',
                            'results'=>$phieu->dsVatTuYeuCau(),
                            'vatTuXuat'=>$model->danhSachJson()
                        ];
                    } else {
                        return [
                            'status' => 'error',
                            'message'=>'can not save from create'
                        ];
                    }
                }
            }
        }else{
            return [
                'status' => 'error',
                'message'=>'Phiếu xuất kho không tồn tại!'
            ];
        }
    }
    
    public function actionDeleteVatTu($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $vatTu = VatTuKeHoach::findOne($id);
        if($vatTu != null){
            $phieuId = $vatTu->id_phieu_xuat_kho;
            if($vatTu->delete()){
                $phieu = KeHoachXuatKho::findOne($phieuId);
                return [
                    'type'=>'delete',
                    'status'=>'success',
                    'results'=>$phieu->dsVatTuYeuCau(),
                ];
            } else {
                return [
                    'type'=>'delete',
                    'status'=>'error',
                    'message'=>'Có lỗi xảy ra!',
                    'results'=>$phieu->dsVatTuYeuCau(),
                ];
            }
        }
    }

    /**
     * danh sách tất cả phiếu xuất
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new KeHoachXuatKhoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
     /**
     * danh sách phiếu duyệt
     * @return mixed
     */
    public function actionPhieuDuyet()
    {
        $searchModel = new KeHoachXuatKhoSearch();
        $dataProvider = $searchModel->searchPhieuDuyet(Yii::$app->request->queryParams);
        
        return $this->render('index-phieu-duyet', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all PhieuXuatKho models.
     * @return mixed
     */
    public function actionPhieuXuatKeHoach($id)
    {
        $searchModel = new KeHoachXuatKhoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        $model = CongTrinh::findOne($id);
        if($model !=null){        
            return $this->render('index-ke-hoach', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model
            ]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
     * load phieu xuat kho in
     * @return mixed
     */
    public function actionGetPhieuXuatKhoInAjax($idPhieu)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = KeHoachXuatKho::findOne($idPhieu);
        if($model !=null){
            return [
               'status'=>'success',
               'content' => $this->renderAjax('_print_phieu', [
                    'model' => $model
                ])  
            ];
        } else {
            return [
                'status'=>'failed',
                'content' => 'Phiếu xuất kho không tồn tại!'
            ];
        }
    }


    /**
     * Displays a single PhieuXuatKho model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "PhieuXuatKho #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t('app', 'Edit'),['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new PhieuXuatKho model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($idct){
        //$request = Yii::$app->request;
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $modelCongTrinh = CongTrinh::findOne($idct);
        if($modelCongTrinh == null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        } else {
            $model = new KeHoachXuatKho();
            $model->id_cong_trinh = $idct;
            if($model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
                ];  
            } else {
                return [
                    'err' => $model->errors
                ];
            }
        }
    }
    /* public function actionCreate($id=NULL)
    {
        $request = Yii::$app->request;
        $model = new PhieuXuatKho();  
        $modelCongTrinh = CongTrinh::findOne($id);
        if($modelCongTrinh == null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        } else {
        
            if($request->isAjax){
                Yii::$app->response->format = Response::FORMAT_JSON;
                if($request->isGet){
                    return [
                        'title'=> Yii::t('app', 'Create new') . " PhieuXuatKho",
                        'content'=>$this->renderAjax('create', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
            
                    ];         
                }else if($model->load($request->post())){
                    if($id != NULL){
                        $model->id_cong_trinh = $id;
                    }
                    if($model->save()){
                        return [
                            'forceReload'=>'#crud-datatable-pjax',
                            'title'=> Yii::t('app', 'Create new')." PhieuXuatKho",
                            'content'=>'<span class="text-success">' . Yii::t('app', 'Create success!').'</span>',
                            'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::a(Yii::t('app', 'Create more'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
                
                        ];   
                    }else{
                        return [
                            'title'=> Yii::t('app', 'Create new') ." PhieuXuatKho",
                            'content'=>$this->renderAjax('create', [
                                'model' => $model,
                            ]),
                            'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
                            
                        ];
                    }
                }else{           
                    return [
                        'title'=> Yii::t('app', 'Create new') ." PhieuXuatKho",
                        'content'=>$this->renderAjax('create', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
            
                    ];         
                }
            }else{
                if ($model->load($request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
        }//end if modelCongTrinh
       
    } */

    /**
     * Updates an existing PhieuXuatKho model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id=NULL)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
            
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                    'toast'=>'Cập nhật thông tin thành công!'
                ];   
            }else{
                 return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing PhieuXuatKho model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing PhieuXuatKho model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the PhieuXuatKho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeHoachXuatKho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KeHoachXuatKho::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
   
}
