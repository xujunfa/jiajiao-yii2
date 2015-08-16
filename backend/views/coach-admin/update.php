<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */

$this->title = 'Update Coach Posts: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coach Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coach-posts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
