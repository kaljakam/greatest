<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_test_answers`.
 * Has foreign keys to the tables:
 *
 * - `user_test`
 * - `test_question`
 * - `test_answer`
 */
class m170831_120442_create_user_test_answers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_test_answers', [
            'id' => $this->primaryKey(),
            'user_test_id' => $this->integer(),
            'test_question_id' => $this->integer(),
            'test_answer_id' => $this->integer(),
            'is_correct' => $this->integer(),
            'created' => $this->datetime(),
            'updated' => $this->datetime(),
        ]);

        // creates index for column `user_test_id`
        $this->createIndex(
            'idx-user_test_answers-user_test_id',
            'user_test_answers',
            'user_test_id'
        );

        // add foreign key for table `user_test`
        $this->addForeignKey(
            'fk-user_test_answers-user_test_id',
            'user_test_answers',
            'user_test_id',
            'user_test',
            'id',
            'CASCADE'
        );

        // creates index for column `test_question_id`
        $this->createIndex(
            'idx-user_test_answers-test_question_id',
            'user_test_answers',
            'test_question_id'
        );

        // add foreign key for table `test_question`
        $this->addForeignKey(
            'fk-user_test_answers-test_question_id',
            'user_test_answers',
            'test_question_id',
            'test_question',
            'id',
            'CASCADE'
        );

        // creates index for column `test_answer_id`
        $this->createIndex(
            'idx-user_test_answers-test_answer_id',
            'user_test_answers',
            'test_answer_id'
        );

        // add foreign key for table `test_answer`
        $this->addForeignKey(
            'fk-user_test_answers-test_answer_id',
            'user_test_answers',
            'test_answer_id',
            'test_answer',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user_test`
        $this->dropForeignKey(
            'fk-user_test_answers-user_test_id',
            'user_test_answers'
        );

        // drops index for column `user_test_id`
        $this->dropIndex(
            'idx-user_test_answers-user_test_id',
            'user_test_answers'
        );

        // drops foreign key for table `test_question`
        $this->dropForeignKey(
            'fk-user_test_answers-test_question_id',
            'user_test_answers'
        );

        // drops index for column `test_question_id`
        $this->dropIndex(
            'idx-user_test_answers-test_question_id',
            'user_test_answers'
        );

        // drops foreign key for table `test_answer`
        $this->dropForeignKey(
            'fk-user_test_answers-test_answer_id',
            'user_test_answers'
        );

        // drops index for column `test_answer_id`
        $this->dropIndex(
            'idx-user_test_answers-test_answer_id',
            'user_test_answers'
        );

        $this->dropTable('user_test_answers');
    }
}
