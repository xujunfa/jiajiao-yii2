<?php 

namespace backend\controllers;

use backend\models\Leaveword;
use backend\controllers\BackendController;
use yii\data\Pagination;
use backend\models\Admin;

class LeavewordAdminController extends BackendController
{

	public $layout = 'admin';

	public function actionIndex()
	{
		$leavewords = Leaveword::find();
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount'      => $leavewords->count(),
		]);
		$leavewords = $leavewords->offset($pagination->offset)
								 ->limit($pagination->limit)
								 ->with(['from','to','handler'])
								 ->orderBy(['leave_time'=>SORT_DESC])
								 ->all();
		$colors = ['green','blue','yellow','red'];
		// echo rand(0,3);exit();
		// var_dump($leavewords);exit();	
		return $this->render('index', [
			'leavewords' => $leavewords,
			'pagination' => $pagination,	
			'colors'     => $colors,
		]);
	}

	public function actionHandle($id)
	{
		$model = Leaveword::find()->where('id=:id',[':id' => $id])
									  ->with('from','to')
									  ->one();
		if($model->load(\Yii::$app->request->post()))
		{
			$model->handle_uid     = \Yii::$app->session['userid'];
			$model->handle_time    = time();
			$model->is_handle      = 1;
			if($model->validate() && $model->save())
			{
				\Yii::$app->getSession()->setFlash('success', '处理成功！^_^');
				$this->redirect(['leaveword-admin/index']);
			}
		}
		
		return $this->render('handle', [
			'model' => $model,
		]);
	}

	public function actionAdd()
	{
		$model = new Leaveword;
		if($model->load(\Yii::$app->request->post()))
		{
			$model->leave_time = time();
			$model->leave_uid  = \Yii::$app->session['userid'];
			if($model->validate() && $model->save())
			{
				\Yii::$app->getSession()->setFlash('success', '留言成功！^_^');
				$this->redirect(['leaveword-admin/index']);
			}
		}
		$admins = Admin::findBySql('SELECT id,username FROM tbl_admin')->asArray()->all();
		$admin_map[0] = '所有人';
		foreach ($admins as $admin) 
		{
			$admin_map[$admin['id']] = $admin['username'];	
		}
		unset($admin_map[\Yii::$app->session['userid']]);
		// var_dump($admin_map);exit();
		return $this->render('add', [
			'model'     => $model,
			'admin_map' => $admin_map,
		]);
	}

	public function actionDelete($id)
	{
		$leaveword = $this->findModel($id);
		if($leaveword->delete())
		{
			\Yii::$app->getSession()->setFlash('success', '留言已删除！^_^');
		}else{
			\Yii::$app->getSession()->setFlash('error', '留言删除失败！~(>_<)~');
		}
		$this->redirect(['index']);
	}

	protected function findModel($id)
    {
        if (($model = Leaveword::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
