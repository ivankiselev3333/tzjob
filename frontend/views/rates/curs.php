<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'обновления курсов';
$this->params['breadcrumbs'][] = $this->title;
echo '<script>
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



echo '<div class="row"><div class="col-lg-12">
<h2 id="heading">Курсы валют ЦБ РФ на сегодня </h2>
<h3>' . date('d-m-Y h:m:s', strtotime('now')) . '</h3>
<p id="USD">Доллар США $ &mdash; 00,0000 руб.</p>
<p id="EUR">Евро € &mdash; 00,0000 руб.</p>
<p id="GBP">Фунт стерлингов Соединенного королевства$ &mdash; 00,0000 руб.</p>
<p id="HKD">Гонконгских долларов$ &mdash; 00,0000 руб.</p>
<p id="HUF">Венгерских форинтов$ &mdash; 00,0000 руб.</p>
<p id="INR">Индийских рупий $ &mdash; 00,0000 руб.</p>
<p id="JPY">Японских иен $ &mdash; 00,0000 руб.</p>
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
<p id="UZS">Узбекских сумов$ &mdash; 00,0000 руб.</p>
<p id="XDR">СДР (специальные права заимствования)$ &mdash; 00,0000 руб.</p>
<p id="ZAR">Южноафриканских рэндов$ &mdash; 00,0000 руб.</p>
                                       
';
?>
</div></div>
