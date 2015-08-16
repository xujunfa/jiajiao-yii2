<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%business}}".
 *
 * @property string $id
 * @property string $bussiness_number
 * @property string $customer_name
 * @property string $last_time
 * @property string $phone
 * @property string $telephone
 * @property string $student_message
 * @property string $coach_time
 * @property string $student_situation
 * @property string $requirement
 * @property string $area
 * @property string $street
 * @property string $address
 * @property string $traffic
 * @property string $reward
 * @property string $remarks
 * @property string $registered_person
 * @property integer $registered_time
 * @property integer $is_recommend
 */
class Business extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%business}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_situation', 'remarks'], 'string'],
            [['registered_time'], 'required'],
            [['registered_time', 'is_recommend'], 'integer'],
            [['bussiness_number', 'customer_name', 'last_time', 'phone', 'student_message', 'coach_time', 'requirement', 'area', 'street', 'address', 'traffic', 'reward', 'registered_person'], 'string', 'max' => 255],
            [['telephone'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bussiness_number' => 'Bussiness Number',
            'customer_name' => 'Customer Name',
            'last_time' => 'Last Time',
            'phone' => 'Phone',
            'telephone' => 'Telephone',
            'student_message' => 'Student Message',
            'coach_time' => 'Coach Time',
            'student_situation' => 'Student Situation',
            'requirement' => 'Requirement',
            'area' => 'Area',
            'street' => 'Street',
            'address' => 'Address',
            'traffic' => 'Traffic',
            'reward' => 'Reward',
            'remarks' => 'Remarks',
            'registered_person' => 'Registered Person',
            'registered_time' => 'Registered Time',
            'is_recommend' => 'Is Recommend',
        ];
    }
}
