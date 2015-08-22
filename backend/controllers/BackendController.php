<?php 

namespace backend\controllers;

use yii\web\Controller;
use backend\models\Leaveword;
use backend\components\TimeLine;

class BackendController extends Controller
{

	public function init()
	{
		$view = \Yii::$app->view;
		$view->params['leavewords'] = '<<h1>test</h1>';	

		$leavewords = Leaveword::find()->where("is_handle='0'")
									   ->with(['from','to'])
									   ->orderBy(['leave_time'=>SORT_DESC])
									   ->all();
		// var_dump(count($leavewords));exit();
		$view->params['leavewords']       = $leavewords;
		$view->params['leavewords_count'] = count($leavewords);

		// var_dump($view->params['leavewords'][0]->from->head_image);exit();

		// echo (new TimeLine(1439260977))->handle();exit();

	}

}