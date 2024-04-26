<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VatTuXuat */
?>
<div class="vat-tu-xuat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'so_luong_yeu_cau',
            'so_luong_duoc_duyet',
            'id_phieu_xuat_kho',
            'id_vat_tu',
            'ghi_chu:ntext',
            'id_nguoi_duyet',
            'trang_thai',
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
