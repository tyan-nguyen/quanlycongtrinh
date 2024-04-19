<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use johnitvn\ajaxcrud\BulkButtonWidget;
?>





<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Phiếu xuất kho</h3>
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
            'dataProvider' => $dataProvider1,
            /* 'filter'=>false, */
            /* 'filterModel' => $searchModel, */
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns_cong_trinh.php'),
           
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => ''
        ])?>
    </div>


    
    
    
    <!-- <table class="table no-margin">
    <thead>
    <tr>
    <th>Order ID</th>
    <th>Item</th>
    <th>Status</th>
    <th>Popularity</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><a href="pages/examples/invoice.html">OR9842</a></td>
    <td>Call of Duty IV</td>
    <td><span class="label label-success">Shipped</span></td>
    <td>
    <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    <tr>
    <td><a href="pages/examples/invoice.html">OR1848</a></td>
    <td>Samsung Smart TV</td>
    <td><span class="label label-warning">Pending</span></td>
    <td>
    <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    <tr>
    <td><a href="pages/examples/invoice.html">OR7429</a></td>
    <td>iPhone 6 Plus</td>
    <td><span class="label label-danger">Delivered</span></td>
    <td>
    <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    <tr>
    <td><a href="pages/examples/invoice.html">OR7429</a></td>
    <td>Samsung Smart TV</td>
    <td><span class="label label-info">Processing</span></td>
    <td>
    <div class="sparkbar" data-color="#00c0ef" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    <tr>
    <td><a href="pages/examples/invoice.html">OR1848</a></td>
    <td>Samsung Smart TV</td>
    <td><span class="label label-warning">Pending</span></td>
    <td>
    <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    <tr>
    <td><a href="pages/examples/invoice.html">OR7429</a></td>
    <td>iPhone 6 Plus</td>
    <td><span class="label label-danger">Delivered</span></td>
    <td>
    <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    <tr>
    <td><a href="pages/examples/invoice.html">OR9842</a></td>
    <td>Call of Duty IV</td>
    <td><span class="label label-success">Shipped</span></td>
    <td>
    <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
    </td>
    </tr>
    </tbody>
    </table> -->
    
    
    </div>
    
    </div>
    
    <div class="box-footer clearfix">
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Duyệt phiếu xuất kho</a> -->
    <a href="/xuatkho/phieu-xuat-kho/phieu-xuat-cong-trinh?id=<?= $model->id ?>" class="btn btn-sm btn-default btn-flat pull-right">Quản lý Phiếu xuất kho</a>
    </div>

</div>