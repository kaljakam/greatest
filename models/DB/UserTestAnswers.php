<?php

namespace app\models\DB;

use Yii;

/**
 * This is the model class for table "user_test_answers".
 *
 * @property integer $id
 * @property integer $user_test_id
 * @property integer $test_question_id
 * @property integer $test_answer_id
 * @property integer $is_correct
 * @property string $created
 * @property string $updated
 *
 * @property TestAnswer $testAnswer
 * @property TestQuestion $testQuestion
 * @property UserTest $userTest
 */
class UserTestAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_test_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_test_id', 'test_question_id', 'test_answer_id', 'is_correct'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['test_answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestAnswer::className(), 'targetAttribute' => ['test_answer_id' => 'id']],
            [['test_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestQuestion::className(), 'targetAttribute' => ['test_question_id' => 'id']],
            [['user_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserTest::className(), 'targetAttribute' => ['user_test_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_test_id' => 'User Test ID',
            'test_question_id' => 'Test Question ID',
            'test_answer_id' => 'Test Answer ID',
            'is_correct' => 'Is Correct',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestAnswer()
    {
        return $this->hasOne(TestAnswer::className(), ['id' => 'test_answer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestQuestion()
    {
        return $this->hasOne(TestQuestion::className(), ['id' => 'test_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTest()
    {
        return $this->hasOne(UserTest::className(), ['id' => 'user_test_id']);
    }
}
