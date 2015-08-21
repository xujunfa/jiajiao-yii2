<?php

namespace backend\models;

use Yii;
use backend\models\TeacherDetails;
use backend\models\Business;
use common\models\BusinessApplicants;
use backend\models\BusinessRecommend;

/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $sex
 * @property string $strong_subjects
 * @property string $school
 * @property string $campus
 * @property string $gradation
 * @property integer $grade
 * @property string $teach_courses
 * @property string $free_time
 * @property integer $type
 * @property integer $create_time
 * @property integer $last_login_time
 * @property integer $login_times
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['username', 'password', 'email', 'sex', 'strong_subjects', 'school', 'campus', 'gradation', 'grade', 'teach_courses', 'free_time'], 'required'],
            // [['sex', 'grade', 'type', 'create_time', 'last_login_time', 'login_times'], 'integer'],
            // [['username', 'email', 'school', 'campus', 'gradation'], 'string', 'max' => 32],
            // [['password', 'free_time'], 'string', 'max' => 128],
            // [['strong_subjects', 'teach_courses'], 'string', 'max' => 255]
        ];
    }

    public function getBusiness()
    {
        return $this->hasMany(Business::className(), ['id' => 'business_id'])
                    ->viaTable('tbl_business_applicants', ['teacher_id' => 'id']);
    }

    public function getApply()
    {
        return $this->hasOne(BusinessApplicants::className(), ['teacher_id' => 'id']);
    }

    public function getRecommend()
    {
        return $this->hasOne(BusinessRecommend::className(), ['teacher_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'sex' => 'Sex',
            'strong_subjects' => 'Strong Subjects',
            'school' => 'School',
            'campus' => 'Campus',
            'gradation' => 'Gradation',
            'grade' => 'Grade',
            'teach_courses' => 'Teach Courses',
            'free_time' => 'Free Time',
            'type' => 'Type',
            'create_time' => 'Create Time',
            'last_login_time' => 'Last Login Time',
            'login_times' => 'Login Times',
        ];
    }

    public function getDetails()
    {
        return $this->hasOne(TeacherDetails::className(),['uid'=>'id']);
    }
}
