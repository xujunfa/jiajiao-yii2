<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coach Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coach Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'admin_id',
            'business_id',
            'title',
            'student_situation',
            // 'coach_content',
            // 'coach_time',
            // 'coach_address',
            // 'coach_demand',
            // 'coach_wage',
            // 'limit_time',
            // 'limit_applicants',
            // 'release_time',
            // 'is_display',
            // 'is_delete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
