<?php

namespace app\models\DB;

use Yii;

/**
 * This is the model class for table "test_question".
 *
 * @property integer $id
 * @property integer $test_id
 * @property string $head
 * @property string $img
 * @property string $description
 * @property string $created
 * @property string $updated
 *
 * @property TestAnswer[] $testAnswers
 * @property Test $test
 * @property UserTestAnswers[] $userTestAnswers
 */
class TestQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id'], 'integer'],
            [['description'], 'string'],
            [['created', 'updated'], 'safe'],
            [['head', 'img'], 'string', 'max' => 255],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'head' => 'Head',
            'img' => 'Img',
            'description' => 'Description',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestAnswers()
    {
        return $this->hasMany(TestAnswer::className(), ['test_question_id' => 'id']);
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
    public function getUserTestAnswers()
    {
        return $this->hasMany(UserTestAnswers::className(), ['test_question_id' => 'id']);
    }
}
