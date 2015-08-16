<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_coach_posts".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property integer $business_id
 * @property string $student_situation
 * @property string $coach_content
 * @property string $coach_time
 * @property string $coach_address
 * @property string $coach_demand
 * @property string $coach_wage
 * @property string $limit_time
 * @property integer $limit_applicants
 * @property string $release_time
 * @property integer $is_display
 * @property integer $is_delete
 */
class CoachPosts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_coach_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'business_id', 'student_situation', 'coach_content', 'coach_time', 'coach_address', 'coach_demand', 'coach_wage'], 'required'],
            [['admin_id', 'business_id', 'limit_applicants', 'is_display', 'is_delete'], 'integer'],
            [['student_situation', 'coach_content', 'coach_time', 'coach_address', 'coach_wage', 'limit_time'], 'string', 'max' => 128],
            [['coach_demand'], 'string', 'max' => 255],
            [['release_time'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'business_id' => 'Business ID',
            'student_situation' => 'Student Situation',
            'coach_content' => 'Coach Content',
            'coach_time' => 'Coach Time',
            'coach_address' => 'Coach Address',
            'coach_demand' => 'Coach Demand',
            'coach_wage' => 'Coach Wage',
            'limit_time' => 'Limit Time',
            'limit_applicants' => 'Limit Applicants',
            'release_time' => 'Release Time',
            'is_display' => 'Is Display',
            'is_delete' => 'Is Delete',
        ];
    }
}
