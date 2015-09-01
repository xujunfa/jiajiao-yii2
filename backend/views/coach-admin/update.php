<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */

$this->title = $model->id.'家教信息编辑';
$this->params['breadcrumbs'][] = ['label' => 'Coach Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-posts-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除这篇文章？~(>_<)~',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= $this->render('_form', [
        'model'      => $model,
        'businesses' => $businesses,
    ]) ?>

</div>


