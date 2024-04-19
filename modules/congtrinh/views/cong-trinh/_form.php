<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Congtrinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congtrinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_cong_trinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_diem')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'trang_thai')->dropDownList($model->getDmTrangThai(), ['prompt'=>'-Chọn trạng thái-']) ?>

    <?= $form->field($model, 'tg_bat_dau')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'tg_ket_thuc')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'p_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\modules\congtrinh\models\CongTrinh::find()->all(), 'id', 'ten_cong_trinh'),
    ['prompt' => 'Chọn Công trình cha']
)->label('Công trình cha') ?>

	<?= $form->field($model, 'ghi_chu')->textarea(['rows'=>6]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
