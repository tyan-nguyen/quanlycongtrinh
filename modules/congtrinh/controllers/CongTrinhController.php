<?php

namespace app\modules\congtrinh\controllers;

use Yii;
use app\modules\congtrinh\models\CongTrinh;
use app\modules\congtrinh\models\search\CongTrinhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\congtrinh\models\CongTrinhQuyen;
use app\modules\xuatkho\models\VatTuBocTach;
use app\modules\xuatkho\models\search\PhieuXuatKhoSearch;
use app\modules\xuatkho\models\search\VatTuBocTachSearch;

/**
 * CongTrinhController implements the CRUD actions for Congtrinh model.
 */
class CongTrinhController extends Controller
{
	
    /**
     * @inheritdoc
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
    
    public function actionSaveVatTuBocTach($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $congTrinh = CongTrinh::findOne($id);
        if($congTrinh != null){
            if(isset($_POST['id']) && $_POST['id'] != null){
                //update
                $model= VatTuBocTach::findOne($_POST['id']);
                if(isset($_POST['soLuong']))
                    $model->so_luong = $_POST['soLuong'];
                if(isset($_POST['donGia']))
                    $model->don_gia = $_POST['donGia'];
                            
                if($model->save()){
                    $congTrinh->refresh();
                    return [
                        'type'=>'update',
                        'status'=>'success',
                        'results'=>$congTrinh->dsVatTuBocTach(),
                        'vatTuBocTach'=>$model->danhSachJson()
                    ];
                } else {
                    return [
                        'status' => 'error',
                        'message' => 'can not save from update'
                    ];
                }
            } else {
                //check vat tu da co trong phieu xuat chua
                $vatTu = VatTuBocTach::find()->where([
                    'id_cong_trinh' => $id,
                    'id_vat_tu' => $_POST['idVatTu'],
                ])->one();
                if($vatTu != null){
                    return [
                        'status' => 'error',
                        'message' => 'Vật tư đã tồn tại trong phiếu. Vui lòng kiểm tra lại!'
                    ];
                } else {
                    //create
                    $model = new VatTuBocTach();
                    $model->id_cong_trinh = $id;
                    $model->so_luong = $_POST['soLuong'];
                    $model->id_vat_tu = $_POST['idVatTu'];
                    $model->don_gia = $_POST['donGia'];
                    /* $model->ghi_chu = isset($_POST['ghiChu'])?$_POST['ghiChu']:'';
                    $model->trang_thai = 'moi'; */
                    if($model->save()){
                        $congTrinh->refresh();
                        return [
                            'type'=>'create',
                            'status'=>'success',
                            'results'=>$congTrinh->dsVatTuBocTach(),
                            'vatTuBocTach'=>$model->danhSachJson()
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
                'message'=>'Công trình không tồn tại!'
            ];
        }
    }
    
    public function actionDeleteVatTu($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $vatTu = VatTuBocTach::findOne($id);
        if($vatTu != null){
            $congTrinhId = $vatTu->id_cong_trinh;
            if($vatTu->delete()){
                $congTrinh = CongTrinh::findOne($congTrinhId);
                return [
                    'type'=>'delete',
                    'status'=>'success',
                    'results'=>$congTrinh->dsVatTuBocTach(),
                ];
            } else {
                $congTrinh = CongTrinh::findOne($congTrinhId);
                return [
                    'type'=>'delete',
                    'status'=>'error',
                    'message'=>'Có lỗi xảy ra!',
                    'results'=>$congTrinh->dsVatTuBocTach(),
                ];
            }
        }
    }

    /**
     * Lists all Congtrinh models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new CongTrinhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Congtrinh model.
     * @param integer $id
     * @return mixed
     */
    public function actionChiTiet($id)
    {
        $searchModel = new PhieuXuatKhoSearch();
        $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams, $id);
        $searchModel2 = new VatTuBocTachSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams, $id);
        return $this->render('chi-tiet', [
            'model' => $this->findModel($id),
            'dataProvider1' => $dataProvider1,
            'dataProvider2' => $dataProvider2,
        ]);
    }


    /**
     * Displays a single Congtrinh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Công trình #".$id,
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
     * Creates a new Congtrinh model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Congtrinh();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> Yii::t('app', 'Tạo mới') . " Công trình",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
                /* return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> Yii::t('app', 'Tạo mới')." Công trình",
                    'content'=>'<span class="text-success">' . Yii::t('app', 'Tạo thành công!').'</span>',
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t('app', 'Tiếp tục tạo'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];   */       
            }else{           
                return [
                    'title'=> Yii::t('app', 'Tạo mới') ." Công trình",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }
    
    /**
     * Phan quyen cho cong trinh.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionPermission($id)
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
                    'title'=> 'Phân quyền công trình #CT' . $model->id,
                    'content'=>$this->renderAjax('_update_permission', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post())){
                //check null
                $quyenIsNull = true;
                $dmQuyens = CongTrinhQuyen::getDmQuyen();
                foreach ($dmQuyens as $indexQuyen=>$dmQuyen){
                    if($model->quyen[$indexQuyen]!=NUll){
                        $quyenIsNull = false;
                        break;
                    }
                }
                
                if($quyenIsNull == false){
                    //xóa quyền
                    foreach ($dmQuyens as $indexQuyen=>$dmQuyen){
                        $ctQuyens = CongTrinhQuyen::find()->where([
                            'id_cong_trinh'=>$id,
                            'quyen' => $indexQuyen
                        ])->all();
                        foreach ($ctQuyens as $indexCtQuyen=>$ctQuyen){
                            if($model->quyen[$indexQuyen] == null || !in_array($ctQuyen->id_nguoi_dung, $model->quyen[$indexQuyen])){
                                //$ctQuyen->thucHienXoa(); //chinh sua lai cho logic
                                $ctQuyen->delete();//tam thoi lay cai nay
                            }
                        }//end foreach $ctQuyens
                    }//end foreach $dmQuyens
                    
                    //thêm quyền
                    foreach ($model->quyen as $indexQ=>$valQ){
                        if($valQ != null){
                            foreach ($valQ as $indexQ1=>$q1){
                                $checkQ = CongTrinhQuyen::find()->where([
                                    'id_nguoi_dung'=>$q1,
                                    'id_cong_trinh'=>$id,
                                    'quyen'=>$indexQ
                                ])->one();
                                if($checkQ == null){
                                    $newQ = new CongTrinhQuyen();
                                    $newQ->id_cong_trinh = $id;
                                    $newQ->id_nguoi_dung = $q1;
                                    $newQ->quyen = $indexQ;
                                    $newQ->save();
                                }else{
                                    
                                }
                            }//end foreach $valQ
                        }//end if
                    }
                }else{
                    //xoa het
                    $ctQuyens = CongTrinhQuyen::find()->where([
                        'id_cong_trinh'=>$id
                    ])->all();
                    foreach ($ctQuyens as $indexCtQuyen=>$ctQuyen){
                        $ctQuyen->delete();
                    }//end foreach $ctQuyens
                }
                return [
                    'title'=> 'Phân quyền công trình #CT' . $model->id,
                    'content'=>$this->renderAjax('_update_permission', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"]),
                    'toast'=>'Cập nhật thông tin thành công!'
                ];
                //return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax','toast'=>'Cập nhật thông tin thành công!'];
                /*
                if($model->taglist != null){
                    //new
                    $arr = array();
                    foreach ($model->taglist as $indexTag=>$valTag){
                        $checkTag = TagList::find()->where(['name'=>$valTag])->one();
                        if($checkTag == null){
                            $newTag = new TagList();
                            $newTag->name = $valTag;
                            if($newTag->save())
                                $arr[] = $newTag->slug;
                        }else{
                            $arr[] = $checkTag->slug;
                        }
                    }
                    $model->tags = implode(';', $arr);
                    
                    //update
                    $arr = array();
                    foreach ($model->taglist as $indexTag=>$valTag){
                        $checkTag = TagList::find()->where(['name'=>$valTag])->one();
                        if($checkTag == null){
                            $newTag = new TagList();
                            $newTag->name = $valTag;
                            if($newTag->save())
                                $arr[] = $newTag->slug;
                        }else{
                            $arr[] = $checkTag->slug;
                        }
                    }
                    $model->tags = implode(';', $arr);
                }
                else {
                    $model->tags = '';
                }
                */
                
                //if($model->save()){
                  //  return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax','toast'=>'Cập nhật thông tin thành công!'];
                    /* return [
                     'forceReload'=>'#crud-datatable-pjax',
                     'title'=> "Công trình #".$id,
                     'content'=>$this->renderAjax('view', [
                     'model' => $model,
                     ]),
                     'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                     Html::a(Yii::t('app', 'Edit'),['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                     ];   */
                //}
            }else{
                return [
                    'title'=> Yii::t('app', 'Cập nhật') ." Công trình #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
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
     * Updates an existing Congtrinh model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
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
                    'title'=> Yii::t('app', 'Cập nhật'). " Công trình #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
               // return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax','toast'=>'Cập nhật thông tin thành công!'];
                /* return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Công trình #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t('app', 'Edit'),['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote']),
                ]; */
                return [
                    'title'=> Yii::t('app', 'Cập nhật') ." Công trình #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"]),
                    'toast'=>'Cập nhật thông tin thành công!'
                ];  
            }else{
                 return [
                    'title'=> Yii::t('app', 'Cập nhật') ." Công trình #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
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
     * Delete an existing Congtrinh model.
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
     * Delete multiple existing Congtrinh model.
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
     * Finds the Congtrinh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Congtrinh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Congtrinh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
