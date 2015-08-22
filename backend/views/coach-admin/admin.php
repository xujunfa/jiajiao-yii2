<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

$this->title = "家教管理";
?>

<div class="box">
	<div class="box-header with-border box-extra">
	  <h2 class="box-title">家教文章管理</h2>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table class="table table-bordered">
	    <tr>
	      <th style="width: 5%"><center>编号</center></th>
	      <th style="width: 25%"><center>标题</center></th>
	      <th style="width: 10%"><center>对应业务</center></th>
	      <th style="width: 8%">发布人</th>
	      <th style="width: 10%">发布时间</th>
	      <th style="width: 8%"><center>限制人数</center></th>
	      <th style="width: 12%"><center>截止时间</center></th>
	      <th style="width: 12%"><center>报名列表</center></th>
	      <th style="width: 10%"><center>是否结束</center></th>
	    </tr>
	    <?php foreach($posts as $post): ?>
	   	<tr>
	   		<td><?= Html::encode($post->id) ?></td>		
	   		<td><?= Html::a($post->title."<i class='fa fa-fw fa-eye'>", ['view', 'id' => $post->id]) ?></td>		
	   		<td><?= Html::encode($post->business->business_number) ?></td>		
	   		<td><?= Html::encode($post->admin->username) ?></td>		
	   		<td><?= Html::encode(date('Y-m-d H:i:s', $post->release_time))	 ?></td>
	   		<td><?= Html::encode($post->limit_applicants) ?></td>		
	   		<td><?= Html::encode($post->limit_time) ?></td>		
	   		<td><?= Html::a(count($post->business->applicants).'/'.$post->limit_applicants, ['business-admin/view', 'id' => $post->business->id]) ?></td>		
	   		<td></td>		
	   	</tr>
	   	<?php endforeach; ?>
	  </table>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix">
	  <?= LinkPager::widget(['pagination' => $pagination]) ?>
	</div>
</div><!-- /.box -->