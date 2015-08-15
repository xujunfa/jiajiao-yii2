<?php 

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\LoginForm;
use backend\models\Teacher;

class TeacherController extends Controller
{

	public function actionLogin()
	{
		if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
        	//设置session
        	$teacher = Teacher::find()
        		->where(['username' => $_POST['LoginForm']['username']])
        		->with('details')
        		->one();
        	$session = Yii::$app->session;
        	$session['tid'] 	   = $teacher->id;
        	$session['username']   = $teacher->username;
        	$session['head_image'] = $teacher->details->head_image;

            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
	}

	public function actionRegister()
	{
		$model     = new Teacher;
		$sex_info  = [1 => '男', 2 =>'女' ];
		$gradation = ['本科生' => '本科生', '研究生' => '研究生'];
		$schools   = ['暨南大学' => '暨南大学', '华南师范大学' => '华南师范大学', '中山大学' => '中山大学'];
		$campus    = [];

		if($model->load(Yii::$app->request->post()))
			var_dump($_POST);

		return $this->render('register', [
			'model'     => $model,
			'sex_info'  => $sex_info,  
			'gradation' => $gradation,
			'schools'   => $schools,
			'campus'    => $campus,
		]);
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}

	public function actionCampus()
	{
		if(empty($_POST['school'])) return;
		$campus_map = [
			'暨南大学'     => ['天河校区', '番禺校区'],
			'中山大学'     => ['大学城校区', '越秀校区', '海珠校区'],
			'华南师范大学' => ['天河校区', '大学城校区'],
		];
		$options = '';

		foreach ($campus_map[$_POST['school']] as $campus)
		{
			$options .= "<option value='".$campus."'>$campus</option>";
		}
		echo $options;
	}

}