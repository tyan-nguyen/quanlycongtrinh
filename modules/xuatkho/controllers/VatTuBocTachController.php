<?php

namespace app\modules\xuatkho\controllers;

use app\modules\xuatkho\models\VatTuBocTach;
use app\modules\xuatkho\models\search\VatTuBocTachSearch;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\congtrinh\models\CongTrinh;
/**
 * Default controller for the `xuatkho` module
 */
class VatTuBocTachController extends Controller
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

    /**
     * Lists all VatTuBocTach models.
     * @return mixed
     */
    public function actionIndex($idCongTrinh)
    {    
        $searchModel = new VatTuBocTachSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $idCongTrinh);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idCongTrinh'=>$idCongTrinh
        ]);
    }
    
    /**
     * Lists all VatTuBocTach models.
     * @return mixed
     */
    public function actionChiTiet($id)
    {
        $request = Yii::$app->request;
        $model = CongTrinh::findOne($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($model == null){
            return [
                'status'=>'failed',
                'content' => 'Công trình không tồn tại!'
            ];
        } else {
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> CÔNG TRÌNH',
                    'content'=>$this->renderAjax('_form-chi-tiet', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            } else if($model->load($request->post())){
                return [
                    'forceReload'=>'#crud-datatable-pjax-2',
                    'title'=> '<i class="fa fa-file-text-o"></i> CÔNG TRÌNH',
                    'content'=>$this->renderAjax('_form-chi-tiet', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"
                    ]),
                    'toast'=>'Đã lưu thông tin thành công!'
                ];
            } else {
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> CÔNG TRÌNH',
                    'content'=>$this->renderAjax('_form-chi-tiet', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
       }
    }


    /**
     * Displays a single VatTuBocTach model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "VatTuBocTach #".$id,
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
     * Creates a new VatTuBocTach model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new VatTuBocTach();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> Yii::t('app', 'Create new') . " VatTuBocTach",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> Yii::t('app', 'Create new')." VatTuBocTach",
                    'content'=>'<span class="text-success">' . Yii::t('app', 'Create success!').'</span>',
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t('app', 'Create more'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> Yii::t('app', 'Create new') ." VatTuBocTach",
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
     * Updates an existing VatTuBocTach model.
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
                    'title'=> Yii::t('app', 'Update'). " VatTuBocTach #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax','toast'=>'Lưu dữ liệu thành công!'];
                /* return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "VatTuBocTach #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t('app', 'Edit'),['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];  */   
            }else{
                 return [
                    'title'=> Yii::t('app', 'Update') ." VatTuBocTach #".$id,
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
     * Delete an existing VatTuBocTach model.
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
     * Delete multiple existing VatTuBocTach model.
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
     * Finds the VatTuBocTach model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VatTuBocTach the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VatTuBocTach::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}