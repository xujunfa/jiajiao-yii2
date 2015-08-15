<head>  
 <style type="text/css">  
  td.selectbox {  
   float:left;  
   text-align: center;  
   margin: 10px;  
  }  
  select {  
   width: 200px;  
   height: 80px;  
  }  
 </style>  
</head>  

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
	<?= $form->field($model, 'grade')
			 ->listBox(
            	['1'=>'1',2=>'2',3=>3,4=>4,5=>5],
            	['multiple' => 'true'],
            	['prompt'=>'Select']); ?>

    <table>
    	<tr>
    		<td>
    			<select id="strong_course">
    				<option value>--请选择科目--</option>
    				<option value="小学">小学</option>
    			</select>
    		</td>
    		<td></td>
    		<td></td>
    	</tr>
    	<tr>
	        <td class="selectbox">
	            <select multiple id="select1">
	                <option value="1">Option 1</option>
	                <option value="2">Option 2</option>
	                <option value="3">Option 3</option>
	                <option value="4">Option 4</option>
	                <option value="5">Option 5</option>
	                <option value="6">Option 6</option>
	                <option value="7">Option 7</option>
	                <option value="8">Option 8</option>
	            </select>
	        </td>
	        <td class="selectbox">
	            <input type="button" id="add_one" name="add_one" value="&gt;" style="width: 60px" /><br /><br />
	            <input type="button" id="remove_one" name="remove_one" value="&lt;" style="width: 60px" /><br />
	            <input type="hidden" id="Mult_SelectListBox" name="Mult_SelectListBox" value="" /><!—-Request hidden Value -->
	        </td>
	        <td class="selectbox">
	            <select multiple id="select2">
	            </select>
        	</td>
    	</tr>
	</table>

	<?= "..." ?>
	
	<div class="form-group">
		<?= Html::submitButton('注册',['class'=>'btn btn-primary']) ?>
	</div>

<?php ActiveForm::end(); ?>

<script>
	//学校-校区二级联动菜单
	function getCampus(school) {
		$.ajax({
			url : "index.php?r=teacher/campus",
			method : "post",
			data: {school:school},
			success: function (data){
				$("#teacher-campus").html(data);
			}
		});
	}
</script>

<script type="text/javascript" language="javascript"> 
 $().ready(function () {
         $("input[name^='add']").click(function () {
             var id = $(this).attr('id').split('_');
             if (id[1] == 'all') {
                 $('#select1 option').remove().appendTo('#select2');
             } else {
                 $('#select1 option:selected').remove().appendTo('#select2');
             }
             var Mult_SelectListBox = $('#select2 option').map(function () { return $(this).val(); }).get().join(',');
             $("#Mult_SelectListBox").attr('value', Mult_SelectListBox);
             return false;
         });
         $("input[name^='remove']").click(function () {
             var id = $(this).attr('id').split('_');
             if (id[1] == 'all') {
                 $('#select2 option').remove().appendTo('#select1');
             } else {
                 $('#select2 option:selected').remove().appendTo('#select1');
             }
             var Mult_SelectListBox = $('#select2 option').map(function () { return $(this).val(); }).get().join(',');
             $("#Mult_SelectListBox").attr('value', Mult_SelectListBox);
             return false;
         });
     });  
 </script>
<html>  

<body> 

</body>  
</html>
