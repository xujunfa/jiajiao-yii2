<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '家教信息发布';
?>

<div class="admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'      => $model,
        'businesses' => $businesses,
    ]) ?>

</div>

