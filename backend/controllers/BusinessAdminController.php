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

}