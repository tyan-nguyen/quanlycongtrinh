<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\vattu\models\DonViTinh;

/* @var $this yii\web\View */
/* @var $model app\modules\vattu\models\VatTu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vat-tu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_vat_tu')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'don_vi_tinh')->dropDownList( (new DonViTinh())->getList(), ['prompt'=>'-Chọn đơn vị tính'] ) ?>

    <?= $form->field($model, 'so_luong')->textInput() ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>


    <?= $form->field($model, 'id_loai_vat_tu')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\modules\vattu\models\LoaiVatTu::find()->all(), 'id', 'ten_loai_vat_tu'),
    ['prompt' => 'Chọn Loại vật tư']
)->label('Loại vật tư') ?>

 


    


  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
