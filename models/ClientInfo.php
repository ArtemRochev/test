<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_info".
 *
 * @property integer $client_id
 * @property string $birth_date
 * @property string $address
 * @property string $passport
 *
 * @property Client $client
 */
class ClientInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'integer'],
            [['client_id'], 'unique'],
            [['birth_date'], 'safe'],
            [['address', 'passport'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'birth_date' => 'Birth Date',
            'address' => 'Address',
            'passport' => 'Passport',
        ];
    }
}
