<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%teacher_details}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $head_image
 * @property string $native_place
 * @property string $major_subject
 * @property string $major
 * @property string $college
 * @property string $gpa
 * @property string $phone
 * @property string $qq
 * @property string $exam_score
 * @property string $ky_score
 * @property integer $is_poor
 * @property integer $is_stay
 * @property integer $is_free
 * @property integer $is_apply
 * @property string $require_student
 * @property string $require_wage
 * @property string $require_address
 * @property string $english_lv
 * @property string $teach_origins
 * @property string $languages
 * @property string $skills
 * @property string $character
 * @property string $teach_exprience
 * @property string $prize
 * @property string $introduction
 * @property string $remark
 * @property string $performance
 * @property string $graduate_time
 */
class TeacherDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'head_image', 'native_place', 'major_subject', 'major', 'gpa', 'phone', 'qq', 'exam_score', 'introduction'], 'required'],
            [['uid', 'is_poor', 'is_stay', 'is_free', 'is_apply'], 'integer'],
            [['skills', 'teach_exprience', 'prize', 'introduction', 'remark', 'performance'], 'string'],
            [['head_image'], 'string', 'max' => 250],
            [['native_place', 'major_subject', 'college', 'graduate_time'], 'string', 'max' => 16],
            [['major', 'phone', 'qq', 'english_lv'], 'string', 'max' => 32],
            [['gpa'], 'string', 'max' => 8],
            [['exam_score', 'ky_score'], 'string', 'max' => 64],
            [['require_student', 'require_wage', 'require_address', 'languages', 'character'], 'string', 'max' => 128],
            [['teach_origins'], 'string', 'max' => 255],
            [['uid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'head_image' => 'Head Image',
            'native_place' => 'Native Place',
            'major_subject' => 'Major Subject',
            'major' => 'Major',
            'college' => 'College',
            'gpa' => 'Gpa',
            'phone' => 'Phone',
            'qq' => 'Qq',
            'exam_score' => 'Exam Score',
            'ky_score' => 'Ky Score',
            'is_poor' => 'Is Poor',
            'is_stay' => 'Is Stay',
            'is_free' => 'Is Free',
            'is_apply' => 'Is Apply',
            'require_student' => 'Require Student',
            'require_wage' => 'Require Wage',
            'require_address' => 'Require Address',
            'english_lv' => 'English Lv',
            'teach_origins' => 'Teach Origins',
            'languages' => 'Languages',
            'skills' => 'Skills',
            'character' => 'Character',
            'teach_exprience' => 'Teach Exprience',
            'prize' => 'Prize',
            'introduction' => 'Introduction',
            'remark' => 'Remark',
            'performance' => 'Performance',
            'graduate_time' => 'Graduate Time',
        ];
    }
}
