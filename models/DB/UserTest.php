<?php

namespace app\models\DB;

use Yii;

/**
 * This is the model class for table "user_test".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $test_id
 * @property string $test_date
 * @property string $created
 * @property string $updated
 *
 * @property Test $test
 * @property User $user
 * @property UserTestAnswers[] $userTestAnswers
 */
class UserTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'test_id'], 'integer'],
            [['test_date', 'created', 'updated'], 'safe'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'test_id' => 'Test ID',
            'test_date' => 'Test Date',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTestAnswers()
    {
        return $this->hasMany(UserTestAnswers::className(), ['user_test_id' => 'id']);
    }
}
