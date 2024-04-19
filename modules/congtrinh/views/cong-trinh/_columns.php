<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\congtrinh\models\CongTrinh;
use app\widgets\TrangThaiCongTrinhWidget;

return [
    ['class' => 'kartik\grid\SerialColumn'],   
    [
        'attribute' => 'trang_thai',
        'value' => function ($model, $key, $index, $widget) {
            return TrangThaiCongTrinhWidget::widget(['value'=>$model->trang_thai, 'text'=>$model->getDmTrangThaiLabel($model->trang_thai)]);
        },
        'format' => 'html',
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => CongTrinh::getDmTrangThai(),
        // 'filter' => array_merge(['' => 'Không có công trình cha'], ArrayHelper::map(CongTrinh::find()->orderBy('ten_cong_trinh')->asArray()->all(), 'id', 'ten_cong_trinh')),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => '-Tất cả-'],
    ],
    [
        'attribute' => 'ten_cong_trinh',
        'pageSummary' => 'Page Summary',
        'pageSummaryOptions' => ['class' => 'text-right text-end'],
        'value'=>function($model){
            return Html::a($model->ten_cong_trinh, '/congtrinh/cong-trinh/chi-tiet?id=' . $model->id, [
                'title'=> 'Xem chi tiết công trình',
                'data-pjax'=>0,
            ]);
        },
        'format'=>'raw'
    ],
    [
        'attribute' => 'dia_diem',
        //  'hAlign' => 'right',
        'pageSummary' => true
    ],
    [
        'attribute' => 'tg_bat_dau',
        'format' => ['date', 'php:d-m-Y'],
        'width' => '150px',
        //  'hAlign' => 'right',
        'pageSummary' => true,
        'filterType' => GridView::FILTER_DATE,
        'filterWidgetOptions' => [
            'pickerButton'=>false,
            //'removeButton'=>true,
            'pluginOptions' => [ 
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true,
                'language'=>'vi-VN',
                'zIndexOffset'=>'9999',
                
            ],
        ],
    ],
    [
        'attribute' => 'tg_ket_thuc',
        'format' => ['date', 'php:d-m-Y'],
        'width' => '150px',
        // 'hAlign' => 'right',
        'pageSummary' => true,
        'filterType' => GridView::FILTER_DATE,
        'filterWidgetOptions' => [
            'pickerButton'=>false,
            //'removeButton'=>true,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true,
                'language'=>'vi-VN',
                'zIndexOffset'=>'9999',
                
            ],
        ],
    ],
    
    /*[
        'attribute' => 'p_id',
        'label' =>'Công trình cha',
        'value' => function ($model, $key, $index, $widget) {
            if ($model->congTrinh !== null) {
                return $model->congTrinh->ten_cong_trinh;
            } else {
                return 'Không có công trình cha';
            }
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(CongTrinh::find()->orderBy('ten_cong_trinh')->asArray()->all(), 'id', 'ten_cong_trinh'),
        // 'filter' => array_merge(['' => 'Không có công trình cha'], ArrayHelper::map(CongTrinh::find()->orderBy('ten_cong_trinh')->asArray()->all(), 'id', 'ten_cong_trinh')),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Công trình cha'],
        'group' => true,  // enable grouping
    ],*/
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Hành động',
        'template' => '{update} {phanQuyen} {delete}',
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    'role' => 'modal-remote',
                    'title' => Yii::t('app', 'View'),
                    'data-toggle' => 'tooltip',
                    'class' => 'btn btn-primary btn-xs',
                ]);
            },
            'update' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                    'role' => 'modal-remote',
                    'title' => Yii::t('app', 'Update'),
                    'data-toggle' => 'tooltip',
                    'class' => 'btn btn-warning btn-xs',
                ]);
            },
            'phanQuyen' => function ($url, $model, $key) {
                return Html::a('<span class="
glyphicon glyphicon-user"></span>', ['/congtrinh/cong-trinh/permission', 'id'=>$model->id], [
                    'role' => 'modal-remote',
                    'title' => Yii::t('app', 'Phân quyền'),
                    'data-toggle' => 'tooltip',
                    'class' => 'btn btn-warning btn-xs',
                ]);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'Delete'),
                        'data-confirm' => false,
                        'data-method' => false,
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-danger btn-xs',
                        'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                        'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item'),
                    ]);
                },
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url = Url::to(['view', 'id' => $model->id]);
                    return $url;
                }
                if ($action === 'update') {
                    $url = Url::to(['update', 'id' => $model->id]);
                    return $url;
                }
                if ($action === 'delete') {
                    $url = Url::to(['delete', 'id' => $model->id]);
                    return $url;
                }
            },
            /* 'viewOptions' => [
                'role' => 'modal-remote',
                'title' => Yii::t('app', 'View'),
                'data-toggle' => 'tooltip',
                'class' => 'btn btn-primary btn-xs',
            ], */
            'updateOptions' => [
                'role' => 'modal-remote',
                'title' => Yii::t('app', 'Update'),
                'data-toggle' => 'tooltip',
                'class' => 'btn btn-warning btn-xs',
            ],
            'deleteOptions' => [
                'role' => 'modal-remote',
                'title' => Yii::t('app', 'Delete'),
                'data-confirm' => false,
                'data-method' => false,
                'data-request-method' => 'post',
                'data-toggle' => 'tooltip',
                'class' => 'btn btn-danger btn-xs',
                'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item'),
            ],
     ],

];