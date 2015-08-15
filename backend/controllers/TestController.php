<?php 

namespace backend\controllers;

use yii\base\Controller;
use backend\models\Teacher;
use backend\models\TeacherOld;
use backend\models\TeacherDetails;

class TestController extends Controller 
{

	public function actionModify1()
	{
		exit();

		$teacher_type = ['未认证'=>0,'认证教员'=>1,'明星教员'=>2,'黑名单'=>3];

		$old_teachers = TeacherOld::find()->all();
		// var_dump($old_teacher);exit();

		$i = 0;
		foreach($old_teachers as $old_teacher)
		{
			$new_teacher = new Teacher();

			$school_info = explode('-', $old_teacher->xuexiao);
			// var_dump($school_info);
			$grade_info  = explode('-', $old_teacher->xueli);
			// var_dump(substr($old_teacher->nianji, 0, 2));
			$free_time_arr = [$old_teacher->a1,$old_teacher->a2,$old_teacher->a3,$old_teacher->a4,$old_teacher->a5,$old_teacher->a6,$old_teacher->a7,
							  $old_teacher->b1,$old_teacher->b2,$old_teacher->b3,$old_teacher->b4,$old_teacher->b5,$old_teacher->b6,$old_teacher->b7,
							  $old_teacher->c1,$old_teacher->c2,$old_teacher->c3,$old_teacher->c4,$old_teacher->c5,$old_teacher->c6,$old_teacher->c7];
			$free_time = implode(",", $free_time_arr);
			// var_dump($free_time);
			
			// var_dump($teacher_type[$old_teacher->type]);

			$new_teacher->id = $old_teacher->id;    
			$new_teacher->username = $old_teacher->username;
			$new_teacher->password = $old_teacher->password;
			$new_teacher->email = $old_teacher->email;
			$new_teacher->sex = $old_teacher->xingbie=='女 '?2:1;
			$new_teacher->strong_subjects = $old_teacher->sanchang;
			$new_teacher->school = $school_info[0];
			$new_teacher->campus = $school_info[1];
			$new_teacher->gradation = $grade_info[0];
			$new_teacher->grade = substr($old_teacher->nianji, 0, 2);
			$new_teacher->teach_courses = $old_teacher->jiaoshoukc;
			$new_teacher->free_time = $free_time;
			$new_teacher->type = $teacher_type[$old_teacher->type];

			if($new_teacher->save(false))
			{
				$i++;
				echo "<h1>Save successfully$i</h1>";
			}
		}

		echo "<h1>Modify Successfully!!!!!!!!!!!!</h1>";

		// var_dump($old_teacher);
		// if($old_teacher->xingbie=="女") echo "ok....../n"; 
		// var_dump($new_teacher->sex);
	}

	public function actionModify2()
	{
		exit();

		$stay_type  = ['不留校'=>0,'暑假留校'=>1,'寒假留校'=>2,'放假都在学校'=>3];
		$free_type  = ['暂时没时间'=>0,'有时间'=>1];
		$apply_type = ['暂时不需要'=>0,'是'=>1];

		$old_teachers = TeacherOld::find()->all();
		// var_dump($old_teacher);exit();

		$i = 0;
		foreach($old_teachers as $old_teacher)
		{

			// $old_teacher = TeacherOld::find()->one();
			// var_dump($old_teacher);
			$exam_score_arr = [$old_teacher->gk_zong,$old_teacher->gk_yuwen,$old_teacher->gk_sushu,$old_teacher->gk_yingyu,$old_teacher->gk_zonghe];
			$exam_score     = implode(",", $exam_score_arr);
			// var_dump($exam_score);exit(); 
			$ky_score_arr = [$old_teacher->jy_sushu,$old_teacher->jy_yingyu,$old_teacher->jy_zong,$old_teacher->jy_qita];
			$ky_score     = implode(",", $ky_score_arr);
			// var_dump($ky_score);exit();

			$new_teacher = new TeacherDetails();
			$new_teacher->uid = $old_teacher->id;
			$new_teacher->head_image = $old_teacher->pimg;
			$new_teacher->native_place = $old_teacher->jiguan;
			$new_teacher->major_subject = $old_teacher->gaozhongzk;
			$new_teacher->major = $old_teacher->zuanye;
			$new_teacher->college = $old_teacher->xueyuan;
			$new_teacher->gpa = $old_teacher->pingjun;
			$new_teacher->phone = $old_teacher->phone;
			$new_teacher->qq = $old_teacher->qq;
			$new_teacher->exam_score = $exam_score;
			$new_teacher->ky_score = $ky_score;
			$new_teacher->is_poor = $old_teacher->pingkun=='是'?1:0;
			$new_teacher->is_stay = $stay_type[$old_teacher->liuxiao];
			$new_teacher->is_free = $free_type[$old_teacher->time1];
			$new_teacher->is_apply = $apply_type[$old_teacher->time2];
			$new_teacher->require_student = $old_teacher->jj_duixiang;
			$new_teacher->require_wage = $old_teacher->jj_shixing;
			$new_teacher->require_address = $old_teacher->jj_dizhi;
			$new_teacher->english_lv = $old_teacher->yingyu;
			$new_teacher->teach_origins = $old_teacher->jiaoshoudq;
			$new_teacher->languages = $old_teacher->yuyan;
			$new_teacher->skills = $old_teacher->jinneng;
			$new_teacher->character = $old_teacher->xingge;
			$new_teacher->teach_exprience = $old_teacher->jj_jingyan;
			$new_teacher->prize = $old_teacher->zhenshu;
			$new_teacher->introduction = $old_teacher->jieshao;
			$new_teacher->remark = $old_teacher->beizu;
			$new_teacher->performance = $old_teacher->content;
			$new_teacher->graduate_time = $old_teacher->graduation_time;

			if($new_teacher->save(false))
			{
				$i++;
				echo "<h1>Save successfully$i</h1>";
			}
		}

		echo "<h1>Modify Successfully!!!!!!!!!!!! $i</h1>";
		// var_dump($new_teacher);
	}

	public function actionDb()
	{
		$teacher = Teacher::find()->where(['id'=>80])->with('details')->one();
		var_dump($teacher->details);
	}

}