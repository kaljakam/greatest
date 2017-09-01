<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 * Has foreign keys to the tables:
 *
 * - `group`
 */
class m170831_111658_create_user_table extends Migration
{
  /**
   * @inheritdoc
   */
  public function up() {
    $this->createTable('user', [
      'id'         => $this->primaryKey(),
      'session_id' => $this->integer(),
      'group_id'   => $this->integer(),
      'name'       => $this->string(),
      'surname'    => $this->string(),
      'patronymic' => $this->string(),
      'email'      => $this->string(),
      'phone'      => $this->string(),
      'login'      => $this->string()->notNull(),
      'password'   => $this->string()->notNull(),
      'auth_key'   => $this->string(),
      'auth_token' => $this->string(),
      'birth'      => $this->date(),
      'created'    => $this->datetime(),
      'updated'    => $this->datetime(),
    ]);
    
    // creates index for column `group_id`
    $this->createIndex('idx-user-group_id', 'user', 'group_id');
    
    // add foreign key for table `group`
    $this->addForeignKey('fk-user-group_id', 'user', 'group_id', 'group', 'id', 'CASCADE');
  }
  
  /**
   * @inheritdoc
   */
  public function down() {
    // drops foreign key for table `group`
    $this->dropForeignKey('fk-user-group_id', 'user');
    
    // drops index for column `group_id`
    $this->dropIndex('idx-user-group_id', 'user');
    
    $this->dropTable('user');
  }
}