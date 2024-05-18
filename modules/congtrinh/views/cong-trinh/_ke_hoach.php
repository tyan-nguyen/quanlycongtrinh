<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use johnitvn\ajaxcrud\BulkButtonWidget;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Đề nghị xuất kho</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        </div>
    </div>
    
    <div class="box-body">
    <div class="table-responsive">
    
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider3,
            /* 'filter'=>false, */
            /* 'filterModel' => $searchModel, */
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns_ke_hoach.php'),
           
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => ''
        ])?>
    </div>    
    
    </div>
    
    </div>
    
    <div class="box-footer clearfix">
		<a href="/kehoachxuatkho/phieu-xuat-kho/phieu-xuat-ke-hoach?id=<?= $model->id ?>" class="btn btn-sm btn-default btn-flat pull-right">Quản lý Đề nghị xuất kho</a>
    </div>

</div>