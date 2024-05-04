<?php

namespace app\modules\kehoachxuatkho\controllers;

use Yii;
use app\modules\kehoachxuatkho\models\KeHoachXuatKho;
use app\modules\kehoachxuatkho\models\search\KeHoachXuatKhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\modules\kehoachxuatkho\models\VatTuKeHoach;
use app\modules\vattu\models\LoaiVatTu;
use app\modules\vattu\models\VatTu;
use app\modules\congtrinh\models\CongTrinh;

/**
 * Default controller for the `kehoachxuatkho` module
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
        $model = KeHoachXuatKho::findOne($idPhieu);
        $model->scenario = 'gui-phieu';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-gui-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                    Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                if($model->vatTuXuat==null){
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('_form-gui-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']).
                        Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ]),
                        'toast' => 'Vui lòng nhập vật tư vào phiếu trước khi gửi đi!'
                    ];
                }
                if($model->validate()){
                    if($model->tao_khong_qui_trinh == 0){
                        $model->trang_thai = 'CHO_DUYET';
                    } else {
                        $model->trang_thai = 'DA_DUYET';
                        $model->thoi_gian_duyet = date('Y-m-d H:i:s');
                        $model->id_nguoi_duyet = Yii::$app->user->id;
                        $model->y_kien_nguoi_duyet = 'Duyệt tự động không qua qui trình';
                        $modelVatTu = VatTuKeHoach::find()->where(['id_phieu_xuat_kho'=>$model->id])->all();
                        foreach ($modelVatTu as $indexVT=>$vatTu){
                            $vatTu->so_luong_duoc_duyet = $vatTu->so_luong_yeu_cau;
                            $vatTu->save();
                        }
                    }
                    $model->thoi_gian_yeu_cau = date('Y-m-d H:i:s');
                    $model->id_nguoi_gui = Yii::$app->user->id;
                    $model->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Đã gửi phiếu yêu cầu xuất kho thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('_form-gui-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']).
                        Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-gui-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                    Html::button(Yii::t('app', 'Gửi phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
        } else {
            return [
                'status'=>'failed',
                'content' => 'Kế hoạch xuất kho không tồn tại!'
            ];
        }
    }
    
    public function actionDuyetPhieu($idPhieu){
        $request = Yii::$app->request;
        $model = KeHoachXuatKho::findOne($idPhieu);
        $model->scenario = 'duyet-phieu';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']).
                    Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                //kiem tra tat ca vat tu da duoc duyet
                foreach ($model->vatTuXuat as $iVt=>$vatTu){
                    if($vatTu->so_luong_duoc_duyet == null){
                        $model->addError('kiemTraVatTuDaDuyet', 'Vui lòng duyệt tất cả vật tư trong phiếu!');
                        return [
                            'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                            'content'=>$this->renderAjax('_form-duyet-phieu', [
                                'model' => $model,
                            ]),
                            'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
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
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Đã duyệt phiếu thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('_form-duyet-phieu', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                        Html::button(Yii::t('app', 'Duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                    Html::button(Yii::t('app', 'Duyệt Kế hoạch'),['class'=>'btn btn-primary','type'=>"submit"
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
        $model = KeHoachXuatKho::findOne($idPhieu);
        $model->scenario = 'duyet-phieu';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-khong-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                    Html::button(Yii::t('app', 'Không duyệt kế hoạch được yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
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
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
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
                        Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                        Html::button(Yii::t('app', 'Không duyệt phiếu yêu cầu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-khong-duyet-phieu', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
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
        $model = KeHoachXuatKho::findOne($idPhieu);
        $model->scenario = 'duyet-giao-hang';
        if($model!=null){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-giao-hang', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']).                     
                    Html::button(Yii::t('app', 'Ghi dữ liệu nghiệm thu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }else if($model->load($request->post())){
                if($model->validate()){
                    $model->trang_thai = 'DA_HOAN_THANH';
                    $model->thoi_gian_nhap_nghiem_thu = date('Y-m-d H:i:s');
                    $model->id_nguoi_nghiem_thu = Yii::$app->user->id;
                    $model->save();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('../phieu-xuat-kho/update', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(Yii::t('app', 'Lưu lại'),['class'=>'btn btn-primary','type'=>"submit"]),
                        'toast'=>'Đã nhập nghiệm thu kế hoạch xuất kho thành công!'
                    ];
                } else {
                    return [
                        'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                        'content'=>$this->renderAjax('_form-duyet-giao-hang', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                        Html::button(Yii::t('app', 'Ghi dữ liệu nghiệm thu'),['class'=>'btn btn-primary','type'=>"submit"
                        ])
                    ];
                }
            }else{
                return [
                    'title'=> '<i class="fa fa-file-text-o"></i> KẾ HOẠCH XUẤT KHO',
                    'content'=>$this->renderAjax('_form-duyet-giao-hang', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(Yii::t('app', 'Đóng'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a(Yii::t('app', 'Quay lại Kế hoạch'),['phieu-xuat-kho/update','id'=>$idPhieu],['class'=>'btn btn-primary','role'=>'modal-remote']). 
                    Html::button(Yii::t('app', 'Ghi dữ liệu nghiệm thu'),['class'=>'btn btn-primary','type'=>"submit"
                    ])
                ];
            }
        } else {
            return [
                'status'=>'failed',
                'content' => 'Kế hoạch xuất kho không tồn tại!'
            ];
        }
    }
    
}