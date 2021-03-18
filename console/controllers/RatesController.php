<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
class RatesController extends Controller
{   
    
    public function actionRatesParser() {

    // вытягиваем данные с цбр
    $tomorrow = date('d.m.Y', strtotime('+1 day'));
    $cbrUrl = "http://www.cbr.ru/scripts/XML_daily.asp?date_req={$tomorrow}";
    $cbrResponse = file_get_contents($cbrUrl);

    // конвертим xml в массив
    $xml = simplexml_load_string($cbrResponse);
    $json = json_encode($xml, JSON_UNESCAPED_UNICODE);
    $array = json_decode($json, true);

    if(!count($array)) {
      die('Котировки не получены. Ответ от цбр: ' . $cbrResponse);
    }

    $ratesDate = date('Y-m-d', strtotime($array['@attributes']['Date']));

    // подготавливаем данные для вставки
    $batchData = [];
    foreach($array['Valute'] as $item) {
      $batchData[] = [
        $item['@attributes']['ID'],
        $ratesDate,
        $item['NumCode'],
        $item['CharCode'],
        $item['Name'],
        $item['Nominal'],
       str_replace(',', '.', $item['Value']),
      ];
    }

    try {

      // вставляем в бд всю пачку сразу
      $inserted = Yii::$app->db->createCommand()->batchInsert(
        'rates', // табл
        ['valute_id', 'dttm', 'numcode', 'charcode', 'name', 'nominal', 'value'], // поля
        $batchData // данные
      )->execute();

      echo "Добавлено $inserted строк";

    } catch (\Throwable $e) {
      echo "Что-то пошло не так: " . $e->getMessage();
    }

  } 



    public function actionTommorow(){

    // вытягиваем данные с цбр
    $tomorrow = date('d.m.Y', strtotime('+1 day'));
    $cbrUrl = "http://www.cbr.ru/scripts/XML_daily.asp?date_req={$tomorrow}";
    $cbrResponse = file_get_contents($cbrUrl);

    // конвертим xml в массив
    $xml = simplexml_load_string($cbrResponse);
    $json = json_encode($xml, JSON_UNESCAPED_UNICODE);
    $array = json_decode($json, true);

    if(!count($array)) {
      die('Котировки не получены. Ответ от цбр: ' . $cbrResponse);
    }

    $ratesDate = date('Y-m-d', strtotime('+1 day'));
file_put_contents('sucess.php', print_r($ratesDate, true));

    // подготавливаем данные для вставки

    try {

      // вставляем в бд всю пачку сразу
      $batchData = [];
    foreach($array['Valute'] as $item) {
      $batchData[] = [
        $item['@attributes']['ID'],
        $ratesDate,
        $item['NumCode'],
        $item['CharCode'],
        $item['Name'],
        $item['Nominal'],
       str_replace(',', '.', $item['Value']),
      ];
    }
    print_r($batchData);

     $inserted = Yii::$app->db->createCommand()->batchInsert(
        'rates', // табл
        ['valute_id', 'dttm', 'numcode', 'charcode', 'name', 'nominal', 'value'], // поля
        $batchData // данные
      )->execute();

      echo "Добавлено $inserted строк";

    } catch (\Throwable $e) {
      echo "Что-то пошло не так: " . $e->getMessage();
    }
    }
  
    
}