<?php 

namespace backend\controllers;

use backend\controllers\BackendController;
use backend\models\Business;
use backend\models\BusinessCharges;
use backend\models\Recommend;
use yii\data\Pagination;

class BusinessAdminController extends BackendController
{
	public $layout = 'admin';

	public function actionIndex()
	{
		$businesses = Business::find();
		$pagination = new Pagination([
			'defaultPageSize' => 7,
			'totalCount'      => $businesses->count(),
		]);
		$businesses = $businesses->offset($pagination->offset)
							     ->limit($pagination->limit)
							     ->with(['charges', 'applicants', 'admin', 'post'])
							     ->orderBy(['id'=>SORT_DESC])
							     ->all();
		// var_dump($businesses[0]);
		return $this->render('index', [
			'businesses' => $businesses,
			'pagination' => $pagination,
		]);
	}

	public function actionView($id)
	{
		$business_info = Business::find()->where('id=:id',[':id' => $id])
										 ->with(['charges', 'applicants', 'admin'])
							     		 ->one();
		return $this->render('view', [
			'business' => $business_info,
		]);
	}

	public function actionCreate()
	{
		if($_POST)
		{
			$business = new Business;
			$business->business_number   = $_POST['business_number'];
			$business->customer_name     = $_POST['customer_name'];
			$business->last_time         = $_POST['last_time'];
			$business->phone             = $_POST['phone'];
			$business->telephone 	     = $_POST['telephone'];
			$business->student_message   = $_POST['student_message'];
			$business->coach_time        = $_POST['coach_time'];
			$business->student_situation = $_POST['student_situation'];
			$business->requirement       = $_POST['requirement'];
			$business->address           = $_POST['address'];
			$business->traffic           = $_POST['traffic'];
			$business->reward            = $_POST['reward'];
			$business->remarks           = $_POST['remarks'];
			$business->admin_id          = \Yii::$app->session['userid'];
			$business->registered_time   = time();
			var_dump($business->save());
			if($business->save())
			{
				$this->redirect(['business-admin/index']);
			}
			// var_dump($business);exit();
		}
		return $this->render('create');
	}

	public function actionUpdate($id)
	{
		$business = Business::find()->where('id=:id',[':id' => $id])
									->with(['charges', 'applicants', 'admin'])
									->one();
		if($_POST)
		{
			$business->business_number   = $_POST['business_number'];
			$business->customer_name     = $_POST['customer_name'];
			$business->last_time         = $_POST['last_time'];
			$business->phone             = $_POST['phone'];
			$business->telephone 	     = $_POST['telephone'];
			$business->student_message   = $_POST['student_message'];
			$business->coach_time        = $_POST['coach_time'];
			$business->student_situation = $_POST['student_situation'];
			$business->requirement       = $_POST['requirement'];
			$business->address           = $_POST['address'];
			$business->traffic           = $_POST['traffic'];
			$business->reward            = $_POST['reward'];
			$business->remarks           = $_POST['remarks'];
			$business->admin_id          = \Yii::$app->session['userid'];
			$business->registered_time   = time();
			var_dump($business->save());
			if($business->save())
			{
				$this->redirect(['business-admin/index']);
			}
			// var_dump($business);exit();
		}
		return $this->render('update', [
			'business' => $business,
		]);
	}

}