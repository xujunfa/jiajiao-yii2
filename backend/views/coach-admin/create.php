<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '家教信息发布';
?>

<script>
$().ready(function(){
	$("#coach_form").validate({
		rules:{
			username: "required",
		},
		messages:{
			username: "用户名必填",
		}
	})
});
</script>

<form id="coach_form" method="post" action="<?= \Yii::$app->urlManager->createUrl(['coach-admin/create']); ?>">
	<div class="form-group">
		<label class="col-sm-2 control-label">学生情况</label>
		<textarea name="student_situation" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">家教内容</label>
		<textarea name="coach_content" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">家教时间</label>
		<input type="text" name="coach_time" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">家教地址</label>
		<input type="text" name="coachaddress_" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">家教要求</label>
		<textarea name="coach_demand" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">家教报酬</label>
		<input type="text" name="coach_wage" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">限制报名人数</label>
		<input type="text" name="limit_applicants" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">限制报名时间</label>
		<input type="text" name="limit_time" class="form-control">
	</div>
	<input type="submit">
</form>

