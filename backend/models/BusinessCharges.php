<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%business_charges}}".
 *
 * @property integer $id
 * @property integer $business_id
 * @property string $charges_item
 * @property string $receipt
 * @property string $money
 * @property integer $charges_time
 * @property string $charges_people
 * @property string $charges_remarks
 */
class BusinessCharges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%business_charges}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'charges_item'], 'required'],
            [['business_id', 'charges_time'], 'integer'],
            [['charges_remarks'], 'string'],
            [['charges_item', 'receipt', 'money', 'charges_people'], 'string', 'max' => 255]
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
            'charges_item' => 'Charges Item',
            'receipt' => 'Receipt',
            'money' => 'Money',
            'charges_time' => 'Charges Time',
            'charges_people' => 'Charges People',
            'charges_remarks' => 'Charges Remarks',
        ];
    }
}
