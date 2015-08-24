<?php 

namespace backend\controllers;

use backend\models\Leaveword;
use backend\controllers\BackendController;
use yii\data\Pagination;
use backend\models\Admin;

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
		$leaveword = Leaveword::find()->where('id=:id',[':id' => $id])
									  ->with('from','to')
									  ->one();
		if($_POST)
		{
			$leaveword->handle_remarks = $_POST['remarks'];
			$leaveword->handle_uid     = \Yii::$app->session['userid'];
			$leaveword->handle_time    = time();
			$leaveword->is_handle      = 1;
			if($leaveword->save())
				echo "<h1>OK</h1>";exit();	
		}
		
		return $this->render('handle', [
			'leaveword' => $leaveword,
		]);
	}

	public function actionAdd()
	{
		$leaveword = new Leaveword;
		if($_POST)
		{
			$leaveword->to_uid     = $_POST['to_uid'];
			$leaveword->content    = $_POST['content'];
			$leaveword->leave_time = time();
			$leaveword->leave_uid  = \Yii::$app->session['userid'];
			if($leaveword->save())
				echo "<h1>留言成功</h1>";exit();
		}
		$admins = Admin::findBySql('SELECT id,username FROM tbl_admin')->asArray()->all();
		$admin_map[0] = '所有人';
		foreach ($admins as $admin) 
		{
			$admin_map[$admin['id']] = $admin['username'];	
		}
		unset($admin_map[\Yii::$app->session['userid']]);
		// var_dump($admin_map);exit();
		return $this->render('add', [
			'admin_map' => $admin_map,
		]);
	}

}
