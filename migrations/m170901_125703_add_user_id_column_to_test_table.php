<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `test`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170901_125703_add_user_id_column_to_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('test', 'user_id', $this->integer());

        // creates index for column `user_id`
        $this->createIndex(
            'idx-test-user_id',
            'test',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-test-user_id',
            'test',
            'user_id',
            'user',
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
            'fk-test-user_id',
            'test'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-test-user_id',
            'test'
        );

        $this->dropColumn('test', 'user_id');
    }
}
