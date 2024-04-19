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
        //'attribute'=>'id_vat_tu',
        'value'=>function($model){
            return $model->vatTu->loaiVatTu->ten_loai_vat_tu;
        },
        'label'=>'Tên loại vật tư',
        'contentOptions'=>['style'=>'vertical-align:middle']
   ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_vat_tu',
        'value'=>function($model){
            return $model->vatTu->ten_vat_tu;
        },
        'contentOptions'=>['style'=>'vertical-align:middle']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'so_luong',
        'value'=>function($model){
            return number_format($model->so_luong);
        },
        'contentOptions'=>['style'=>'vertical-align:middle;text-align:center;']
    ],
   
    [
        'label'=>'Khối lượng',
        'format'=>'html',
        'value'=>function($model){
            return $model->getKhoiLuongThiCongThucTePercent() . '%';
        },
        'contentOptions'=>['style'=>'vertical-align:middle;;text-align:center;'],
        'width'=>'100px;'
    ],
    [
        'label'=>'Thi công',
        'format'=>'html',
        'value'=>function($model){
            return $model->getKhoiLuongThiCongThucTeProcess();
        },
        'contentOptions'=>['style'=>'vertical-align:middle'],
        'width'=>'150px;'
    ],
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'create_date',
        'value'=>function($model){
            return $model->ngayTao;
        },
        'filter'=>false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'create_user',
        'value'=>function($model){
            return $model->nguoiTao;
        },
        'filter'=>false,
    ],
            
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{update}',
        'viewOptions'=>['role'=>'modal-remote','title'=>Yii::t('app', 'View'),'data-toggle'=>'tooltip', 'class'=>'btn btn-primary btn-xs'],
        'updateOptions'=>['role'=>'modal-remote','title'=>Yii::t('app', 'Update'), 'data-toggle'=>'tooltip','class'=>'btn btn-warning btn-xs'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>Yii::t('app', 'Delete'), 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'class'=>'btn btn-danger btn-xs',
                          'data-confirm-title'=>Yii::t('app', 'Are you sure?'),
                          'data-confirm-message'=>Yii::t('app', 'Are you sure want to delete this item')], 
    ],

];   