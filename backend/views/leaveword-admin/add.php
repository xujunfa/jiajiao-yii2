<?php 
use yii\helpers\Html;
 ?>

<div class="example-modal">
	<div class="modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <form method="post" action="<?= \Yii::$app->urlManager->createUrl(['leaveword-admin/add']) ?>">
	        <span class="label label-primary">To</span>&nbsp;&nbsp;&nbsp;
	        <span>
	        	<select name="to_uid" class="form-control leaveword_select">
	        		<?php foreach($admin_map as $id => $username): ?>
	        			<option value="<?= $id ?>"><?= $username ?></option>
	        		<?php endforeach; ?>
	        	</select>
	        </span>
	      </div>
	      <div class="modal-body">
	        <textarea class="form-control" name="content" rows="4" placeholder="请输入留言内容..."></textarea>
	      </div>
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
	        <button type="submit" class="btn btn-primary">提交留言</button>
	        </form>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.example-modal -->