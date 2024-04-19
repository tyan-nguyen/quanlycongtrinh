<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\ArrayHelper;
use app\modules\vattu\models\VatTu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VatTuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vật Tư';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="vat-tu-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'striped' => true,
            'hover' => true,
            'panel' => ['type' => 'primary', 'heading' => 'Grid Grouping Example'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
            'columns' => require(__DIR__.'/_columns.php'),
           /*  'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
               
               
                [
                    'attribute' => 'ten_vat_tu',
                    'pageSummary' => 'Page Summary',
                    'pageSummaryOptions' => ['class' => 'text-right text-end'],
                ],
                [
                    'attribute' => 'so_luong',
                    'width' => '150px',
                  //  'hAlign' => 'right',
                    'pageSummary' => true
                    
                    
                ],
                [
                    'attribute' => 'don_gia',
                   
                    'width' => '150px',
                  //  'hAlign' => 'right',
                  'value' => function ($model) {
                    return Yii::$app->formatter->asCurrency($model->don_gia, '', ['symbol' => '']);
                },
                    'pageSummary' => true
                ],
               
               
                [
                    'attribute' => 'id_loai_vat_tu', 
                    'label' =>'Loại vật tư',
                    'width' => '310px',
                    'value' => function ($model, $key, $index, $widget) { 
                        if ($model->loaiVatTu !== null) {
                            return $model->loaiVatTu->ten_loai_vat_tu;
                        } else {
                            return 'Không có loai vật tư';
                        }
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(VatTu::find()->orderBy('ten_vat_tu')->asArray()->all(), 'id', 'ten_loai_vat_tu'),
                
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Loại vật tư'],
                    'group' => true,  // enable grouping
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'Hành động',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'role' => 'modal-remote',
                                'title' => Yii::t('app', 'View'),
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-primary btn-xs',
                            ]);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'role' => 'modal-remote',
                                'title' => Yii::t('app', 'Update'),
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-warning btn-xs',
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'role' => 'modal-remote',
                                'title' => Yii::t('app', 'Delete'),
                                'data-confirm' => false,
                                'data-method' => false,
                                'data-request-method' => 'post',
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-danger btn-xs',
                                'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                                'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item'),
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = Url::to(['view', 'id' => $model->id]);
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = Url::to(['update', 'id' => $model->id]);
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = Url::to(['delete', 'id' => $model->id]);
                            return $url;
                        }
                    },
                    'viewOptions' => [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'View'),
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-primary btn-xs',
                    ],
                    'updateOptions' => [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'Update'),
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-warning btn-xs',
                    ],
                    'deleteOptions' => [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'Delete'),
                        'data-confirm' => false,
                        'data-method' => false,
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-danger btn-xs',
                        'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                        'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item'),
                    ],
                ],      
               
            ], */
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Tạo mới'), ['create'],
                    ['role'=>'modal-remote','title'=> Yii::t('app', 'Tạo mới') . ' Vat Tus','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . Yii::t('app', 'Trở lại'), [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Trở lại')]).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách Vật tư',
                //'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a(''. Yii::t('app', 'Xóa tất cả'),
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>Yii::t('app', 'Bạn chắc chắn muốn xóa?'),
                                    'data-confirm-message'=>Yii::t('app', 'Bạn có chắn chắn muốn xóa thư mục này?')                                ]),
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
