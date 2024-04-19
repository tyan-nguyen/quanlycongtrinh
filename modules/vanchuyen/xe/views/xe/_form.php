<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Xe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xe-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>  

    <?= $form->field($model, 'hieu_xe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hang_xe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nam_san_xuat')->dropDownList(
    range(date('Y') - 100, date('Y')),
    ['prompt' => 'Chọn năm']
) ?>

    <?= $form->field($model, 'bien_so_xe')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput()->label('Hình ảnh xe') ?>

  

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
