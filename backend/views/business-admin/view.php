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
        <div class="box-header with-border box-extra">
            <center>
                <h2 class="box-title">家教业务表 <?= Html::encode($business->business_number) ?></h2>
            </center>

        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
            	<tr>
	                <td class="business_table_td" width="15%">客户名称</td>
	                <td width="35%" class="business_table_td2"><?= Html::encode($business->customer_name) ?></td>
	                <td class="business_table_td" width="15%">上次找家教时间</td>
	                <td width="35%" class="business_table_td2"><?= Html::encode($business->last_time) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">手机号码</td>
	             	<td class="business_table_td2"><?= Html::encode($business->phone) ?></td>
	             	<td  class="business_table_td">固定电话</td>
	             	<td class="business_table_td2"><?= Html::encode($business->telephone) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">辅导年级性别科目</td>
	             	<td class="business_table_td2"><?= Html::encode($business->student_message) ?></td>
	             	<td class="business_table_td">辅导时间</td>	
	             	<td class="business_table_td2"><?= Html::encode($business->coach_time) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">辅导对象具体情况</td>
	             	<td colspan="3" class="business_table_td2"><?= Html::encode($business->student_situation) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">对教员要求</td>
	             	<td colspan="3" class="business_table_td2"><?= Html::encode($business->requirement) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">家庭详细地址</td>
	             	<td class="business_table_td2"><?= Html::encode($business->address) ?></td>
	             	<td class="business_table_td">交通到达方式</td>	
	             	<td class="business_table_td2"><?= Html::encode($business->traffic) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">初定报酬</td>
	             	<td class="business_table_td2" colspan="3"><?= Html::encode($business->reward) ?></td>
	             </tr>
	             <tr>
	             	<td class="business_table_td">备注</td>
	             	<td class="business_table_td2" colspan="3"><?= Html::encode($business->remarks) ?></td>
	             </tr>
            </table>    
        </div>
    </div>

</div>