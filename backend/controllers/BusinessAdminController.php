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
		$businesses = Business::find()->where('is_delete=:d', ['d' => 0]);
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

	public function actionPending()
	{
		$pending_businesses = Business::find()->where('is_recommend=:r', [':r' => 0]);
		$pagination = new Pagination([
			'defaultPageSize' => 7,
			'totalCount'      => $pending_businesses->count(),
		]);
		$pending_businesses = $pending_businesses->offset($pagination->offset)
							     				 ->limit($pagination->limit)
							     				 ->with(['charges', 'applicants', 'admin', 'post'])
							     				 ->orderBy(['id'=>SORT_DESC])
							     				 ->all();
		return $this->render('pending', [
			'businesses' => $pending_businesses,
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
					\Yii::$app->getSession()->setFlash('success', '推荐成功！^_^');
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
				\Yii::$app->getSession()->setFlash('success', '提交成功！^_^');
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
		$model = new Business;
		$defalt_number = 'J'.date('ymd',time());
		if($model->load(\Yii::$app->request->post()) && $model->validate())
		{
			$model->admin_id        = \Yii::$app->session['userid'];
			$model->registered_time = time();
			if($model->save())
			{
				\Yii::$app->getSession()->setFlash('success', '已登记业务表！^_^');
				$this->redirect(['business-admin/view', 'id' => $model->id]);
			}
			// var_dump($business);exit();
		}
		return $this->render('create', [
			'model' => $model,
			'business_number' => $defalt_number,
		]);
	}

	public function actionUpdate($id)
	{
		$model = Business::find()->where('id=:id',[':id' => $id])
								 ->with(['charges', 'applicants', 'admin'])
								 ->one();
		if($model->load(\Yii::$app->request->post()) && $model->validate())
		{
			if($model->save())
			{
				\Yii::$app->getSession()->setFlash('success', '已更新业务表信息！^_^');
				$this->redirect(['business-admin/view', 'id' => $model->id]);
			}
		}

		return $this->render('update', [
			'model'           => $model,
			'business_number' => $defalt_number,
		]);
	}

	public function actionDelete($id)
	{
		$model = $this->findModel($id);

        $model->is_delete = 1;

        if($model->save())
        {
          \Yii::$app->getSession()->setFlash('success', '已删除业务表'.$model->business_number.'！^_^');
          return $this->redirect(['index']);
        }
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

	protected function findModel($id)
    {
        if (($model = Business::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}