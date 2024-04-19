<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VatTuXuat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vat-tu-xuat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'so_luong_yeu_cau')->textInput() ?>

    <?= $form->field($model, 'so_luong_duoc_duyet')->textInput() ?>

    <?= $form->field($model, 'id_phieu_xuat_kho')->textInput() ?>

    <?= $form->field($model, 'id_vat_tu')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_nguoi_duyet')->textInput() ?>

    <?= $form->field($model, 'trang_thai')->textInput(['maxlength' => true]) ?>

  

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
