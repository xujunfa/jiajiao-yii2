<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

 ?>

<div class="box table_box">
    <?php $form = ActiveForm::begin([
    	'options' => ['class' => 'business-create-form'],
    	'fieldConfig' => [  
            // 'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",  
        	'labelOptions' => ['class' => 'business-create-label'],  
        ],  
    ]); ?>
    <div class="box-header with-border box-extra">
        <center>
            <h2 class="box-title">家教业务登记表</h2><br>
            <div class="pull-right">
              <code>业务编号：</code> 
              <?php if($model->isNewRecord): ?>
              	<?= $form->field($model, 'business_number', ['inputOptions'=>['value'=>$business_number]])->textInput() ?>
              <?php else: ?>
              	<?= $form->field($model, 'business_number')->textInput() ?>
              <?php endif; ?>
            </div>
        </center>

    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-hover business-create-table">
        	<tr>
                <td class="business_table_td" width="17%">客户名称</td>
                <td width="33%" class="business_table_td2">
                	<?= $form->field($model, 'customer_name')->textInput()->label('') ?>
                </td>
                <td class="business_table_td" width="15%">上次找家教时间</td>
                <td width="35%" class="business_table_td2">
                	<?= $form->field($model, 'last_time')->textInput()->label('') ?>
                </td>
             </tr>
             <tr>
             	<td class="business_table_td">手机号码</td>
             	<td class="business_table_td2">
             		<?= $form->field($model, 'phone')->textInput() ?>
             	</td>
             	<td  class="business_table_td">固定电话</td>
             	<td class="business_table_td2">
             		<?= $form->field($model, 'telephone')->textInput() ?>
             	</td>
             </tr>
             <tr>
             	<td class="business_table_td">辅导年级性别科目</td>
             	<td class="business_table_td2">
             		<?= $form->field($model, 'student_message')->textInput() ?>
             	</td>
             	<td class="business_table_td">辅导时间</td>	
             	<td class="business_table_td2">
             		<?= $form->field($model, 'coach_time')->textInput() ?>
             	</td>
             </tr>
             <tr>
             	<td class="business_table_td">辅导对象具体情况</td>
             	<td colspan="3" class="business_table_td2">
             		<?= $form->field($model, 'student_situation')->textarea(['rows'=>2]) ?>
             	</td>
             </tr>
             <tr>
             	<td class="business_table_td">对教员要求</td>
             	<td colspan="3" class="business_table_td2">
             		<?= $form->field($model, 'requirement')->textarea(['rows'=>2]) ?>
             	</td>
             </tr>
             <tr>
             	<td class="business_table_td">家庭详细地址</td>
             	<td class="business_table_td2" colspan="3">
             		<?= $form->field($model, 'address')->textarea(['rows'=>2]) ?>
             	</td>
            </tr>
            <tr>
             	<td class="business_table_td">交通到达方式</td>	
             	<td class="business_table_td2" colspan="3">
             		<?= $form->field($model, 'traffic')->textarea(['rows'=>2]) ?>
             	</td>
             </tr>
             <tr>
             	<td class="business_table_td">初定报酬</td>
             	<td class="business_table_td2" colspan="3">
             		<?= $form->field($model, 'reward')->textarea(['rows'=>2]) ?>
             	</td>
             </tr>
             <tr>
             	<td class="business_table_td">备注</td>
             	<td class="business_table_td2" colspan="3">
             		<?= $form->field($model, 'remarks')->textarea(['rows'=>2]) ?>
             	</td>
             </tr>
           <tr>
            	<td colspan="4">
             		<div class="form-group">
    					<?= Html::submitButton($model->isNewRecord ? '登记' : '更新信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
			 	</td>
           </tr>
        </table>
        <?php ActiveForm::end(); ?>
    </div>
</div>