<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Ссылки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-workload">
    <h1> <?= Html::encode($this->title) ?></h1>

   







<div class="row">
    <div class="col-lg-5">
    <ul class="tasks">

    <li class="task">
        <a href="<?= Url::home('http');?>rates/getrates?format=json"> <?= \Yii::t('frontend','json russian utf8'); ?> </a></li>
    <li class="task">
        <a href="<?= Url::home('http');?>rates/getrates?format=jsonp"> <?= \Yii::t('frontend','jsonp russian utf-8'); ?> </a></li>
          <li class="task">
          <a href="<?= Url::home('http');?>rates/getrates?format=json_en">
            <?= \Yii::t('frontend','json english utf8'); ?></a></li>
        <li class="task">
             <a href="<?= Url::home('http');?>rates/getrates?format=jsonp_en">
             <?= \Yii::t('frontend','jsonp english utf8'); ?></a></li>
    </ul>
</div>
<div class="col-lg-4">
     <ul class="tasks"><li class="task">
        <a href="<?= Url::home('http');?>rates/getrates?format=xml">
        <?= \Yii::t('frontend','xml russian utf8'); ?></a></li>
         <li class="task"><a href="<?= Url::home('http');?>rates/getrates?format=xml_1251">
                 <?= \Yii::t('frontend','xml russian windows-1251'); ?></a></li>

        <li class="task"> <a href="<?= Url::home('http');?>rates/getrates?format=xml_en">
        <?= \Yii::t('frontend','xml english utf8 '); ?> </a></li>
        <li class="task"><a href="<?= Url::home('http');?>rates/getrates?format=xml_en_1251">
         <?= \Yii::t('frontend','xml english windows-1251'); ?></a></li>



</ul></div>
<div class="col-lg-4">
     <ul class="tasks"><li class="task">
        <a href="<?= Url::home('http');?>rates/getrates?url=curs">
        <?= \Yii::t('frontend','обновления курсов'); ?></a></li>
    </ul>

</div></div></div>


