<?php 
use yii\helpers\Html;
?>

<div class="box">
	<div class="box-header with-border box-extra">
	 	<center><h2 class="box-title">
	 		<?= Html::encode($teacher->id."--".$teacher->username."  基本信息表") ?>
	 	</h2></center>
	</div><!-- /.box-header -->
	<div class="box-body">
	 	<table class="table table-bordered self_border">
	 		<tr>
				<td colspan="7" bgcolor="#59a4d5"><b>基本信息</b></th>
			</tr>
	    	<tr>
	    		<th width="90px">姓名</th><td align="left"><?= Html::encode($teacher->username) ?></td>
	    		<th width="90px">籍贯</th><td align="left"><?= Html::encode($teacher->details->native_place) ?></td>
	    		<th width="75px">性别</th><td align="left"><?= Html::encode($sex) ?></td>
	    		<th rowspan="4" width="180px"><img src="http://jiajiao.jnu.edu.cn/upload/pimg/<?= Html::encode($pimg) ?>" alt=""></th>
	    	</tr>
	    	<tr>
	    		<th>教员编号</th><td align="left"><?= Html::encode($teacher->id) ?></td>
	    		<th>是否贫困生</th><td align="left"><?= Html::encode($map_arr[$teacher->details->is_poor]) ?></td>
	    		<th>是否留校</th><td align="left"><?= Html::encode($map_stay[$teacher->details->is_stay]) ?></td>
	    	</tr>
			<tr>
				<th>擅长科目</th><td align="left"><?= Html::encode($teacher->strong_subjects) ?></td>
	    		<th>是否有空接家教</th><td align="left"><?= Html::encode($map_arr[$teacher->details->is_free]) ?></td>
	    		<th>是否求职</th><td align="left"><?= Html::encode($map_arr[$teacher->details->is_apply]) ?></td>
			</tr>
			<tr>
				<th>学院</th><td align="left"><?= Html::encode($teacher->details->college) ?></td>
	    		<th>专业</th><td align="left"><?= Html::encode($teacher->details->major) ?></td>
	    		<th>年级</th><td align="left"><?= Html::encode($teacher->gradation."-".$teacher->grade) ?>级</td>
			</tr>
			<tr>
				<th>就读学校</th><td><?= Html::encode($teacher->school."--".$teacher->campus) ?></td>
				<th>教员状态</th>
				<td>
					<span class="badge bg-blue">
	    				<?= Html::encode($map_type[$teacher->type]) ?>
	    			</span>
	    		</td>
			</tr>

			<tr>
				<td colspan="7" bgcolor="#59a4d5"><b>联系方式</b></th>
			</tr>
			<tr>
				<th>QQ</th><td><?= Html::encode($teacher->details->qq) ?></td>
				<th>电话号码</th><td><?= Html::encode($teacher->details->phone) ?></td>
				<th>邮箱</th><td colspan="2"><?= Html::encode($teacher->email) ?></td>
			</tr>

			<tr>
				<td colspan="7" bgcolor="#59a4d5"><b>成绩</b></th>
			</tr>
			<tr>
				<th>平均绩点</th><td><?= Html::encode($teacher->details->gpa) ?></td>
				<th>英语水平</th><td><?= Html::encode($teacher->details->english_lv) ?></td>
				<th>高中主科</th><td><?= Html::encode($teacher->details->major_subject) ?></td>
			</tr>
			<tr>
				<th>高考分数</th><td colspan="6"><?= Html::encode("总分：".$exam_score[0]."  语文：".$exam_score[1]."  数学：".$exam_score[2]."  英语：".$exam_score[3]."  综合：".$exam_score[4]) ?></td>
			</tr>
			<tr>
				<th>考研分数</th><td colspan="6"><?= Html::encode($ky_score) ?></td>
			</tr>

			<tr>
				<td colspan="7" bgcolor="#59a4d5"><b>家教条件</b></th>
			</tr>
			<tr>
				<th>可教授课程</th><td colspan="6"><?= Html::encode($teacher->teach_courses) ?></td>
			</tr>
			<tr>
				<th>可教授区域</th><td colspan="6"><?= Html::encode($teacher->details->teach_origins) ?></td>
			</tr>
			<tr>
				<th>对象要求</th><td colspan="3"><?= Html::encode($teacher->details->require_student) ?></td>
				<th>时薪要求</th><td colspan="2"><?= Html::encode($teacher->details->require_wage) ?></td>
			</tr>
			<tr>
				<th>地址要求</th><td colspan="6"><?= Html::encode($teacher->details->require_address) ?></td>
			</tr>
			<tr>
				<th>家教经验</th><td colspan="6"><?= Html::encode($teacher->details->teach_exprience) ?></td>
			</tr>
			<tr>
				<th>性格特点</th><td colspan="6"><?= Html::encode($teacher->details->character) ?></td>
			</tr>
			<tr>
				<th>空闲时间表</th>
				<td colspan="6">
					<table>
						<tr>
							<td width="120px" height="35px"></td>
							<th width="120px">星期一</th>
							<th width="120px">星期二</th>
							<th width="120px">星期三</th>
							<th width="120px">星期四</th>
							<th width="120px">星期五</th>
							<th width="120px">星期六</th>
							<th width="120px">星期日</th>
						</tr>
						<tr>
							<th height="40px">早上</th>
							<?php 
								for ($i=0; $i < 7; $i++) { 
									$is_free = ($free_time[$i]==0|$free_time[$i]=='')?"<td></td>":"<td bgcolor='#a4a4a4'><b>√</b></td>";
									echo $is_free;
								}
							 ?>
						</tr>
						<tr>
							<th height="40px">中午</th>
							<?php 
								for ($i=7; $i < 14; $i++) { 
									$is_free = ($free_time[$i]==0|$free_time[$i]=='')?"<td></td>":"<td bgcolor='#a4a4a4'><b>√</b></td>";
									echo $is_free;
								}
							 ?>
						</tr>
						<tr>
							<th height="40px">晚上</th>
							<?php 
								for ($i=14; $i < 21; $i++) { 
									$is_free = ($free_time[$i]==0|$free_time[$i]=='')?"<td></td>":"<td bgcolor='#a4a4a4'><b>√</b></td>";
									echo $is_free;
								}
							 ?>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td colspan="7" bgcolor="#59a4d5"><b>能力&&技能</b></th>
			</tr>
			<tr>
				<th>掌握语言</th><td colspan="6"><?= Html::encode($teacher->details->languages) ?></td>
			</tr>
			<tr>
				<th>技能&才艺</th><td colspan="6"><?= Html::encode($teacher->details->skills) ?></td>
			</tr>
			<tr>
				<th>曾获奖项</th><td colspan="6"><?= Html::encode($teacher->details->prize) ?></td>
			</tr>

			<tr>
				<td colspan="7" bgcolor="#59a4d5"><b>其他信息</b></th>
			</tr>
			<tr>
				<th>自我介绍</th><td colspan="6"><?= Html::encode($teacher->details->introduction) ?></td>
			</tr>
			<tr>
				<th>教员评价</th><td></td>
			</tr>
			<tr>
				<th>教员成长记录</th><td></td>
			</tr>
	  	</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->