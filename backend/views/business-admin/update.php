<?php 

use yii\helpers\Html;

$this->title = '家教业务表';

 ?>

<div class="coach-posts-view">

    <p>
        <?= Html::a('查看', ['view',   'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除这份业务表吗？~(>_<)~?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= $this->render('_table-form', [
        'model'           => $model,
        'business_number' => $business_number,
    ]) ?>

</div>