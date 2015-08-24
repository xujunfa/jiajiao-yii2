<?php 

namespace backend\controllers;

use yii\web\Controller;
use backend\models\Leaveword;
use backend\components\TimeLine;
use backend\models\Business;

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
		$businesses = Business::find()->where("is_recommend=0")
									  ->with(['admin'])
									  ->orderBy(['registered_time'=>SORT_DESC])
									  ->all();
		// var_dump($businesses);exit();
		$view->params['leavewords']       = $leavewords;
		$view->params['leavewords_count'] = count($leavewords);
		$view->params['businesses']       = $businesses;
		$view->params['businesses_count'] = count($businesses);

	}

}