<?php 
use yii\helpers\Html;
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
            <span class="time"><i class="fa fa-clock-o"></i><?= Html::encode(date('H:i', $leaveword->leave_time)) ?></span>
            <h3 class="timeline-header">
              <a href="#"><?= Html::encode($leaveword->id>=653?$leaveword->from->username:$leaveword->leave_uid) ?></a> To
              <a href="#">
                <?php 
                  if($leaveword->id>=653 && !$leaveword->to_uid){
                    echo '所有人';
                  }else if($leaveword->id>=653 && $leaveword->to_uid){
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
                <?= Html::encode($leaveword->handler->username).'：' ?>
                <?= Html::encode($leaveword->handle_remarks) ?>
              </div>
            <?php endif; ?>
            <div class="timeline-footer">
              <a class="btn btn-primary btn-xs">处理</a>
              <a class="btn btn-danger btn-xs">删除</a>
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