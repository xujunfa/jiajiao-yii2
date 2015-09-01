<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

$this->title = '家教业务表';

if( \Yii::$app->getSession()->hasFlash('success') ) {
  echo Alert::widget([
    'options' => [
      'class' => 'alert-success', //这里是提示框的class
    ],
    'body' => \Yii::$app->getSession()->getFlash('success'), //消息体
  ]);
}
if( \Yii::$app->getSession()->hasFlash('error') ) {
  echo Alert::widget([
    'options' => [
      'class' => 'alert-error',
    ],
    'body' => \Yii::$app->getSession()->getFlash('error'),
  ]);
}

 ?>

<div class="box">
	<div class="box-header with-border box-extra">
	  <h2 class="box-title">家教业务管理</h2>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table class="table table-bordered table-hover">
	  	<tr>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">业务编号</td>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">客户名称</td>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">学生情况</td>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">记录人</td>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">录入时间</td>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">报名情况</td>
	  		<td bgcolor="#51a7d8" align="center" class="business_list_th">业务状态</td>
	  	</tr>
	  	<?php foreach($businesses as $business): ?>
		<tr>
			<td><?= Html::a($business->business_number, ['view', 'id' => $business->id]) ?></td>		
			<td><?= Html::encode($business->customer_name) ?></td>		
			<td><?= Html::encode($business->student_message) ?></td>		
			<td><?= Html::encode($business->admin->username) ?></td>		
			<td><?= Html::encode(date('Y-m-d H:i:s',$business->registered_time)) ?></td>		
			<td><?= Html::a('报名列表（'.count($business->applicants).'/'.$business->post->limit_applicants.'）', ['view', 'id'=>$business->id]) ?></td>		
			<td><?= Html::encode($business->is_recommend==1?'已推荐':'报名中') ?></td>		
		</tr>
	  	<?php endforeach; ?>
	  </table>
	</div>
	<div class="box-footer clearfix">
	  <?= LinkPager::widget(['pagination' => $pagination]) ?>
	</div>
</div>