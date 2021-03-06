<?php 

namespace console\controllers;

use yii\console\Controller;
use common\models\User;

class InitController extends Controller
{

	public function actionUser()
	{
		echo "Create init user...\n";
		$username   = $this->prompt('Input UserName: ');
		$email      = $this->prompt("Input Email for $username: ");
		$password   = $this->prompt("Input Password for $username: ");
		$realname   = $this->prompt("Input RealName for $username: ");
		$head_image = $username.'.jpg';

		$model = new User();
		$model->username   = $username;
		$model->email      = $email;
		$model->password   = $password;
		$model->realname   = $realname;
		$model->head_image = $head_image;

		if(!$model->save())
		{
			foreach($model->getErrors() as $errors)
			{
				foreach($errors as $e)
				{
					echo "$e\n";
				}
			}
		}else{
			echo "You have created a user successfully!";
		}
	}

}