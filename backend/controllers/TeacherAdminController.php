<?php 

namespace backend\controllers;

use Yii;
use backend\controllers\BackendController;
use backend\models\Teacher;
use yii\data\Pagination;

class TeacherAdminController extends BackendController
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
			case 1:
			case 2:
			case 3:
				$teachers = Teacher::find()->where('type=:type',[':type' => $type]);
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

	public function actionView($id)
	{
		$teacher_info = Teacher::find()->where('id=:id',[':id'=>$id])
									   ->with('details')
									   ->one();

		$sex          = $teacher_info->sex==1?'男':'女';
		$pimg         = empty($teacher_info->details->head_image)?'20130830135948.jpg':$teacher_info->details->head_image;
		$free_time    = explode(",", $teacher_info->free_time);
		$exam_score   = explode(',', $teacher_info->details->exam_score);
		$ky_score_arr = explode(',', $teacher_info->details->ky_score);
		$ky_score     = $teacher_info->details->ky_score==',,,'?'无':('数学：'.$ky_score_arr[0].'  英语：'.$ky_score_arr[1].'  综合：'.$ky_score_arr[2].'  其他：'.$ky_score_arr[3]);
		$map_arr      = [1=>'是',0=>'否'];  
		$map_stay     = [0=>'不留校',1=>'暑假留校',2=>'寒假留校',3=>'放假都在学校'];
		$map_type     = [0=>'未认证',1=>'认证教员',2=>'明星教员',3=>'黑名单'];

		// var_dump($teacher_info);exit();

		return $this->render('view',[
			'teacher'      => $teacher_info,
			'sex'          => $sex,
			'pimg'		   => $pimg,   
			'exam_score'   => $exam_score,
			'ky_score_arr' => $ky_score_arr, 
			'ky_score'     => $ky_score,
			'map_arr'      => $map_arr, 
			'map_stay'     => $map_stay, 
			'map_type'     => $map_type,
			'free_time'    => $free_time,
		]);
	}

}