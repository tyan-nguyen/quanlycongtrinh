<?php

namespace app\modules\xuatkho\controllers;

use Yii;
use app\modules\xuatkho\models\PhieuXuatKho;
use app\modules\xuatkho\models\search\PhieuXuatKhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\xuatkho\models\VatTuXuat;
use app\modules\vattu\models\LoaiVatTu;
use app\modules\vattu\models\VatTu;
use app\modules\congtrinh\models\CongTrinh;

/**
 * Default controller for the `xuatkho` module
 */
class QuyTrinhController extends Controller
{
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
    
    public function actionGuiPhieu($idPhieu){
        $request = Yii::$app->request;
        $model = PhieuXuatKho::findOne($idPhieu);
        $model->scenario = 'gui-phieu';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-gui-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                if($model->vatTuXuat==null){
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('_form-gui-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ]),
                        'toast' => 'Vui lòng nhập vật tư vào phiếu trước khi gửi đi!'
                    ];
                }
                if($model->validate()){
                    $model->trang_thai = 'CHO_DUYET';
                    $model->thoi_gian_yeu_cau = date('Y-m-d H:i:s');
                    $model->id_nguoi_gui = Yii::$app->user->id;
                    $model->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Đã gửi phiếu yêu cầu xuất kho thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('_form-gui-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-gui-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
        } else {
            return [
                'status'=>'failed',
                'content' => 'Phiếu xuất kho không tồn tại!'
            ];
        }
    }
    
    public function actionDuyetPhieu($idPhieu){
        $request = Yii::$app->request;
        $model = PhieuXuatKho::findOne($idPhieu);
        $model->scenario = 'duyet-phieu';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                //kiem tra tat ca vat tu da duoc duyet
                foreach ($model->vatTuXuat as $iVt=>$vatTu){
                    if($vatTu->so_luong_duoc_duyet == null){
                        $model->addError('kiemTraVatTuDaDuyet', 'Vui lòng duyệt tất cả vật tư trong phiếu!');
                        return [
                            'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                            'content'=>$this->renderAjax('_form-duyet-phieu', [
                                'model' => $model,
                            ]),
                            'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                            ])
                        ];
                    }
                }
                if($model->validate()){
                    $model->trang_thai = 'DA_DUYET';
                    $model->thoi_gian_duyet = date('Y-m-d H:i:s');
                    $model->id_nguoi_duyet = Yii::$app->user->id;
                    $model->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Đã duyệt phiếu thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('_form-duyet-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
        } else {
            return [
                'status'=>'failed',
                'content' => 'Phiếu xuất kho không tồn tại!'
            ];
        }
    }
    
    
    public function actionKhongDuyetPhieu($idPhieu){
        $request = Yii::$app->request;
        $model = PhieuXuatKho::findOne($idPhieu);
        $model->scenario = 'duyet-phieu';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-khong-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Không duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                //kiem tra tat ca vat tu da duoc duyet
                /* foreach ($model->vatTuXuat as $iVt=>$vatTu){
                    if($vatTu->so_luong_duoc_duyet == null){
                        $model->addError('kiemTraVatTuDaDuyet', 'Vui lòng duyệt tất cả vật tư trong phiếu!');
                        return [
                            'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                            'content'=>$this->renderAjax('_form-duyet-phieu', [
                                'model' => $model,
                            ]),
                            'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                            ])
                        ];
                    }
                } */
                if($model->validate()){
                    $model->trang_thai = 'KHONG_DUYET';
                    $model->thoi_gian_duyet = date('Y-m-d H:i:s');
                    $model->id_nguoi_duyet = Yii::$app->user->id;
                    $model->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Không duyệt phiếu thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('_form-khong-duyet-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Không duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-khong-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Không duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
        } else {
            return [
                'status'=>'failed',
                'content' => 'Phiếu xuất kho không tồn tại!'
            ];
        }
    }
    
    public function actionDuyetGiaoHang($idPhieu){
        $request = Yii::$app->request;
        $model = PhieuXuatKho::findOne($idPhieu);
        $model->scenario = 'duyet-giao-hang';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-giao-hang', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Ghi dữ liệu giao hàng'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                if($model->validate()){
                    $model->trang_thai = 'DA_GIAO_HANG';
                    $model->thoi_gian_nhap_giao_hang = date('Y-m-d H:i:s');
                    $model->id_nguoi_nhap_giao_hang = Yii::$app->user->id;
                    $model->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Đã nhập thông tin giao hàng thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                        'content'=>$this->renderAjax('_form-duyet-giao-hang', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Ghi dữ liệu giao hàng'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> PHIẾU XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-giao-hang', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(Yii::t('app', 'Ghi dữ liệu giao hàng'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
        } else {
            return [
                'status'=>'failed',
                'content' => 'Phiếu xuất kho không tồn tại!'
            ];
        }
    }
    
}