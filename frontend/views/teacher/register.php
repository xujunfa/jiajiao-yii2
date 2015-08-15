<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->label('真实姓名') ?>
	<?= $form->field($model, 'password')->passwordInput()->label('密码') ?>
	<?= $form->field($model, 'sex')->radioList($sex_info)->label('性别') ?>
	<?= $form->field($model, 'gradation')
			 ->dropDownList($gradation, ['prompt' => '---请选择您的学历---'])
			 ->label('学历') ?>
	<?= $form->field($model, 'school')
			 ->dropDownList($schools, ['prompt' => '---请选择学校---','onclick' => 'getCampus(this.value)'])
			 ->label('就读学校') ?>

	<?= $form->field($model, 'campus')
			 ->dropDownList($campus, [$campus,'prompt' => '---请选择校区---'])
			 ->label('校区'); ?>
	
	<?= "..." ?>
	
	<div class="form-group">
		<?= Html::submitButton('注册',['class'=>'btn btn-primary']) ?>
	</div>

<?php ActiveForm::end(); ?>

<script>

	function getCampus(school) {
		$.ajax({
			url : "index.php?r=teacher/campus",
			method : "post",
			data: {school:school},
			success: function (data){
				$("#teacher-campus").html(data);
				// alert(data);
			}
		});
	}
</script>