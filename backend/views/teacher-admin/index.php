<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = "家教网后台-教员库";
?>



<div class="box">
<div class="box-header with-border">
  <h2 class="box-title">教员库</h2>
  <a href=""><button class="btn bg-navy margin pull-right">明星教员</button></a>
  <a href=""><button class="btn bg-navy margin pull-right">认证教员</button></a>
  <a href=""><button class="btn bg-navy margin pull-right">未认证教员</button></a>
  <a href=""><button class="btn bg-navy margin pull-right">黑名单</button></a>
  <div class="btn-group pull-left">
	  <button type="button" class="btn btn-default btn-flat">排序规则</button>
	  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
	    <span class="caret"></span>
	    <span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
	    <li><a href="#">编号</a></li>
	    <li><a href="#">注册时间</a></li>
	  </ul>
  </div>
</div><!-- /.box-header -->
<div class="box-body">
  <table class="table table-bordered">
    <tr>
      <th style="width: 100px"><center>教员编号</center></th>
      <th style="width: 80px"><center>头像</center></th>
      <th style="width: 75px"><center>姓名</center></th>
      <th style="width: 50px">性别</th>
      <th style="width: 50px">年级</th>
      <th style="width: 155px"><center>专业</center></th>
      <th style="width: 210px"><center>可教授科目</center></th>
      <th style="width: 135px"><center>注册时间</center></th>
      <th><center>操作</center></th>
    </tr>
    <?php 
    	foreach($teachers as $teacher): 
    		$sex = $teacher->sex==1?'男':'女';
    		$pimg = empty($teacher->details->head_image)?'20130830135948.jpg':$teacher->details->head_image;
    ?>
    <tr>

    	<td>
    		<span class="badge bg-blue">
    			<?= Html::encode($teacher->id) ?>
    		</span>
    	</td>	
    	<td>
			<img src="http://jiajiao.jnu.edu.cn/upload/pimg/<?= Html::encode($pimg) ?>" width="50" height="50">
    	</td>	
    	<td><?= Html::encode($teacher->username) ?></td>	
    	<td><?= Html::encode($sex) ?></td>	
    	<td>
    		<span class="badge bg-red">
    			<?= Html::encode($teacher->grade) ?>
    		</span>
    	</td>	
    	<td><?= Html::encode($teacher->details->major) ?></td>	
    	<td><?= Html::encode($teacher->teach_courses) ?></td>	
    	<td><?= Html::encode(date('Y-m-d',0)) ?></td>	
    	<td></td>	
    </tr>
	<?php endforeach; ?>
    <!-- <tr>
      <td>1.</td>
      <td>Update software</td>
      <td></td>
      <td><span class="badge bg-red">55%</span></td>
    </tr> -->
  </table>
</div><!-- /.box-body -->
<div class="box-footer clearfix">
  <?= LinkPager::widget(['pagination' => $pagination]) ?>
  <!-- <ul class="pagination pagination-sm no-margin pull-right">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul> -->
</div>
</div><!-- /.box -->