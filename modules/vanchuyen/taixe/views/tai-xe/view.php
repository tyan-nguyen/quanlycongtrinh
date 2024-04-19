<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Taixe */
?>
<div class="taixe-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ho_ten',
            'dia_chi',
            'so_dien_thoai',
            'cccd',
           
        ],
    ]) ?>

</div>
