<?php

namespace backend\controllers;

use Yii;
use common\models\CoachPosts;
use backend\models\Business;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CoachAdminController implements the CRUD actions for CoachPosts model.
 */
class CoachAdminController extends Controller
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

    /**
     * Displays a single CoachPosts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $post_info = CoachPosts::find()->where('id=:id',[':id' => $id])
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
    public function actionCreate()
    {
        $model = new CoachPosts();

        //TODO::封装成独立函数
        $pending_businesses = Business::find()->where('is_recommend=:r',[':r'=>1])
                                              ->limit(5)
                                              ->all();
        // foreach ($pending_businesses as $business) 
        // {
        //     echo $business->id."---".$business->business_number."<br>";
        // }

        // $_POST['CoachPosts'] = [
        //     'admin_id'          => \Yii::$app->session['userid'], 
        //     'business_id'       => $_POST['business_id'],
        //     'student_situation' => $_POST['student_situation'],
        //     'coach_content'     => $_POST['coach_content'],
        //     'coach_time'        => $_POST['coach_time'],
        //     'coach_address'     => $_POST['coach_address'],
        //     'coach_demand'      => $_POST['coach_demand'],
        //     'coach_wage'        => $_POST['coach_wage'],
        //     'limit_time'        => $_POST['limit_time'],
        //     'limit_applicants'  => $_POST['limit_applicants'],
        //     'release_time'      => time(),
        // ];

        $model->admin_id          = \Yii::$app->session['userid']; 
        $model->business_id       = $_POST['business_id'];
        $model->title             = $_POST['title']; 
        $model->student_situation = $_POST['student_situation'];
        $model->coach_content     = $_POST['coach_content'];
        $model->coach_time        = $_POST['coach_time'];
        $model->coach_address     = $_POST['coach_address'];
        $model->coach_demand      = $_POST['coach_demand'];
        $model->coach_wage        = $_POST['coach_wage'];
        $model->limit_time        = $_POST['limit_time'];
        $model->limit_applicants  = $_POST['limit_applicants'];
        $model->release_time      = time();
  
        if(isset($_POST))
        {
            // $model->load(Yii::$app->request->post());
            // $model->admin_id = 123;
            // var_dump($_POST);
            // var_dump($model);
            // var_dump($model->save());
        }
        // exit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'      => $model,
                'businesses' => $pending_businesses,
            ]);
        }
    }

    /**
     * Updates an existing CoachPosts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $post_info = CoachPosts::find()->where('id=:id',[':id' => $id])
                                       ->with(['admin','business'])
                                       ->one();
        $pending_businesses = Business::find()->where('is_recommend=:r',[':r'=>1])
                                              ->limit(5)
                                              ->all();

        if(!empty($_POST))
        {
            $post_info->admin_id          = \Yii::$app->session['userid']; 
            $post_info->business_id       = $_POST['business_id'];
            $post_info->title             = $_POST['title']; 
            $post_info->student_situation = $_POST['student_situation'];
            $post_info->coach_content     = $_POST['coach_content'];
            $post_info->coach_time        = $_POST['coach_time'];
            $post_info->coach_address     = $_POST['coach_address'];
            $post_info->coach_demand      = $_POST['coach_demand'];
            $post_info->coach_wage        = $_POST['coach_wage'];
            $post_info->limit_time        = $_POST['limit_time'];
            $post_info->limit_applicants  = $_POST['limit_applicants'];
            $post_info->release_time      = time();
        }
        // var_dump($post_info);exit();

        if ($post_info->save()) {
           return $this->redirect(['view', 'id' => $post_info->id]);
        } else {
            return $this->render('update', [
                'post' => $post_info,
                'businesses' => $pending_businesses,
            ]);
        }
    }

    /**
     * Deletes an existing CoachPosts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
