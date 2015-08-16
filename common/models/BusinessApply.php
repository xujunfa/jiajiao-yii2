<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%business_apply}}".
 *
 * @property integer $id
 * @property integer $business_id
 * @property string $teacher_id
 * @property string $search_people
 * @property string $apply_time
 * @property string $search_remarks
 */
class BusinessApply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%business_apply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'teacher_id', 'apply_time'], 'required'],
            [['business_id'], 'integer'],
            [['search_remarks'], 'string'],
            [['teacher_id', 'search_people'], 'string', 'max' => 255],
            [['apply_time'], 'string', 'max' => 20]
        ];
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
            'search_people' => 'Search People',
            'apply_time' => 'Apply Time',
            'search_remarks' => 'Search Remarks',
        ];
    }
}
