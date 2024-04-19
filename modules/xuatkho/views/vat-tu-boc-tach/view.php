<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VatTuBocTach */
?>
<div class="vat-tu-boc-tach-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'so_luong',
            'id_cong_trinh',
            'id_vat_tu',
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
