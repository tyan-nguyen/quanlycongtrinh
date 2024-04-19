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
        'contentOptions'=>['style'=>'vertical-align:middle']
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
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_cong_trinh',
    ], */
    
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'create_date',
    ], */
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'create_user',
    ], */
     [
        'label'=>'Khối lượng',
        'format'=>'html',
        'value'=>function($model){
            return $model->getKhoiLuongThiCongThucTePercent() . '%';
        },
        'contentOptions'=>['style'=>'vertical-align:middle;;text-align:center;']
    ], 
    [
        'label'=>'Thi công',
        'format'=>'html',
        'value'=>function($model){
            return $model->getKhoiLuongThiCongThucTeProcess();
        },
        'contentOptions'=>['style'=>'vertical-align:middle']
   ],
];   