<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test_question`.
 * Has foreign keys to the tables:
 *
 * - `test`
 */
class m170831_114503_create_test_question_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('test_question', [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'head' => $this->string(),
            'img' => $this->string(),
            'description' => $this->text(),
            'created' => $this->datetime(),
            'updated' => $this->datetime(),
        ]);

        // creates index for column `test_id`
        $this->createIndex(
            'idx-test_question-test_id',
            'test_question',
            'test_id'
        );

        // add foreign key for table `test`
        $this->addForeignKey(
            'fk-test_question-test_id',
            'test_question',
            'test_id',
            'test',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `test`
        $this->dropForeignKey(
            'fk-test_question-test_id',
            'test_question'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            'idx-test_question-test_id',
            'test_question'
        );

        $this->dropTable('test_question');
    }
}
