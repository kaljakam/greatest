<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_test`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `test`
 */
class m170831_115748_create_user_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_test', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'test_id' => $this->integer(),
            'test_date' => $this->date(),
            'created' => $this->datetime(),
            'updated' => $this->datetime(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_test-user_id',
            'user_test',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_test-user_id',
            'user_test',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `test_id`
        $this->createIndex(
            'idx-user_test-test_id',
            'user_test',
            'test_id'
        );

        // add foreign key for table `test`
        $this->addForeignKey(
            'fk-user_test-test_id',
            'user_test',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_test-user_id',
            'user_test'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_test-user_id',
            'user_test'
        );

        // drops foreign key for table `test`
        $this->dropForeignKey(
            'fk-user_test-test_id',
            'user_test'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            'idx-user_test-test_id',
            'user_test'
        );

        $this->dropTable('user_test');
    }
}
