<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class RatesController extends ActiveController
{
    public $modelClass = 'common\models\Rates';

    public function actionGetrates()
    {
        $params = Yii::$app->request->getQueryParams();
        $format = $params['format'];

        if (isset($params['date'])) {
            $date = '"' . $params['date'] . ' 00:00:00"';

        } else {
            $date = '"' . date('Y-m-d 00:00:00') . '"';
        }
        return Yii::$app->output->url($date, $format);

    }

    public function actionView($id)
    {
        $data = Yii::$app->db->createCommand('SELECT valute_id,numcode,charcode,name,nominal,value FROM `rates` where id="' . $id . '"')->queryAll();

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $data;
    }

}





















