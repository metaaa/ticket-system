<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property int $id
 * @property int $room
 * @property string $status
 * @property int $reporterId
 * @property int $suspectId
 * @property int $calmDown
 * @property string $comment
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room', 'status', 'reporterId'], 'required'],
            [['room', 'reporterId', 'suspectId', 'calmDown'], 'integer'],
            [['status', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room' => 'Room',
            'status' => 'Status',
            'reporterId' => 'Reporter ID',
            'suspectId' => 'Suspect ID',
            'calmDown' => 'Calm Down',
            'comment' => 'Comment',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReportQuery(get_called_class());
    }
}
