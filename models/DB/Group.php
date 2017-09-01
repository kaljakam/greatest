<?php

namespace app\models\DB;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $group_name
 *
 * @property GroupAccess[] $groupAccesses
 * @property GroupAccess[] $groupAccess
 * @property User[] $users
 */
class Group extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAccesses()
    {
        return $this->hasMany(GroupAccess::className(), ['group_access_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAccess()
    {
        return $this->hasMany(GroupAccess::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['group_id' => 'id']);
    }
}
