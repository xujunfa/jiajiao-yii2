<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CoachPosts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coach Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                <h2 class="box-title">
                    <?= Html::encode($post->title) ?>
                </h2><br>
                <i class="fa fa-fw fa-user"></i><?= Html::encode($post->admin->username) ?>&nbsp;&nbsp;&nbsp;  
                <i class="fa fa-fw fa-clock-o"></i><?= date('Y-m-d H:i:s',$post->release_time) ?>
            </center>
            

        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered self_border">
                <tr>
                    <th width="120px">对应业务</th><td class="post_td"><?= Html::a($post->business->business_number, ['business-admin/view', 'id' => $post->business->id]) ?></td>
                </tr>
                <tr>
                    <th>学生情况</th><td class="post_td"><?= Html::encode($post->student_situation) ?></td>
                </tr>
                <tr>
                    <th>家教内容</th><td class="post_td"><?= Html::encode($post->coach_content) ?></td>
                </tr>
                <tr>
                    <th>家教时间</th><td class="post_td"><?= Html::encode($post->coach_time) ?></td>
                </tr>
                <tr>
                    <th>家教地址</th><td class="post_td"><?= Html::encode($post->coach_address) ?></td>
                </tr>
                <tr>
                    <th>家教要求</th><td class="post_td"><?= Html::encode($post->coach_demand) ?></td>
                </tr>
                <tr>
                    <th>家教报酬</th><td class="post_td"><?= Html::encode($post->coach_wage) ?></td>
                </tr>
                <tr>
                    <th>报名时间限制</th><td class="post_td"><?= Html::encode($post->limit_time) ?></td>
                </tr>
                <tr>
                    <th>发布时间</th><td class="post_td"><?= Html::encode(date('Y-m-d H:i:s',$post->release_time)) ?></td>
                </tr>
                <tr>
                    <th>是否显示</th><td class="post_td"><?= Html::encode($post->is_display==1?'是':'否') ?></td>
                </tr>
            </table>    
        </div>
    </div>

</div>
