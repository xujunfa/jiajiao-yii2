<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%business_recommend}}".
 *
 * @property integer $recommend_id
 * @property integer $business_id
 * @property string $teacher_recommend
 * @property string $contact
 * @property integer $recommend_time
 * @property string $recommend_people
 * @property string $recommend_remarks
 * @property string $result
 * @property integer $operator_id
 * @property integer $handle_time
 * @property string $reason
 */
class BusinessRecommend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%business_recommend}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id'], 'required'],
            [['business_id', 'recommend_time', 'operator_id', 'handle_time'], 'integer'],
            [['recommend_remarks', 'reason'], 'string'],
            [['teacher_recommend', 'contact', 'recommend_people', 'result'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recommend_id' => 'Recommend ID',
            'business_id' => 'Business ID',
            'teacher_recommend' => 'Teacher Recommend',
            'contact' => 'Contact',
            'recommend_time' => 'Recommend Time',
            'recommend_people' => 'Recommend People',
            'recommend_remarks' => 'Recommend Remarks',
            'result' => 'Result',
            'operator_id' => 'Operator ID',
            'handle_time' => 'Handle Time',
            'reason' => 'Reason',
        ];
    }
}
