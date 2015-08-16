<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <?= $form->field($model, 'student_situation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coach_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coach_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coach_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coach_demand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coach_wage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit_applicants')->textInput() ?>

    <?= $form->field($model, 'release_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_display')->textInput() ?>

    <?= $form->field($model, 'is_delete')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
