<?php

namespace app\models;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 *
 * @property ClientInfo $info
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required', 'message' => 'Заполните это поле'],
            [['first_name', 'last_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name'    => 'Имя',
            'last_name'     => 'Фамилия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne(ClientInfo::className(), ['client_id' => 'id']);
    }
}
