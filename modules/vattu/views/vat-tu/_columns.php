<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_vat_tu',

        'label' =>'Tên vật tư'


    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'don_vi_tinh',
        'value'=>function($model){
        return $model->don_vi_tinh!=NULL ? $model->donViTinh->ten_dvt : '';
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'so_luong',

        'label' =>'Số lượng'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'don_gia',
        'value' => function ($model) {
            //return Yii::$app->formatter->asCurrency($model->don_gia, '', ['symbol' => '']);
            return number_format($model->don_gia);
        },
    ],
    
    
    
    
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'id_loai_vat_tu',
        'label' =>'Loại vật tư',
        'value' => function ($model) {
            return $model->loaiVatTu->ten_loai_vat_tu; 
        },
    ],
   // [
     //   'class'=>'\kartik\grid\DataColumn',
     //   'attribute'=>'create_date',

      //  'label' =>'Thời gian tạo'

   // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'create_user',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   