<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuXuatKho */
?>
<div class="phieu-xuat-kho-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thoi_gian_yeu_cau',
            'id_cong_trinh',
            'id_bo_phan_yc',
            'ly_do:ntext',
            'id_tai_xe',
            'id_xe',
            'nguoi_ky:ntext',
            'id_nguoi_duyet',
            'don_gia',
            'trang_thai',
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
