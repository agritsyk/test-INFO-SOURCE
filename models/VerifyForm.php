<?php

declare(strict_types = 1);

namespace app\models;

use yii\base\Model;

class VerifyForm extends Model
{
    /**
     * @var string
     */
    public $verifyCode;

    public function rules(): array
    {
        return [
            ['verifyCode', 'required'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels(): array
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }
}