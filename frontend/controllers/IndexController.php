<?php 

namespace frontend\controllers;

use frontend\controllers\FrontendController;
use common\models\CoachPosts;

class IndexController extends FrontendController
{

	public $layout = 'frontend';

	public function actionIndex()
	{
		$posts = CoachPosts::find()->orderBy(['id' => SORT_DESC])
								   ->all();
		return $this->render('index');
	}

}