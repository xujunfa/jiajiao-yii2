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
	        <?php $form = ActiveForm::begin(); ?>
	        <span class="label label-primary">To</span>&nbsp;&nbsp;&nbsp;
	        <span>
	        	<?= $form->field($model, 'to_uid')->dropDownList($admin_map) ?>
	        </span>
	      </div>
	      <div class="modal-body">
	        <?= $form->field($model, 'content')->textarea(['placeholder' => '请输入留言内容...', 'rows' => 4]) ?>
	      </div>
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-default pull-l	eft" data-dismiss="modal">Close</button> -->
	        <?= Html::submitButton($model->isNewRecord ? '提交留言' : '更新信息', ['class' => 'btn btn-primary']) ?>
	        <?php ActiveForm::end(); ?>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.example-modal -->