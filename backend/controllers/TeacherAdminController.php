<?php 

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Teacher;
use yii\data\Pagination;

class TeacherAdminController extends Controller
{

	public $layout = 'admin';

	public function actionIndex()
	{
		$teachers = Teacher::find();
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount'      => $teachers->count(),
		]);
		$teachers = $teachers->offset($pagination->offset)
							 ->limit($pagination->limit)
							 ->with('details')
							 ->all();
		return $this->render('index', [
			'teachers'   => $teachers,
			'pagination' => $pagination,
		]);
	}

}