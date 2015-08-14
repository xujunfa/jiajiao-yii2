<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>家教网 后台管理</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?= Html::encode($assets_url).'css/login/'; ?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?= Html::encode($assets_url).'css/login/'; ?>bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?= Html::encode($assets_url).'css/login/'; ?>maruti-login.css" />
    </head>
    <body>
        <div id="logo">
            <img src="<?= Html::encode($assets_url).'images/login/'; ?>/login-logo.png" alt="" />
        </div>
        <div id="loginbox">   

            <!-- <form id="loginform" class="form-vertical" action="index.html"> -->
            <?php $form = ActiveForm::begin([
                        'id' => 'loginform', 
                        'options' => ['class' => 'form-vertical'],
                  ]); ?>
				<div class="control-group normal_text"><h3>家教网 后台登录</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <!-- <span class="add-on"><i class="icon-user"></i></span> -->
                            <!-- <input type="text" placeholder="Username" /> -->
                            <?= $form->field($model, 'username')->textInput(['placeholder' => '用户名'])->label(""); ?>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <!-- <span class="add-on"><i class="icon-lock"></i></span> -->
                            <!-- <input type="password" placeholder="Password" /> -->
                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码'])->label(""); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-warning" id="to-recover">Lost password?</a></span>
                    <!-- <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span> -->
                    <span class="pull-right">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </span>
                </div>
            <!-- </form> -->
            <?php ActiveForm::end(); ?>

            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions <br/><font color="#FF6633">how to recover a password.</font></p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-warning" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
                </div>
            </form>

        </div>
        
        <script src="<?= Html::encode($assets_url).'js/'; ?>jquery.min.js"></script>  
        <script src="<?= Html::encode($assets_url).'js/login/'; ?>maruti.login.js"></script> 
    </body>

</html>
