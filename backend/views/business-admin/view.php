<?php 

use yii\helpers\Html;
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

<div class="coach-posts-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $business->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $business->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php if($business->has_post == 0): ?>
          <?= '&nbsp;&nbsp;&nbsp;&nbsp;'.Html::a('发布家教', ['coach-admin/create', 'id' => $business->id], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <div class="box table_box">
        <div class="box-header with-border box-extra">
            <center>
                <h2 class="box-title">家教业务表 [<code><?= Html::encode($business->business_number) ?></code>]</h2>
            </center>

        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-hover">
            	<tr>
	                <td class="business_table_td" width="17%">客户名称</td>
	                <td width="33%" class="business_table_td2"><?= Html::encode($business->customer_name) ?></td>
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
	             	<td class="business_table_td2" colspan="3"><?= Html::encode($business->address) ?></td>
	            </tr>
	            <tr>
	             	<td class="business_table_td">交通到达方式</td>	
	             	<td class="business_table_td2" colspan="3"><?= Html::encode($business->traffic) ?></td>
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

           	<div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#tab_1-1" data-toggle="tab">报名列表</a></li>
                  <li><a href="#tab_2-2" data-toggle="tab">收费单据</a></li>
                  <li><a href="#tab_3-2" data-toggle="tab">推荐教员</a></li>
                  <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                      <li role="presentation" class="divider"></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                  </li> -->
                  <li class="pull-left header"><i class="fa fa-th"></i></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1-1">
                    <?php if(count($business->applicants)!=0): ?>
                  	<table width="50%" class="table-bordered applicants_table">
                  		<tr>
                  			<td class="business_table_td">教员编号</td>
                  			<td class="business_table_td">姓名</td>
                  			<td class="business_table_td">报名时间</td>
                        <td class="business_table_td">操作</td>
                  		</tr>
                  		
                      <?php foreach($business->applicants as $applicant): ?>
          						<tr <?php if($applicant->apply->is_recommend==1) echo "class='recommend' disabled='disabled'"; ?> >
          							<td><?= Html::encode($applicant->id) ?></td>
          							<td><?= Html::a($applicant->username,['teacher-admin/view', 'id' => $applicant->id]) ?></td>
          							<td><?= Html::encode(date('Y-m-d H:i:s',$applicant->apply->apply_time)) ?></td>
                        <td>
                          <a class="btn btn-default btn-sm" href="#" role="button" <?php if($applicant->apply->is_recommend==1) echo "disabled='disabled'"; ?>>推荐该教员</a>
                        </td>
          						</tr>
                  		<?php endforeach; ?>
                  		
                  	</table>  
                    <?php endif; ?>

                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2-2">
                 	  <table width="70%" class="table-bordered table-hover applicants_table">
                  	 	<?php foreach($business->charges as $charge): ?>
                  	 	<tr>
                  	 		<td class="business_table_td" width="15%">收据编号</td><td width="40%"><?= Html::encode($charge->receipt) ?></td>
                  	 		<td class="business_table_td" width="15">收费事项</td><td width="30%"><?= Html::encode($charge->charges_item) ?></td>
                  	 	</tr>
                  	 	<tr>
                  	 		<td class="business_table_td">金额</td><td><?= Html::encode($charge->money) ?></td>
                  	 		<td class="business_table_td">收费人</td><td><?= Html::encode($charge->charges_people) ?></td>
                  	 	</tr>
                  	 	<tr>
                  	 		<td class="business_table_td">备注</td><td><?= Html::encode($charge->charges_remarks) ?></td>
                  	 		<td class="business_table_td">收费时间</td><td><?= Html::encode(date('Y-m-d H:i:s',$charge->charges_time)) ?></td>
                  	 	</tr>
                  	 	<tr>
                  			<td colspan="4">&nbsp;</td>
                  		</tr>
				            	<?php endforeach; ?>

                      <form method="post" action="<?= \Yii::$app->urlManager->createUrl(['business-admin/view','id'=>$business->id]) ?>">
                      <tr>
                        <td class="business_table_td" width="15%">收据编号</td><td width="40%"><input type="text" name="receipt"></td>
                        <td class="business_table_td" width="15">收费事项</td><td width="30%"><input type="text" name="charges_item"></td>
                      </tr>
                      <tr>
                        <td class="business_table_td">金额</td><td><input type="text" name="money"></td>
                        <td class="business_table_td">收费人</td><td><input type="text" name="charges_people" value="<?= \Yii::$app->session['username'] ?>"></td>
                      </tr>
                      <tr>
                        <td class="business_table_td">备注</td><td colspan="3"><textarea name="charges_remarks" rows="2"></textarea></td>
                      </tr>
                      <tr>
                        <td></td>
                        <input type="hidden" name="type" value="charge">
                        <td colspan="3"><button type="submit" class="btn btn-default btn-sm">&nbsp;&nbsp;&nbsp;提交&nbsp;&nbsp;&nbsp;</button></td>
                      </tr>
                      </form>
				            </table>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_3-2">
                    <table width="85%" class="table-bordered table-hover applicants_table">
                  		<?php foreach($business->recommend as $recommend):  ?>
                  		<tr>
                  			<td class="business_table_td" rowspan="3">教员编号[<?= Html::encode($recommend->id) ?>]</td>
                  			<td class="business_table_td">姓名</td><td><?= Html::encode($recommend->username) ?></td>
                  			<td class="business_table_td">联系方式</td><td><?= Html::encode($recommend->details->phone) ?></td>
                  			<td class="business_table_td">推荐时间</td><td><?= Html::encode(date('Y-m-d H:i:s',$recommend->recommend->handle_time)) ?></td>
                  		</tr>
                  		<tr>
                  			<td class="business_table_td">推荐人</td><td><?= Html::encode($recommend->recommend->operator_id) ?></td>
                  			<td class="business_table_td">推荐备注</td><td colspan="3"><?= Html::encode($recommend->recommend->recommend_remarks) ?></td>
                  		</tr>
                  		<tr>
                  			<td class="business_table_td">试教结果</td><td><?= Html::encode($recommend->recommend->result) ?></td>
                  			<td class="business_table_td">结果原因</td><td colspan="3"><?= Html::encode($recommend->recommend->reason) ?></td>
                  		</tr>
                  		<tr>
                  			<td colspan="7">&nbsp;</td>
                  		</tr>
                  		<?php endforeach; ?>
                      <form method="post" action="<?= \Yii::$app->urlManager->createUrl(['business-admin/view','id'=>$business->id]) ?>">
                      <tr>
                        <td class="business_table_td">教员编号</td><td colspan="2"><input type="text" name="teacher_id"></td>
                        <td class="business_table_td">推荐备注</td><td colspan="3"><textarea name="recommend_remarks" rows="2"></textarea></td>
                        <input type="hidden" name="type" value="recommend">
                      </tr>
                      <tr>
                        <td><button type="submit" class="btn btn-default btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;推荐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></td>
                        <td colspan="6"></td>
                      </tr>
                      <form>
                  		
                  	</table>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->

        </div>
    </div>

</div>