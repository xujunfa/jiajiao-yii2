<?php 

use yii\helpers\Html;

$this->title = '家教业务表';

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

    <div class="box table_box">
        <form method="post" action="<?= \Yii::$app->urlManager->createUrl(['business-admin/update','id'=>$business->id]) ?>">
        <div class="box-header with-border box-extra">
            <center>
                <h2 class="box-title">家教业务登记表</h2><br>
                <div class="pull-right">
                  <code>业务编号：</code> <input name="business_number" type="text" value="<?= Html::encode($business->business_number) ?>">
                </div>
            </center>

        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-hover">
            	<tr>
	                <td class="business_table_td" width="17%">客户名称</td>
	                <td width="33%" class="business_table_td2">
	                	<input name="customer_name" type="text" class="form-control" value="<?= Html::encode($business->customer_name) ?>">
	                </td>
	                <td class="business_table_td" width="15%">上次找家教时间</td>
	                <td width="35%" class="business_table_td2">
	                	<input name="last_time" type="text" class="form-control" value="<?= Html::encode($business->last_time) ?>">
	                </td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">手机号码</td>
	             	<td class="business_table_td2">
	             		<input name="phone" type="text" class="form-control" value="<?= Html::encode($business->phone) ?>">
	             	</td>
	             	<td  class="business_table_td">固定电话</td>
	             	<td class="business_table_td2">
	             		<input name="telephone" type="text" class="form-control" value="<?= Html::encode($business->telephone) ?>">
	             	</td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">辅导年级性别科目</td>
	             	<td class="business_table_td2">
	             		<input name="student_message" type="text" class="form-control" value="<?= Html::encode($business->student_message) ?>">
	             	</td>
	             	<td class="business_table_td">辅导时间</td>	
	             	<td class="business_table_td2">
	             		<input name="coach_time" type="text" class="form-control" value="<?= Html::encode($business->coach_time) ?>">
	             	</td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">辅导对象具体情况</td>
	             	<td colspan="3" class="business_table_td2">
	             		<textarea name="student_situation" rows="2" class="form-control"><?= Html::encode($business->student_situation) ?></textarea>
	             	</td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">对教员要求</td>
	             	<td colspan="3" class="business_table_td2">
	             		<textarea name="requirement" rows="2" class="form-control"><?= Html::encode($business->requirement) ?></textarea>
	             	</td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">家庭详细地址</td>
	             	<td class="business_table_td2" colspan="3">
	             		<textarea name="address" rows="2" class="form-control"><?= Html::encode($business->address) ?></textarea>
	             	</td>
	            </tr>
	            <tr>
	             	<td class="business_table_td">交通到达方式</td>	
	             	<td class="business_table_td2" colspan="3">
	             		<textarea name="traffic" rows="2" class="form-control"><?= Html::encode($business->traffic) ?></textarea>
	             	</td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">初定报酬</td>
	             	<td class="business_table_td2" colspan="3">
	             		<textarea name="reward" rows="2" class="form-control"><?= Html::encode($business->reward) ?></textarea>
	             	</td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">备注</td>
	             	<td class="business_table_td2" colspan="3">
	             		<textarea name="remarks" rows="2" class="form-control"><?= Html::encode($business->remarks) ?></textarea>
	             	</td>
	             </tr>
               <tr>
                 <td colspan="4"><button type="submit" class="btn btn-primary">提交修改</button></td>
               </tr>
            </table>
            </form>
        </div>
    </div>

</div>