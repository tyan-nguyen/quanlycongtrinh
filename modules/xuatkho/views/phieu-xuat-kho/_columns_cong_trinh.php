<?php
use yii\helpers\Url;
use app\widgets\TrangThaiPhieuXuatKhoWidget;
use kartik\grid\GridView;
use app\modules\xuatkho\models\PhieuXuatKho;
use app\modules\vanchuyen\taixe\models\TaiXe;
use app\modules\vanchuyen\xe\models\Xe;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'trang_thai',
        'format'=>'raw',
        'value'=>function($model){
            return TrangThaiPhieuXuatKhoWidget::widget([
                'value' => $model->trang_thai,
                'text' => $model->getDmTrangThaiLabel($model->trang_thai)
            ]);
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => PhieuXuatKho::getDmTrangThai(),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => '-Tất cả-'],
        'contentOptions'=>['style'=>'text-align:center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'so_phieu',
        'format'=>'raw',
        'value'=>function($model){
            return Html::a($model->soPhieu, ['/xuatkho/phieu-xuat-kho/update', 'id'=>$model->id], [
                'role'=>'modal-remote',
                'title'=>Yii::t('app', 'Update'), 
                'data-toggle'=>'tooltip',
                'class'=>'btn btn-primary btn-xs'
            ]);
        },
        'width' => '150px',
        'contentOptions'=>['style'=>'text-align:center']
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'thoi_gian_yeu_cau',
        'format' => ['date', 'php:d-m-Y'],
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
        'width' => '150px',
        'contentOptions'=>['style'=>'text-align:center']
    ],
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_cong_trinh',
    ], */
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_bo_phan_yc',
        'value'=>function($model){
            return $model->tenBoPhanYeuCau;
        },
    ],
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'create_user',
        'value'=>function($model){
            return $model->nguoiTao!=null ? $model->nguoiTao->name :'';
        },
        ],
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ly_do',
    ], */
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_tai_xe',
        'value'=>function($model){
            return $model->taiXe!=null ? $model->taiXe->ho_ten : '';
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => (new TaiXe())->getList(),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => '-Tất cả-'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_xe',
        'value'=>function($model){
            return $model->xe != null ? $model->xe->bien_so_xe : '';
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => (new Xe())->getList(),
        'filterWidgetOptions' => [
            'pluginOptions' => [
                'allowClear' => true
            ],
        ],
        'filterInputOptions' => ['placeholder' => '-Tất cả-'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'',
        'label'=>'Tổng tiền',
        'value'=>function($model){
            return number_format($model->tongTien);
        },
        'contentOptions'=>['style'=>'font-weight:bold']
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'nguoi_ky',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_nguoi_duyet',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'don_gia',
    // ],
     
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'create_date',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'create_user',
    // ],
    /* [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'template'=>'{update} {delete}',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>Yii::t('app', 'View'),'data-toggle'=>'tooltip', 'class'=>'btn btn-primary btn-xs'],
        'updateOptions'=>['role'=>'modal-remote','title'=>Yii::t('app', 'Update'), 'data-toggle'=>'tooltip','class'=>'btn btn-warning btn-xs'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>Yii::t('app', 'Delete'), 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'class'=>'btn btn-danger btn-xs',
                          'data-confirm-title'=>Yii::t('app', 'Are you sure?'),
                          'data-confirm-message'=>Yii::t('app', 'Are you sure want to delete this item')], 
    ], */

];   