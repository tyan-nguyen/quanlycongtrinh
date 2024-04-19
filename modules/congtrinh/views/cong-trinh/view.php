<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Congtrinh */
?>
<div class="congtrinh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_cong_trinh',
            'dia_diem',
            [
                
                'attribute' => 'tg_bat_dau',
                'format' => ['date', 'php:d-m-Y'], 
            ],
            [
                
                'attribute' => 'tg_ket_thuc',
                'format' => ['date', 'php:d-m-Y'], 
            ],
            [
                'attribute' => 'p_id',
                'label' =>'Công trình cha',
                'value' => function ($model) {
                    if ($model->congTrinh) {
                        return $model->congTrinh->ten_cong_trinh;
                    } else {
                        return 'Không có công trình cha';
                    }
                },
            ],
            
            [
                'attribute' => 'trang_thai',
                'value' => function ($model) {
                    return $model->trang_thai == 1 ? 'Hoàn thành' : 'Chưa hoàn thành';
                },
            ],
            
        ],
    ]) ?>

</div>
