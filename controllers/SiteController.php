<?php

declare(strict_types = 1);

namespace app\controllers;

use Yii;
use app\models\VerifyForm;
use yii\web\Controller;
use app\models\Branch;

class SiteController extends Controller
{

    public function actions(): array
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex(): string
    {
        /** @var VerifyForm $verifyForm */
        $verifyForm = new VerifyForm();

        if ($verifyForm->load(Yii::$app->request->post()) && $verifyForm->validate()) {
            $gifUrl = Yii::$app->giphy->getRandomGif();

            return $this->renderPartial('giphy', ['url' => $gifUrl]);
        }
        $this->createAction('captcha')->getVerifyCode(true);

        /** @var Branch[] $branches */
        $branches = Yii::$app->nodeGenerator->generate();
        return $this->render('index', [
            'branches' => $branches,
            'verifyForm' => $verifyForm,
        ]);
    }

}
