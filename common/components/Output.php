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
        if ($format === 'xml') {

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
             $page = '<script>
function CBR_XML_Daily_Ru(rates) {
  function trend(current, previous) {
    if (current > previous) return \' ▲\';
    if (current < previous) return \' ▼\';
    return \'\';
  }
    
  var USDrate = rates.Valute.USD.Value.toFixed(4).replace(\'.\', \',\');
  var USD = document.getElementById(\'USD\');
  USD.innerHTML = USD.innerHTML.replace(\'00,0000\', USDrate);
  USD.innerHTML += trend(rates.Valute.USD.Value, rates.Valute.USD.Previous);

  var EURrate = rates.Valute.EUR.Value.toFixed(4).replace(\'.\', \',\');
  var EUR = document.getElementById(\'EUR\');
  EUR.innerHTML = EUR.innerHTML.replace(\'00,0000\', EURrate);
  EUR.innerHTML += trend(rates.Valute.EUR.Value, rates.Valute.EUR.Previous);


  var GBPrate = rates.Valute.GBP.Value.toFixed(4).replace(\'.\', \',\');
  var GBP = document.getElementById(\'GBP\');
  GBP.innerHTML = GBP.innerHTML.replace(\'00,0000\', GBPrate);
  GBP.innerHTML += trend(rates.Valute.GBP.Value, rates.Valute.GBP.Previous);
 
  var HKDrate = rates.Valute.HKD.Value.toFixed(4).replace(\'.\', \',\');
  var HKD = document.getElementById(\'HKD\');
  HKD.innerHTML = HKD.innerHTML.replace(\'00,0000\', HKDrate);
  HKD.innerHTML += trend(rates.Valute.HKD.Value, rates.Valute.HKD.Previous);
 
  var HUFrate = rates.Valute.HUF.Value.toFixed(4).replace(\'.\', \',\');
  var HUF = document.getElementById(\'HUF\');
  HUF.innerHTML = HUF.innerHTML.replace(\'00,0000\', HUFrate);
  HUF.innerHTML += trend(rates.Valute.HUF.Value, rates.Valute.HUF.Previous);
 
  var INRrate = rates.Valute.INR.Value.toFixed(4).replace(\'.\', \',\');
  var INR = document.getElementById(\'INR\');
  INR.innerHTML = INR.innerHTML.replace(\'00,0000\', INRrate);
  INR.innerHTML += trend(rates.Valute.INR.Value, rates.Valute.INR.Previous);
 
  var JPYrate = rates.Valute.JPY.Value.toFixed(4).replace(\'.\', \',\');
  var JPY = document.getElementById(\'JPY\');
  JPY.innerHTML = JPY.innerHTML.replace(\'00,0000\', JPYrate);
  JPY.innerHTML += trend(rates.Valute.JPY.Value, rates.Valute.JPY.Previous);
 
  var KGSrate = rates.Valute.KGS.Value.toFixed(4).replace(\'.\', \',\');
  var KGS = document.getElementById(\'KGS\');
  KGS.innerHTML = KGS.innerHTML.replace(\'00,0000\', KGSrate);
  KGS.innerHTML += trend(rates.Valute.KGS.Value, rates.Valute.KGS.Previous);
 
  var KRWrate = rates.Valute.KRW.Value.toFixed(4).replace(\'.\', \',\');
  var KRW = document.getElementById(\'KRW\');
  KRW.innerHTML = KRW.innerHTML.replace(\'00,0000\', KRWrate);
  KRW.innerHTML += trend(rates.Valute.KRW.Value, rates.Valute.KRW.Previous);
 
  var KZTrate = rates.Valute.KZT.Value.toFixed(4).replace(\'.\', \',\');
  var KZT = document.getElementById(\'KZT\');
  KZT.innerHTML = KZT.innerHTML.replace(\'00,0000\', KZTrate);
  KZT.innerHTML += trend(rates.Valute.KZT.Value, rates.Valute.KZT.Previous);
  
  var MDLrate = rates.Valute.MDL.Value.toFixed(4).replace(\'.\', \',\');
  var MDL = document.getElementById(\'MDL\');
  MDL.innerHTML = MDL.innerHTML.replace(\'00,0000\', MDLrate);
  MDL.innerHTML += trend(rates.Valute.MDL.Value, rates.Valute.MDL.Previous);
 
  var NOKrate = rates.Valute.NOK.Value.toFixed(4).replace(\'.\', \',\');
  var NOK = document.getElementById(\'NOK\');
  NOK.innerHTML = NOK.innerHTML.replace(\'00,0000\', NOKrate);
  NOK.innerHTML += trend(rates.Valute.NOK.Value, rates.Valute.NOK.Previous);
 
  var PLNrate = rates.Valute.PLN.Value.toFixed(4).replace(\'.\', \',\');
  var PLN = document.getElementById(\'PLN\');
  PLN.innerHTML = PLN.innerHTML.replace(\'00,0000\', PLNrate);
  PLN.innerHTML += trend(rates.Valute.PLN.Value, rates.Valute.PLN.Previous);
 
  var RONrate = rates.Valute.RON.Value.toFixed(4).replace(\'.\', \',\');
  var RON = document.getElementById(\'RON\');
  RON.innerHTML = RON.innerHTML.replace(\'00,0000\', RONrate);
  RON.innerHTML += trend(rates.Valute.RON.Value, rates.Valute.RON.Previous);
 
  var SEKrate = rates.Valute.SEK.Value.toFixed(4).replace(\'.\', \',\');
  var SEK = document.getElementById(\'SEK\');
  SEK.innerHTML = SEK.innerHTML.replace(\'00,0000\', SEKrate);
  SEK.innerHTML += trend(rates.Valute.SEK.Value, rates.Valute.SEK.Previous);
 
  var SGDrate = rates.Valute.SGD.Value.toFixed(4).replace(\'.\', \',\');
  var SGD = document.getElementById(\'SGD\');
  SGD.innerHTML = SGD.innerHTML.replace(\'00,0000\', SGDrate);
  SGD.innerHTML += trend(rates.Valute.SGD.Value, rates.Valute.SGD.Previous);
 

  var TJSrate = rates.Valute.TJS.Value.toFixed(4).replace(\'.\', \',\');
  var TJS = document.getElementById(\'TJS\');
  TJS.innerHTML = TJS.innerHTML.replace(\'00,0000\', TJSrate);
  TJS.innerHTML += trend(rates.Valute.TJS.Value, rates.Valute.TJS.Previous);
 
  var TMTrate = rates.Valute.TMT.Value.toFixed(4).replace(\'.\', \',\');
  var TMT = document.getElementById(\'TMT\');
  TMT.innerHTML = TMT.innerHTML.replace(\'00,0000\', TMTrate);
  TMT.innerHTML += trend(rates.Valute.TMT.Value, rates.Valute.TMT.Previous);
 
  var TRYrate = rates.Valute.TRY.Value.toFixed(4).replace(\'.\', \',\');
  var TRY = document.getElementById(\'TRY\');
  TRY.innerHTML = TRY.innerHTML.replace(\'00,0000\', TRYrate);
  TRY.innerHTML += trend(rates.Valute.TRY.Value, rates.Valute.TRY.Previous);
 
  var UAHrate = rates.Valute.UAH.Value.toFixed(4).replace(\'.\', \',\');
  var UAH = document.getElementById(\'UAH\');
  UAH.innerHTML = UAH.innerHTML.replace(\'00,0000\', UAHrate);
  UAH.innerHTML += trend(rates.Valute.UAH.Value, rates.Valute.UAH.Previous);
 

 
  var UZSrate = rates.Valute.UZS.Value.toFixed(4).replace(\'.\', \',\');
  var UZS = document.getElementById(\'UZS\');
  UZS.innerHTML = UZS.innerHTML.replace(\'00,0000\', UZSrate);
  UZS.innerHTML += trend(rates.Valute.UZS.Value, rates.Valute.UZS.Previous);
 
  var XDRrate = rates.Valute.XDR.Value.toFixed(4).replace(\'.\', \',\');
  var XDR = document.getElementById(\'XDR\');
  XDR.innerHTML = XDR.innerHTML.replace(\'00,0000\', XDRrate);
  XDR.innerHTML += trend(rates.Valute.XDR.Value, rates.Valute.XDR.Previous);
 
  var ZARrate = rates.Valute.ZAR.Value.toFixed(4).replace(\'.\', \',\');
  var ZAR = document.getElementById(\'ZAR\');
  ZAR.innerHTML = ZAR.innerHTML.replace(\'00,0000\', ZARrate);
  ZAR.innerHTML += trend(rates.Valute.ZAR.Value, rates.Valute.ZAR.Previous); 

}
</script>
<link rel="dns-prefetch" href="https://www.cbr-xml-daily.ru/" />
<script src="//www.cbr-xml-daily.ru/daily_jsonp.js" async></script>





';


            $data = $this->CBR_XML_Daily_Ru();

            $url = Url::home('http') . 'rates/getrates?format=latest';
            $data = json_decode(file_get_contents($url));
            echo '<h2 id="heading">Курсы валют ЦБ РФ на сегодня </h2><h3>' . date('d-m-Y h:m:s', strtotime('now')) . '</h3>
<p id="USD">Доллар США $ &mdash; 00,0000 руб.</p>
<p id="EUR">Евро € &mdash; 00,0000 руб.</p>
<p id="GBP">Фунт стерлингов Соединенного королевства$ &mdash; 00,0000 руб.</p>
<p id="HKD">Гонконгских долларов$ &mdash; 00,0000 руб.</p>
<p id="HUF">Венгерских форинтов$ &mdash; 00,0000 руб.</p>
<p id="INR">Индийских рупий$ &mdash; 00,0000 руб.</p>
<p id="JPY">Японских иен$ &mdash; 00,0000 руб.</p>
<p id="KGS">Киргизских сомов$ &mdash; 00,0000 руб.</p>
<p id="KRW">Вон Республики Корея$ &mdash; 00,0000 руб.</p>

<p id="KZT">Казахстанских тенге$ &mdash; 00,0000 руб.</p>
<p id="MDL">Молдавских леев$ &mdash; 00,0000 руб.</p>
<p id="NOK">Норвежских крон$ &mdash; 00,0000 руб.</p>
<p id="PLN">Польский злотый$ &mdash; 00,0000 руб.</p>
<p id="RON">Румынский лей$ &mdash; 00,0000 руб.</p>
<p id="SEK">Шведских крон$ &mdash; 00,0000 руб.</p>
<p id="SGD">Сингапурский доллар$ &mdash; 00,0000 руб.</p>

<p id="TJS">Таджикских сомони$ &mdash; 00,0000 руб.</p>
<p id="TMT">Новый туркменский манат$ &mdash; 00,0000 руб.</p>
<p id="TRY">Турецких лир$ &mdash; 00,0000 руб.</p>
<p id="UAH">Украинских гривен$ &mdash; 00,0000 руб.</p>
<p id="USD">Доллар США$ &mdash; 00,0000 руб.</p>
<p id="UZS">Узбекских сумов$ &mdash; 00,0000 руб.</p>
<p id="XDR">СДР (специальные права заимствования)$ &mdash; 00,0000 руб.</p>
<p id="ZAR">Южноафриканских рэндов$ &mdash; 00,0000 руб.</p>"
                                               <div style="display:hidden;
';
            return $data;

        }
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