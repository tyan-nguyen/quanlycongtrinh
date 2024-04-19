<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuXuatKho */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="/js/vue.js"></script>

<div class="phieu-xuat-kho-form">
	<h1>PHIẾU XUẤT KHO</h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'thoi_gian_yeu_cau')->textInput() ?>

    <?= $form->field($model, 'id_cong_trinh')->textInput() ?>

    <?= $form->field($model, 'id_bo_phan_yc')->textInput() ?>

    <?= $form->field($model, 'ly_do')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_tai_xe')->textInput() ?>

    <?= $form->field($model, 'id_xe')->textInput() ?>

    <?= $form->field($model, 'nguoi_ky')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_nguoi_duyet')->textInput() ?>

    <?= $form->field($model, 'thanh_tien')->textInput() ?>

    <?= $form->field($model, 'trang_thai')->textInput(['maxlength' => true]) ?>

 

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
