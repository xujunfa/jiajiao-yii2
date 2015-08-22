<?php 

namespace backend\controllers;

use backend\models\Leaveword;
use backend\controllers\BackendController;
use yii\data\Pagination;

class LeavewordAdminController extends BackendController
{

	public $layout = 'admin';

	public function actionIndex()
	{
		$leavewords = Leaveword::find();
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount'      => $leavewords->count(),
		]);
		$leavewords = $leavewords->offset($pagination->offset)
								 ->limit($pagination->limit)
								 ->with(['from','to','handler'])
								 ->orderBy(['leave_time'=>SORT_DESC])
								 ->all();
		$colors = ['green','blue','yellow','red'];
		// echo rand(0,3);exit();
		// var_dump($leavewords);exit();	
		return $this->render('index', [
			'leavewords' => $leavewords,	
			'colors'     => $colors,
		]);
	}

}
