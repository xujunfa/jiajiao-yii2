<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */

$this->title = 'Create Coach Posts';
$this->params['breadcrumbs'][] = ['label' => 'Coach Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
