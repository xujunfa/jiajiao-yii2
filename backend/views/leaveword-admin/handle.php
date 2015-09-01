<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>

<div class="example-modal">
	<div class="modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">
	        	<a href="#"><?= Html::encode($model->id>=651?$model->from->username:$model->leave_uid) ?></a> To
            	<a href="#">
                <?php 
                  if($model->id>=651 && !$model->to_uid){
                    echo '所有人';
                  }else if($model->id>=651 && $model->to_uid){
                    echo $model->to->username;
                  }else{
                    echo $model->to_uid;
                  }
                 ?>
             	 </a>
	        </h4>
	      </div>
	      <div class="modal-body">
	        <p>&nbsp;&nbsp;&nbsp;<?= Html::encode($model->content) ?></p>
	      </div>
	      <div>
	      <?php $form = ActiveForm::begin(); ?>
	      	<?= $form->field($model, 'handle_remarks')->textarea(['placeholder' => '请输入您的处理批注...', 'rows' => 4]) ?>
	      </div>
	      <div class="modal-footer">
	      	<?= Html::a('删除留言', ['delete', 'id' => $model->id], [
	            'class' => 'btn btn-danger pull-left',
	            'data' => [
	                'confirm' => '你确定要删除这条留言吗？~(>_<)~',
	                'method' => 'post',
	            ],
            ]) ?>
	        <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
	      <?php ActiveForm::end(); ?>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.example-modal -->