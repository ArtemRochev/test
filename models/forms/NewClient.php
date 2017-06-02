<?php

namespace app\models\forms;

use app\models\Client;

class NewClient extends Client
{
    const REGEXP_PASSPORT = '/^[A-Z][A-Z]\d{6}$/';

    public $first_name;
    public $last_name;
    public $birth_date;
    public $address;
    public $passport;

    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required', 'message' => 'Заполните это поле'],
            [['first_name', 'last_name'], 'string', 'max' => 200],
            [['last_name'], 'checkNamePairUnique'],
            [['birth_date'], 'date', 'format' => 'php:Y-m-d', 'message' => 'Неверный формат даты. Введите дату в формате ГГГГ-ММ-ДД'],
            [['address'], 'string', 'max' => 200],
            [['passport'], 'validatePassport'],
        ];
    }

    public function validatePassport($attribute): bool {
        $isValid = (bool) preg_match(self::REGEXP_PASSPORT, $this->$attribute);

        if (!$isValid) {
            $this->addError($attribute, 'Неверный формат паспорта');
        }

        return $isValid;
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

    public function checkNamePairUnique(): bool
    {
        $alreadyExist = Client::find()->where([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name
        ])->exists();

        if ($alreadyExist) {
            $this->addError('first_name', 'Клиент с таким именем и фамилией уже существует');
            $this->addError('last_name', 'Клиент с таким именем и фамилией уже существует');
        }

        return !$alreadyExist;
    }
}