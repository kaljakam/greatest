<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test`.
 * yii migrate/create create_test_table --fields="test_id:primaryKey,title:string,description:text,created:datetime,updated:datetime"
 */
class m170831_114216_create_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'created' => $this->datetime(),
            'updated' => $this->datetime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('test');
    }
}
