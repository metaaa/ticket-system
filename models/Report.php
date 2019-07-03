<?php

namespace app\models;

use Yii;
use Exception;

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
 * @property int $reported
 */
class Report extends \yii\db\ActiveRecord
{

    const MAX_REPORT = 4;

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
            [['room', 'reporterId', 'suspectId', 'calmDown', 'reported'], 'integer'],
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
            'reported' => 'Reported',
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

    /**
     * Queries the records 'reported' value
     *
     * @param $reported
     * @return Report|null
     */
    public static function countReported($reported)
    {
        return static::findOne(['reported' => $reported]);
    }

    /**
     * Checks whether the number of reports for the record reached the treshold or not
     *
     * @return bool
     */
    public function isMaxTimesReported()
    {
        return $this->reported === self::MAX_REPORT;
    }

    /**
     * If the reports for the record hasn't reached the limit, increment the value of 'reported'
     *
     * @return $this
     * @throws Exception
     * @throws \Throwable
     */
    public function incrementReportNr()
    {
        try {
            $this->reported++;
            $this->save();
        } catch (Exception $e) {
            Yii::error($e->getMessage() . '\n' . yii\helpers\VarDumper::dumpAsString($this));
            throw new Exception('Failed to save ' . self::class);
        }

        return $this;
    }

    /**
     * Deletes a single record
     *
     * @return false|int|void
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function delete()
    {
        $result = parent::delete();
        if ($result === false) {
            throw new Exception('Failed to delete ' . self::class . '!');
        }
    }

    /**
     * Saves a single record
     *
     * @param bool $runValidation
     * @param null $attributeNames
     * @return bool|void
     * @throws Exception
     * @throws \Throwable
     */
    public function save($runValidation = true, $attributeNames = NULL)
    {
        $result = parent::save();
        if ($result === false) {
            throw new Exception('Failed to delete ' . self::class . '!');
        }

    }

    /**
     * If the value of 'reported' hasn't reached the limit increments it's value by 1, otherwise deletes the record
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function handleReport()
    {
        if (!$this->isMaxTimesReported()) {
            $this->incrementReportNr();
        } else {
            $this->delete();
		}
        return true;
    }

    /**
     * Checks whether the record is going to be a new one or it's just gonna be updated
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if ($this->getIsNewRecord()) {
            $this->reporterId = Yii::$app->getUser()->id;
        }

        return parent::beforeSave($insert);
    }
}
