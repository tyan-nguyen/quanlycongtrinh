<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\vattu\models\VatTu */
?>
<div class="vat-tu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_vat_tu',
            'so_luong',
            [
              
                'attribute' => 'don_gia',
                'value' => function ($model) {
                    //return Yii::$app->formatter->asCurrency($model->don_gia, '', ['symbol' => '']);
                    return number_format($model->don_gia);
                },
            ],
            [
                
                'attribute' => 'id_loai_vat_tu',
                'label' =>'Loại vật tư',
                'value' => function ($model) {
                    return $model->loaiVatTu->ten_loai_vat_tu; 
                },
            ],
         
        ],
    ]) ?>

</div>
