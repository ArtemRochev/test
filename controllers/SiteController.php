<?php

namespace app\controllers;

use app\models\Client;
use app\models\ClientInfo;
use app\models\forms\NewClient;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model'    => new NewClient()
        ]);
    }

    public function actionValidateClientData()
    {
        $newClientForm = new NewClient();
        $newClientForm->load(\Yii::$app->request->post());

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return ActiveForm::validate($newClientForm);
    }

    public function actionSaveClient()
    {
        $data       = \Yii::$app->request->post();
        $client     = new Client();
        $formName   = 'NewClient';

        $success = $client->load($data, $formName);
        $success = $client->save();

        if ($success) {
            $info = new ClientInfo();
            $info->client_id = $client->id;
            $info->load($data, $formName);
            $info->save();
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'success'   => $success,
            'id'        => ($success ? $client->id : null),
            'errors'    => $client->errors
        ];
    }
}
