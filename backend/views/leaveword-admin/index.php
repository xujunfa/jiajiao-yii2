<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use backend\components\TimeLine; 
use yii\bootstrap\Alert;

$this->title = '交接班留言';

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

<!-- row -->
<div class="row">
  <div class="col-md-12">
    <!-- The time line -->
    <ul class="timeline">
      <?php 
        $last_time = strtotime(date('Y-m-d', $leavewords[0]->leave_time));
        $new_day   = true;
        $color     = $colors[rand(0,3)];
       ?>
      <?php foreach($leavewords as $i => $leaveword): ?>
        <?php 
          if($leaveword->leave_time-$last_time<0){
            $new_day   = true;
            $last_time = strtotime(date('Y-m-d', $leaveword->leave_time));
            $color     = $colors[rand(0,3)];
          }
         ?>
        <?php if($new_day): ?>
          <li class="time-label">
            <span class="bg-<?= $color ?>"><?= Html::encode(date('Y-m-d', $last_time)) ?></span>
          </li>
          <?php $new_day = false; ?>
        <?php endif; ?>
        <!-- timeline item -->
        <li class="timeline_item">
          <i class="fa fa-envelope bg-<?= $color ?>"></i>
          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= Html::encode((new TimeLine($leaveword->leave_time))->handle()) ?></span>
            <h3 class="timeline-header">
              <a href="#"><?= Html::encode($leaveword->id>=651?$leaveword->from->username:$leaveword->leave_uid) ?></a> To
              <a href="#">
                <?php 
                  if($leaveword->id>=651 && !$leaveword->to_uid){
                    echo '所有人';
                  }else if($leaveword->id>=651 && $leaveword->to_uid){
                    echo $leaveword->to->username;
                  }else{
                    echo $leaveword->to_uid;
                  }
                 ?>
              </a>
            </h3>
            <div class="timeline-body">
              <?= Html::encode($leaveword->content) ?>
            </div>
            <?php if($leaveword->is_handle==1): ?>
              <div class="test">
                <?= Html::encode($leaveword->handler->username).' 已处理：' ?>
                <?= Html::encode($leaveword->handle_remarks) ?>
              </div>
            <?php endif; ?>
            <div class="timeline-footer">
              <?= Html::a('处理',['handle','id'=>$leaveword->id],['class'=>'btn btn-primary btn-xs']) ?>
              <!-- <a class="btn btn-primary btn-xs">处理</a> -->
              <?= Html::a('删除', ['delete', 'id' => $leaveword->id], [
                 'class' => 'btn btn-danger btn-xs',
                  'data' => [
                     'confirm' => '你确定要删除这条留言吗？~(>_<)~',
                     'method' => 'post',
                  ],
              ]) ?>
            </div>
          </div>
        </li>
        <!-- END timeline item -->
      <?php endforeach; ?>
      <li>
        <i class="fa fa-clock-o bg-gray"></i>
      </li>
    </ul>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="box-footer clearfix">
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>