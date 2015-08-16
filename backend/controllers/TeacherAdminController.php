<?php 

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Teacher;
use yii\data\Pagination;

class TeacherAdminController extends Controller
{

	public $layout = 'admin';

	public function actionIndex($type=4,$sort=false)
	{
		switch ($type) 
		{
			case 4:
				$teachers = Teacher::find();
				break;
			case 0:
				$teachers = Teacher::find()->where(['type' => 0]);
				break;
			case 1:
				$teachers = Teacher::find()->where(['type' => 1]);
				break;
			case 2:
				$teachers = Teacher::find()->where(['type' => 2]);
				break;
			case 3:
				$teachers = Teacher::find()->where(['type' => 3]);
				break;
		}
		if($sort){
			$teachers = $teachers->orderBy($sort);
		}
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount'      => $teachers->count(),
		]);
		$teachers = $teachers->offset($pagination->offset)
							 ->limit($pagination->limit)
							 ->with('details')
							 ->all();
		return $this->render('index', [
			'teachers'     => $teachers,
			'pagination'   => $pagination,
			'teacher_type' => $type,
		]);
	}

}