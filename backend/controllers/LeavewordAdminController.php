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
			'pagination' => $pagination,	
			'colors'     => $colors,
		]);
	}

	public function actionHandle($id)
	{
		if($_POST)
		{
			// var_dump($_POST);exit();
			$leaveword = Leaveword::find()->where('id=:id',[':id' =>$id])
										  ->one();
			$leaveword->handle_remarks = $_POST['remarks'];
			$leaveword->handle_uid     = \Yii::$app->session['userid'];
			$leaveword->handle_time    = time();
			$leaveword->is_handle      = 1;
			if($leaveword->save())
				echo "<h1>OK</h1>";exit();	
		}
		$leaveword = Leaveword::find()->where('id=:id',[':id' => $id])
									  ->with('from','to')
									  ->one();
		return $this->render('handle', [
			'leaveword' => $leaveword,
		]);
	}

}
