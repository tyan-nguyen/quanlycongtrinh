<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LoaiVatTu */
?>
<div class="loai-vat-tu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_loai_vat_tu',
          
        ],
    ]) ?>

</div>
