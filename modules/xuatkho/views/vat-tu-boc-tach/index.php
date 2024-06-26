<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VatTuBocTachSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vật tư bóc tách';
$this->params['breadcrumbs'][] = $this->title;

//CrudAsset::register($this);

?>
<div class="vat-tu-boc-tach-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Về công trình',
                        Yii::getAlias('@web/congtrinh/cong-trinh/chi-tiet?id='.$idCongTrinh) ,
                        ['data-pjax'=>0, 'title'=>'Quay về công trình', 'class'=>'btn btn-default']
                        ).
                    Html::a('<span class="glyphicon glyphicon-import"></span> Nhập Excel',
                        Yii::getAlias('@web/xuatkho/import/upload?id='.$idCongTrinh.'&type=BOCTACH') ,
                        ['role'=>'modal-remote', 'title'=>'Upload excel', 'class'=>'btn btn-default']
                        ) . 
                    /* Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create'), ['create?idCongTrinh='.$idCongTrinh],
                    ['role'=>'modal-remote','title'=> Yii::t('app', 'Thêm mới') . ' Vật tư bóc tách','class'=>'btn btn-default']). */
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . Yii::t('app', 'Tải lại'), ['?idCongTrinh='.$idCongTrinh],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Tải lại')])
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách vật tư bóc tách',
                //'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; ' . Yii::t('app', 'Xóa đã chọn'),
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
])?>
<?php Modal::end(); ?>
