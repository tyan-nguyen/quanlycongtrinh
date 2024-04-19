<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use johnitvn\ajaxcrud\BulkButtonWidget;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Dự toán công trình</h3>
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
            'dataProvider' => $dataProvider2,
            'pjax'=>true,
            'pjaxSettings'=>[
                'options'=>[
                    'id'=>'crud-datatable-pjax-2',
                ]
            ],
            'columns' => require(__DIR__.'/_columns_boc_tach.php'),
            'toolbar'=> '',
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => '',
        ])?>
    </div>
    
    
    </div>
    
    </div>
    
    <div class="box-footer clearfix">
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> -->
     	&nbsp; <a href="/xuatkho/vat-tu-boc-tach/chi-tiet?id=<?= $model->id ?>" class="btn btn-sm btn-default btn-flat pull-right" title="Trình duyệt" role="modal-remote">Bóc tách</a>
  		<a href="/xuatkho/vat-tu-boc-tach/index?idCongTrinh=<?= $model->id ?>" class="btn btn-sm btn-default btn-flat pull-right" title="Trình duyệt">Quản lý dự toán và bóc tách</a>   
  
        <div class="btn-group">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-export"></span> Báo cáo</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#"><span class="glyphicon glyphicon-file"></span> Báo cáo toàn bộ công trình</a></li>
            </ul>
        </div>
        
        <div class="btn-group">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Cấu hình</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <?php if($model->quyenDuyet || $model->quyenQuanLy ){ ?><li><a href="#"><span class="fa fa-lock"></span> Hoàn thành và khóa bóc tách vật tư</a></li><?php } ?>
                <?php if($model->quyenQuanLy ){ ?><li><a href="#"><span class="fa fa-unlock"></span> Mở bóc tách vật tư để điều chỉnh</a></li><?php } ?>
                 <?php if($model->quyenQuanLy ){ ?><li><a href="#"><span class="fa fa-lock"></span> Khóa bóc tách vật tư</a></li><?php } ?>
            </ul>
        </div>
  
      </div>
</div>