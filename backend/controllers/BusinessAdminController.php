<?php 

namespace backend\controllers;

use backend\controllers\BackendController;
use backend\models\Business;
use backend\models\BusinessCharges;
use backend\models\BusinessRecommend;
use yii\data\Pagination;
use backend\models\Teacher;

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
		// var_dump($_POST);exit();
		if($_POST['type'] == 'recommend')
		{
			$teacher = Teacher::find()->where('id=:id',[':id' => $_POST['teacher_id']])
									  ->with('details')
									  ->one();
			if(!empty($teacher))
			{
				$recommend = new BusinessRecommend;
				$recommend->business_id       = $id;
				$recommend->teacher_id        = $teacher->id;
				$recommend->contact           = $teacher->details->phone;
				$recommend->recommend_time    = time();
				$recommend->recommend_people  = \Yii::$app->session['userid'];
				$recommend->recommend_remarks = $_POST['recommend_remarks'];
				$recommend->result            = '已推荐';
				if($recommend->save())
				{
					\Yii::$app->getSession()->setFlash('success', '推荐成功');
				}
			}
		}
		if($_POST['type'] == 'charge')
		{
			$charge = new BusinessCharges;
			$charge->business_id     = $id;
			$charge->charges_item    = $_POST['charges_item'];
			$charge->receipt         = $_POST['receipt'];
			$charge->money           = $_POST['money'];
			$charge->charges_time    = time();
			$charge->charges_people  = $_POST['charges_people'];
			$charge->charges_remarks = $_POST['charges_remarks'];
			if($charge->save())
			{
				\Yii::$app->getSession()->setFlash('success', '提交成功');
			}
		}

		$business_info = Business::find()->where('id=:id',[':id' => $id])
										 ->with(['charges', 'applicants', 'admin'])
							     		 ->one();
		return $this->render('view', [
			'business' => $business_info,
		]);
	}

	public function actionCreate()
	{
		$defalt_number = 'J'.date('ymd',time());
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
		return $this->render('create', [
			'business_number' => $defalt_number,
		]);
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

	public function actionTest()
	{
		\Yii::$app->getSession()->setFlash('success', '成功');
		// $this->refresh();
		// $falshes = \Yii::$app->getSession()->getAllFlashes();
		// var_dump($falshes);
		$flash = \Yii::$app->getSession()->hasFlash('success');
		var_dump($flash);
	}

}