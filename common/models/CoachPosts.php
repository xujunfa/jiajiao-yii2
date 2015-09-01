<?php

namespace common\models;

use Yii;
use backend\models\Admin;
use backend\models\Business;

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
            [['business_id'], 'required'],
            // [['admin_id', 'business_id', 'student_situation', 'coach_content', 'coach_time', 'coach_address', 'coach_demand', 'coach_wage'], 'required'],
            // [['admin_id', 'business_id', 'limit_applicants', 'is_display', 'is_delete'], 'integer'],
            // [['student_situation', 'coach_content', 'coach_time', 'coach_address', 'coach_wage', 'limit_time'], 'string', 'max' => 128],
            // [['coach_demand'], 'string', 'max' => 255],
            // [['release_time'], 'string', 'max' => 64]
        ];
    }

    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
    }

    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['id' => 'business_id'])
                    ->with('applicants');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '文章标题',
            'admin_id' => '发布人',
            'business_id' => '对应业务',
            'student_situation' => '学生情况',
            'coach_content' => '家教内容',
            'coach_time' => '家教时间',
            'coach_address' => '家教地址',
            'coach_demand' => '家教要求',
            'coach_wage' => '家教报酬',
            'limit_time' => '报名时间限制',
            'limit_applicants' => '报名人数限制',
            'release_time' => '发布时间',
            'is_display' => '是否显示',
            'is_delete' => '是否删除',
        ];
    }
}
