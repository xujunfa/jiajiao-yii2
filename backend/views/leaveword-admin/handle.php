<?php 
use yii\helpers\Html;
 ?>

<div class="example-modal">
	<div class="modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">
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
	        </h4>
	      </div>
	      <div class="modal-body">
	        <p>&nbsp;&nbsp;&nbsp;<?= Html::encode($leaveword->content) ?></p>
	      </div>
	      <div>
	      	<form name="handle" method="post" action="<?= \Yii::$app->urlManager->createUrl(['leaveword-admin/handle','id'=>$leaveword->id]) ?>">
	      		<textarea class="form-control" name="remarks" id="" rows="4" placeholder="请输入您的处理批注..."></textarea>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">删除留言</button>
	        <button type="submit" class="btn btn-primary">提交批注</button>
	       	</form>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.example-modal -->