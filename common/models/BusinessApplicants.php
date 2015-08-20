<?php

namespace common\models;

use Yii;
use backend\models\Business;
use backend\models\Teacher;
use backend\models\Admin;

/**
 * This is the model class for table "{{%business_applicants}}".
 *
 * @property integer $id
 * @property integer $business_id
 * @property integer $teacher_id
 * @property string $apply_time
 * @property integer $is_recommend
 * @property integer $admin_id
 */
class BusinessApplicants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%business_applicants}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'teacher_id', 'apply_time'], 'required'],
            [['business_id', 'teacher_id', 'is_recommend', 'admin_id'], 'integer'],
            [['apply_time'], 'string', 'max' => 32]
        ];
    }

    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['id' => 'business_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'business_id' => 'Business ID',
            'teacher_id' => 'Teacher ID',
            'apply_time' => 'Apply Time',
            'is_recommend' => 'Is Recommend',
            'admin_id' => 'Admin ID',
        ];
    }
}
