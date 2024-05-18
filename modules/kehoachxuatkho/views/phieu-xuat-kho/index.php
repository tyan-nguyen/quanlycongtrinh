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

$this->title = 'Đề nghị xuất kho';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="phieu-xuat-kho-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), ['create'],
                    ['role'=>'modal-remote','title'=> Yii::t('app', 'Create new') . ' Đề nghị xuất kho','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . Yii::t('app', 'Reset Grid'), [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')]).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách Đề nghị xuất kho',
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

