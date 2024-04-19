<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VatTuBocTach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vat-tu-boc-tach-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'so_luong')->textInput() ?>

    <?php // $form->field($model, 'id_cong_trinh')->textInput() ?>

    <?php // $form->field($model, 'id_vat_tu')->textInput() ?>

 

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
