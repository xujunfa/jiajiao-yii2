<?php 

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;

class AdminController extends Controller
{

	public function actionLogin()
	{
		echo Yii::$app->params['backend_assets'];
	}

}