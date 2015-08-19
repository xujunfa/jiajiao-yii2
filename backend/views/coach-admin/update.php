<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coach Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-posts-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $post->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $post->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

	<form id="coach_form" method="post" action="<?= \Yii::$app->urlManager->createUrl(['coach-admin/update','id'=>$post->id]); ?>">
	    <div class="form-group">
	        <label class="col-sm-2 control-label">标题</label>
	        <input type="text" name="title" class="form-control" value="<?= Html::encode($post->title) ?>">
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">对应业务</label>
	        <select name="business_id">
	        <?php foreach($businesses as $business): ?>
	            <option value="<?= Html::encode($business->id) ?>" <?= Html::encode($business->business_number==$post->business->business_number?'selected="selected"':'') ?>>
	                <?= Html::encode($business->business_number) ?>
	            </option>
	        <?php endforeach; ?>
	        </select>
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">学生情况</label>
	        <textarea name="student_situation" class="form-control"><?= Html::encode($post->student_situation) ?></textarea>
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">家教内容</label>
	        <textarea name="coach_content" class="form-control"><?= Html::encode($post->coach_content) ?></textarea>
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">家教时间</label>
	        <input type="text" name="coach_time" class="form-control" value="<?= Html::encode($post->coach_time) ?>">
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">家教地址</label>
	        <input type="text" name="coach_address" class="form-control" value="<?= Html::encode($post->coach_address) ?>">
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">家教要求</label>
	        <textarea name="coach_demand" class="form-control"><?= Html::encode($post->coach_demand) ?></textarea>
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">家教报酬</label>
	        <input type="text" name="coach_wage" class="form-control" value="<?= Html::encode($post->coach_wage) ?>">
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">限制报名人数</label>
	        <input type="text" name="limit_applicants" class="form-control" value="<?= Html::encode($post->limit_applicants) ?>">
	    </div>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">限制报名时间</label>
	        <input type="text" name="limit_time" class="form-control" value="<?= Html::encode($post->limit_time) ?>">
	    </div>
	    <input type="hidden" name="admin_id" value="<?= \Yii::$app->session['userid'] ?>">
	    <input type="submit">
	</form>

</div>
