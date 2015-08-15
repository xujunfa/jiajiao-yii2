<?php 

namespace console\controllers;

use yii\console\Controller;
use backend\models\Teacher;
use backend\models\TeacherOld;
use backend\models\TeacherDetails;

class DbController extends Controller
{

	public function actionModify()
	{
		$teacher = TeacherOld::findOne('100');
		var_dump($teacher);
	}

}