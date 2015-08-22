<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%leaveword}}".
 *
 * @property string $id
 * @property string $to_uid
 * @property string $content
 * @property string $leave_time
 * @property string $leave_uid
 * @property string $is_handle
 * @property string $handle_id
 * @property string $handle_time
 * @property string $handle_remarks
 */
class Leaveword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%leaveword}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['content', 'leave_uid'], 'required'],
            // [['content', 'handle_remarks'], 'string'],
            // [['handle_time'], 'integer'],
            // [['to_uid', 'leave_uid', 'is_handle'], 'string', 'max' => 50],
            // [['leave_time'], 'string', 'max' => 30],
            // [['handle_uid'], 'string', 'max' => 60]
        ];
    }

    public function getFrom()
    {
        return $this->hasOne(Admin::className(), ['id' => 'leave_uid']);
    }

    public function getTo()
    {
        return $this->hasOne(Admin::className(), ['id' => 'to_uid']);
    }

    public function getHandler()
    {
        return $this->hasOne(Admin::className(), ['id' => 'handle_uid']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'to_uid' => 'To Uid',
            'content' => 'Content',
            'leave_time' => 'Leave Time',
            'leave_uid' => 'Leave Uid',
            'is_handle' => 'Is Handle',
            'handle_id' => 'Handle ID',
            'handle_time' => 'Handle Time',
            'handle_remarks' => 'Handle Remarks',
        ];
    }
}
