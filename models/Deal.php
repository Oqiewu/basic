<?php

namespace app\models;

use yii\db\ActiveRecord;

class Deal extends ActiveRecord
{
    public static function tableName()
    {
        return 'deal';
    }

    public function rules()
    {
        return [
            [['name', 'contact_id'], 'required'],
            [['amount', 'contact_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::class, 'targetAttribute' => ['contact_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'amount' => 'Сумма',
            'contact_id' => 'Контакт',
        ];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getContact()
    {
        return $this->hasOne(Contact::class, ['id' => 'contact_id']);
    }
}
