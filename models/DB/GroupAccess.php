<?php

namespace app\models\DB;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "group_access".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $group_access_id
 * @property integer $access_type
 *
 * @property Group $groupAccess
 * @property Group $group
 */
class GroupAccess extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'group_access_id', 'access_type'], 'integer'],
            [['group_access_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_access_id' => 'id']],
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
            'group_id' => 'Group ID',
            'group_access_id' => 'Group Access ID',
            'access_type' => 'Access Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAccess()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_access_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }
}
