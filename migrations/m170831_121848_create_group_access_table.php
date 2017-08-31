<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group_access`.
 * Has foreign keys to the tables:
 *
 * - `group`
 * - `group`
 */
class m170831_121848_create_group_access_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('group_access', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'group_access_id' => $this->integer(),
            'access_type' => $this->integer(),
        ]);

        // creates index for column `group_id`
        $this->createIndex(
            'idx-group_access-group_id',
            'group_access',
            'group_id'
        );

        // add foreign key for table `group`
        $this->addForeignKey(
            'fk-group_access-group_id',
            'group_access',
            'group_id',
            'group',
            'id',
            'CASCADE'
        );

        // creates index for column `group_access_id`
        $this->createIndex(
            'idx-group_access-group_access_id',
            'group_access',
            'group_access_id'
        );

        // add foreign key for table `group`
        $this->addForeignKey(
            'fk-group_access-group_access_id',
            'group_access',
            'group_access_id',
            'group',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `group`
        $this->dropForeignKey(
            'fk-group_access-group_id',
            'group_access'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            'idx-group_access-group_id',
            'group_access'
        );

        // drops foreign key for table `group`
        $this->dropForeignKey(
            'fk-group_access-group_access_id',
            'group_access'
        );

        // drops index for column `group_access_id`
        $this->dropIndex(
            'idx-group_access-group_access_id',
            'group_access'
        );

        $this->dropTable('group_access');
    }
}
