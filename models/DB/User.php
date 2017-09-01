<?php

namespace app\models\DB;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $session_id
 * @property integer $group_id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $email
 * @property string $phone
 * @property string $login
 * @property string $password
 * @property string $auth_key
 * @property string $auth_token
 * @property string $birth
 * @property string $created
 * @property string $updated
 *
 * @property Group $group
 * @property UserTest[] $userTests
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session_id', 'group_id'], 'integer'],
            [['login', 'password'], 'required'],
            [['birth', 'created', 'updated'], 'safe'],
            [['name', 'surname', 'patronymic', 'email', 'phone', 'login', 'password', 'auth_key', 'auth_token'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_id' => 'Session ID',
            'group_id' => 'Group ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'email' => 'Email',
            'phone' => 'Phone',
            'login' => 'Login',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'auth_token' => 'Auth Token',
            'birth' => 'Birth',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTests()
    {
        return $this->hasMany(UserTest::className(), ['user_id' => 'id']);
    }
}
