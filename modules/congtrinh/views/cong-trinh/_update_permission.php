<?php
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\congtrinh\models\CongTrinhQuyen;
use app\modules\nguoidung\models\NguoiDung;

//$model->taglist = $model->listTagName;
?>

<?php $form = ActiveForm::begin([
        'id' => 'frmPost',
        //'enableAjaxValidation' => false,
        'options' => [ 'enctype' => 'multipart/form-data' ]
    ]); ?>
    
    <?php 
        $dmQuyens = CongTrinhQuyen::getDmQuyen();
        foreach ($dmQuyens as $indexQuyen=>$dmQuyen){
            $ctQuyens = CongTrinhQuyen::find()->where([
                'id_cong_trinh'=>$model->id,
                'quyen' => $indexQuyen,
                'ngung_phu_trach'=>0
            ])->all();
            foreach ($ctQuyens as $indexCtQuyen=>$ctQuyen){
                $model->quyen[$indexQuyen][] = $ctQuyen->id_nguoi_dung;
            }
    ?>
    
    <div class="box box-default" style="border-top:0px">
        <div class="box-header">
            <h3 class="box-title"><?= $dmQuyen ?></h3>      
        </div>
        
        <div class="box-body">
        	<?= $form->field($model, 'quyen['. $indexQuyen .']')->widget(Select2::classname(), [
                'data' => NguoiDung::getDanhSachNguoiDung(),
                'language' => 'vi-VN',
                'options' => ['placeholder' => 'Chọn...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags' => true,
                    'tokenSeparators' => [';'],
                    'maximumInputLength' => 50
                ],
            ]);
            ?>
        </div>
    
    </div>

    
    
    
    <?php 
        }//end foreach $dmQuyen
    ?>
    
    
    
<?php /* $form->field($model, 'taglist')->widget(Select2::classname(), [
    'data' => (new TagList())->getListName(),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a tags ...', 'multiple' => true],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'tokenSeparators' => [';'],
        'maximumInputLength' => 50
    ],
]);
*/
?>

<?php ActiveForm::end(); ?> 