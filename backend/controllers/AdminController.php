<?php 

namespace backend\controllers;

use Yii;
use backend\controllers\BackendController;
use backend\models\LoginForm;
use backend\models\Admin;

class AdminController extends BackendController
{
    
    public $layout = 'admin';

    public function Init()
    {

    }

    public function actionIndex()
    {
        return $this->render('admin'); 
    }

	public function actionLogin()
	{
		if (!\Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            $user = Admin::find()
                ->where(['username' => $_POST['LoginForm']['username']])
                ->one(); 
            //设置session
            $session = Yii::$app->session;
            $session['userid']     = $user->id;
            $session['username']   = $user->username;
            $session['head_image'] = $user->head_image;

            return $this->redirect(['/admin/index']);
        } else {
            return $this->renderPartial('login', [
                'model'      => $model,
                'assets_url' => $this->assets_url,
            ]);
        }
	}

    public function actionLogout()
    {
        Yii::$app->user->Logout();

        return $this->redirect(['admin/login']);
    }

}