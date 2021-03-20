<?php

namespace common\components;

use yii;
use yii\base\Component;
use yii\helpers\Url;
use yii\web\Response;

class Output extends Component
{ // объявляем класс
    public $content;
    public $modelClass = 'common\models\Rates';

    public function init()
    { // функция инициализации. Если данные не будут переданы в компонент, то он выведет текст "Текст по умолчанию"
        parent::init();
        $this->content = '';
    }

    public function utf8_urldecode($str)
    {
        $str = preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str));
        return html_entity_decode($str, null, 'UTF-8');
    }

    public function url($date, $format)
    { // функция отображения данных
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql = 'SELECT * FROM `rates` where `dttm`=' . $date . ';');

        $result = $command->queryAll();
        $resultEn = $this->translate($result);


        if ($format === 'json') {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;
        }

        if ($format === 'json_en') {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $resultEn;
        }
        if ($format === 'jsonp_en') {
            \Yii::$app->response->format = Response::FORMAT_JSONP;
            $callback = 'mapApiCallback';
            //$data = User::find()->all();
            $data = ['callback' => $callback, 'data' => "(" . json_encode($resultEn) . ")"];
            return $data;

        }
        if ($format === 'jsonp') {
            \Yii::$app->response->format = Response::FORMAT_JSONP;
            $callback = 'mapApiCallback';
            $data = ['callback' => $callback, 'data' => "(" . json_encode($result) . ")"];

            return $data;

        }
        if ($format === 'xml') {

            Yii::$app->response->charset = 'utf-8';
            Yii::$app->response->format = Response::FORMAT_XML;
            return $result;
        }
        if ($format === 'xml_windows-1251') {

            Yii::$app->response->charset = 'utf-8';
            Yii::$app->response->format = Response::FORMAT_XML;

            return $result;
        }
        if ($format === 'xml_en') {
            Yii::$app->response->charset = 'utf-8';
            Yii::$app->response->format = Response::FORMAT_XML;
            return $resultEn;
        }

        if ($format === 'xml_1251') {
            Yii::$app->response->charset = 'windows-1251';
            $resultEn = $this->utf8win1251($resultEn);
            Yii::$app->response->format = Response::FORMAT_XML;
            return $resultEn;
        }
        if ($format === 'xml_en_1251') {
            $resultEn = $this->utf8win1251($resultEn);
            Yii::$app->response->charset = 'windows-1251';
            Yii::$app->response->format = Response::FORMAT_XML;
            return $resultEn;
        }
        if ($format === 'latest') {

            $data = $this->CBR_XML_Daily_Ru();

            $url = Url::home('http') . 'rates/getrates?format=latest';
            $data = json_decode(file_get_contents($url));
            Yii::$app->response->format = Response::FORMAT_HTML;

            return $data;

        }
        else {
            Yii::$app->response->setStatusCode(422);        }
    }

    public function translate($result)
    {
        $resultEn = $result;

        $eng = [

            'Australian Dollar',
            'Azerbaijan Manat',
            'British Pound Sterling',
            'Armenia Dram',
            'Belarussian Ruble',
            'Bulgarian lev',
            'Brazil Real',
            'Hungarian Forint',
            'Hong Kong Dollar',
            'Deutch Krona',
            'US Dollar',
            'Euro',
            'Indian Rupee',
            'Kazakhstan Tenge',
            'Canadian Dollar',
            'Kyrgyzstan Som',
            'China Yuan',
            'Moldova Lei',
            'Norwegian Krone',
            'Polish Zloty',
            'Romanian Leu',
            'SDR',
            'Singapore Dollar',
            'Tajikistan Ruble',
            'Turkish Lira',
            'New Turkmenistan Manat',
            'Uzbekistan Sum',
            'Ukrainian Hryvnia',
            'Czech Koruna',
            'Swedish Krona',
            'Swiss Franc',
            'South African Rand',
            'South Korean Won',
            'Japanese Ye',
        ];
        $i = 0;
        foreach ($resultEn as $item => &$value) {
            $value['name'] = $eng[$i];
            $i++;
        }
        return $resultEn;
    }

    public function utf8win1251($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->utf8win1251($value);
            } else {
                $array[$key] = mb_convert_encoding($value, 'Windows-1251', 'UTF-8');
            }
        }

        return $array;
    }

    public function CBR_XML_Daily_Ru()
    {
        static $rates;

        if ($rates === null) {
            $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
        }

        return $rates;
    }

}