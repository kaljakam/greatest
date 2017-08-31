<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m170831_111657_create_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'group_name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('group');
    }
}
