<?php

namespace backend\controllers;

use Yii;
use common\models\CoachPosts;
use backend\models\Business;
use yii\data\ActiveDataProvider;
use backend\controllers\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * CoachAdminController implements the CRUD actions for CoachPosts model.
 */
class CoachAdminController extends BackendController
{
    public $enableCsrfValidation = false;
    
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CoachPosts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CoachPosts::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTest()
    {
        $post_info = CoachPosts::find()->where('id=:id',[':id' => 4])
                                       ->with(['admin','business'])
                                       ->one();
        var_dump($post_info->business);
        var_dump($post_info->admin);
    }

    public function actionAdmin()
    {
        $posts = CoachPosts::find();
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount'      => $posts->count(),
        ]);
        $posts = $posts->andWhere('is_delete=:d', [':d' => 0])
                       ->offset($pagination->offset)
                       ->limit($pagination->limit)
                       ->with(['business','admin'])
                       ->all();
        return $this->render('admin', [
            'posts'      => $posts,
            'pagination' => $pagination,
        ]);

    }

    /**
     * Displays a single CoachPosts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $post_info = CoachPosts::find()->where('id=:id', [':id' => $id])
                                       ->with(['admin','business'])
                                       ->one();

        return $this->render('view', [
            'post' => $post_info,
        ]);
    }

    /**
     * Creates a new CoachPosts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=0)
    {
        $model = new CoachPosts;

        if($id!=0)
        {
            $model->business_id = $id;
        }

        //TODO::封装成独立函数
        $businesses = [];
        $pending_businesses = Business::find()->where('is_recommend=:r',[':r'=>0])
                                              // ->limit()
                                              ->all();
        foreach($pending_businesses as $business)
        {
          $businesses[$business->id] = $business->business_number;
        }

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
          $model->release_time = time();
          $model->admin_id     = \Yii::$app->session['userid'];
          if($model->save())
          {
            $business = Business::find()->where('id=:id', [':id' => $model->business_id])->one();
            $business->has_post = 1;
            return $this->redirect(['view', 'id' => $model->id]);
          }
        }

        return $this->render('create', [
            'model'      => $model,
            'businesses' => $businesses,
        ]);
    }

    /**
     * Updates an existing CoachPosts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = CoachPosts::find()->where('id=:id',[':id' => $id])
                                   ->with(['admin','business'])
                                   ->one();
        $pending_businesses = Business::find()->where('is_recommend=:r',[':r'=>1])
                                              ->limit(5)
                                              ->all();
        foreach($pending_businesses as $business)
        {
          $businesses[$business->id] = $business->business_number;
        }

       if($model->load(Yii::$app->request->post()) && $model->validate())
        {
          // var_dump(Yii::$app->request->post());exit();
          $model->release_time = time();
          $model->admin_id     = \Yii::$app->session['userid'];
          if($model->save())
          {
             return $this->redirect(['view', 'id' => $model->id]);
          }
        }

        return $this->render('update', [
            'model'      => $model,
            'businesses' => $businesses,
        ]);
    }

    /**
     * Deletes an existing CoachPosts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->is_delete = 1;

        if($model->save())
        {
          return $this->redirect(['admin']);
        }
    }

    /**
     * Finds the CoachPosts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CoachPosts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CoachPosts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
