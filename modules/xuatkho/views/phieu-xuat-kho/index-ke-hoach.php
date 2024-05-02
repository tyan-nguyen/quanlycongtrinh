<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhieuXuatKhoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phiếu Xuất Kho';
$this->params['breadcrumbs'][] = $this->title;

//CrudAsset::register($this);

?>

<style>
#ajaxCrudModal .modal-lg{
    width:90%;
}
@media only screen and (max-width: 800px) {
	#ajaxCrudModal .modal-lg{
        width:100%;
        margin:0px;
    }
}
</style>

<div class="row">    	
	<div class="col-md-12">
		<div class="post">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="/images/cong-trinh-128x128.jpg" alt="user image">
                <span class="username">
                	<h4 style="margin-top:0; color:#3c8dbc; font-size:22px;"><?= $model->congTrinh->ten_cong_trinh ?></h4>
                </span>
                <span class="description">
                	<i class="fa fa-map-marker"></i> <?= $model->congTrinh->dia_diem ?>
                </span>
                <!-- <span class="description">
                <?= $model->congTrinh->tg_bat_dau != null ? ('Thời gian bắt đầu:' . $model->congTrinh->thoiGianBatDau) : '' ?>
                <?= $model->congTrinh->tg_ket_thuc != null ? ('- Thời gian kết thúc:' . $model->congTrinh->thoiGianKetThuc) : '' ?>
                </span> -->
            </div>

        </div>
	</div>
</div>

<div class="phieu-xuat-kho-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns_ke_hoach.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), ['create-ke-hoach', 'idkh'=>$model->id],
                    ['role'=>'modal-remote','title'=> Yii::t('app', 'Create new') . ' Phieu Xuat Khos','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . Yii::t('app', 'Reset Grid'), ['', 'id'=>$model->id],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách phiếu xuất kho theo kế hoạch '. Html::a('#' . $model->soPhieu , ['/kehoachxuatkho/phieu-xuat-kho/update', 'id'=>$model->id], ['role'=>'modal-remote','title'=> 'Kế hoạch ' . $model->soPhieu, 'style'=>'text-decoration:underline']),
                //'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                    'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; ' . Yii::t('app', 'Delete All'),
                            ["bulk-delete"] ,
                            [
                                "class"=>"btn btn-danger btn-xs",
                                'role'=>'modal-remote-bulk',
                                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                'data-request-method'=>'post',
                                'data-confirm-title'=>Yii::t('app', 'Are you sure?'),
                                'data-confirm-message'=>Yii::t('app', 'Are you sure want to delete this item')                                ]),
                    ]).                        
                    '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    'size'=>Modal::SIZE_LARGE,
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false] 
])?>
<?php Modal::end(); ?>

