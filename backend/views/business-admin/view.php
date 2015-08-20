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

           	<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">报名列表</a></li>
                  <li><a href="#tab_2" data-toggle="tab">收费单据</a></li>
                  <li><a href="#tab_3" data-toggle="tab">推荐教员</a></li>
                  <li class="dropdown">
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
                  </li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <b>How to use:</b>
                    <p>Exactly like the original bootstrap tabs except you should use
                      the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                    A wonderful serenity has taken possession of my entire soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.
                    I am alone, and feel the charm of existence in this spot,
                    which was created for the bliss of souls like mine. I am so happy,
                    my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                    that I neglect my talents. I should be incapable of drawing a single stroke
                    at the present moment; and yet I feel that I never was a greater artist than now.
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->

        </div>
    </div>

</div>