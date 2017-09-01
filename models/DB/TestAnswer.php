<?php

namespace app\models\DB;

use Yii;

/**
 * This is the model class for table "test_answer".
 *
 * @property integer $id
 * @property integer $test_question_id
 * @property integer $order
 * @property string $text
 * @property integer $is_correct
 * @property string $created
 * @property string $updated
 *
 * @property TestQuestion $testQuestion
 * @property UserTestAnswers[] $userTestAnswers
 */
class TestAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_question_id', 'order', 'is_correct'], 'integer'],
            [['text'], 'string'],
            [['created', 'updated'], 'safe'],
            [['test_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestQuestion::className(), 'targetAttribute' => ['test_question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_question_id' => 'Test Question ID',
            'order' => 'Order',
            'text' => 'Text',
            'is_correct' => 'Is Correct',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
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
    public function getUserTestAnswers()
    {
        return $this->hasMany(UserTestAnswers::className(), ['test_answer_id' => 'id']);
    }
}
