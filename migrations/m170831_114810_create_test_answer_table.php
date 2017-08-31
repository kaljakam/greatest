<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test_answer`.
 * Has foreign keys to the tables:
 *
 * - `test_question`
 */
class m170831_114810_create_test_answer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('test_answer', [
            'id' => $this->primaryKey(),
            'test_question_id' => $this->integer(),
            'order' => $this->integer(),
            'text' => $this->text(),
            'is_correct' => $this->integer(),
            'created' => $this->datetime(),
            'updated' => $this->datetime(),
        ]);

        // creates index for column `test_question_id`
        $this->createIndex(
            'idx-test_answer-test_question_id',
            'test_answer',
            'test_question_id'
        );

        // add foreign key for table `test_question`
        $this->addForeignKey(
            'fk-test_answer-test_question_id',
            'test_answer',
            'test_question_id',
            'test_question',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `test_question`
        $this->dropForeignKey(
            'fk-test_answer-test_question_id',
            'test_answer'
        );

        // drops index for column `test_question_id`
        $this->dropIndex(
            'idx-test_answer-test_question_id',
            'test_answer'
        );

        $this->dropTable('test_answer');
    }
}
