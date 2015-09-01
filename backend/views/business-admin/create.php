<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '家教业务表';

 ?>

<div class="coach-posts-view">

    <?= $this->render('_table-form', [
        'model'           => $model,
        'business_number' => $business_number,
    ]) ?>

</div>