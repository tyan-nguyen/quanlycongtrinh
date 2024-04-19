<?php
use yii\helpers\Url;
use yii\helpers\html;
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
        'attribute'=>'hieu_xe',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hang_xe',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nam_san_xuat',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'bien_so_xe',
    ],
  
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'hinh_xe',
                'label' => 'Hình ảnh',
                'format' => 'html', 
                'value' => function ($model) {
                    $imageUrl = Yii::$app->urlManager->createUrl($model->hinh_xe);
                    return Html::img($imageUrl, ['class' => 'img-thumbnail', 'style' => 'width:100px;height:100px;']);
                },
    ],
    
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'create_date',
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