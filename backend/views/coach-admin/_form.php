<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coach-posts-form" id="coach_form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'business_id')->dropDownList($businesses) ?>

    <?= $form->field($model, 'student_situation')->textarea() ?>

    <?= $form->field($model, 'coach_content')->textarea() ?>

    <?= $form->field($model, 'coach_time')->textInput() ?>

    <?= $form->field($model, 'coach_address')->textInput() ?>

    <?= $form->field($model, 'coach_demand')->textarea() ?>

    <?= $form->field($model, 'coach_wage')->textInput() ?>

    <?= $form->field($model, 'limit_time')->textInput() ?>

    <?= $form->field($model, 'limit_applicants')->textInput() ?>

    <?= $form->field($model, 'is_display')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
