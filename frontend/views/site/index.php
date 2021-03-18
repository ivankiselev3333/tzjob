<?php

/* @var $this yii\web\View */

$this->title = 'Надежный Сервис предоставления курсов валют';


?>
<div class="site-index">

    <div class="jumbotron">
        <h1> <?= \Yii::t('frontend',' Тестовое задание.'); ?> </h1>

        <p class="lead"> <?= \Yii::t('frontend','Тестовое задание'); ?></p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com"><?= \Yii::t('frontend','документация по уии2.'); ?></a></p>
    </div>

    <div class="body-content">
                  <div class="col-lg-6 col-lg-offset-3"> <p class="main_page_text_align_middle_h2 task_main"><?= \Yii::t('frontend','ОСНОВНАЯ ЗАДАЧА: задача повторить сервис'); ?></p>
                <a class="center_link" href="https://www.cbr-xml-daily.ru/#header"><?= \Yii::t('frontend','Сылка на сервис');?></a></div>
         
        <div class="row">
            <div class="col-lg-4"><ul class='tasks'>
                    <li class="task"><?= \Yii::t('frontend','Функциональность взаимодействия с сервисом оформить в виде компонента/библиотеки.'); ?></li>
                     <li class="task"><?= \Yii::t('frontend','Отображать данные из бд без обращения к сервису.'); ?></li>

            </ul></div>
            <div class="col-lg-4 offset-col-lg-4">

                 
                   <ul class="tasks"> 
                     <li class="task"><?= \Yii::t('frontend','Создать миграцию на изменение и откат изменений схемы данных.'); ?></li>
                     <li class="task"><?= \Yii::t('frontend','Синхронизировать данные, не нарушая условий сервиса.'); ?></li>
                     
                    
                     <li class="task"><?= \Yii::t('frontend','Составить описание (Readme) необходимых действий для запуска.'); ?></li>
                    
                 </ul>               

            </div>
            <div class="col-lg-4"><ul class='tasks'>
                 <li class="task"><?= \Yii::t('frontend','Опубликовать результат публичным репозиторием (github, gitlab, bitbucket');?></li>
                 <li class="task"><?= \Yii::t('frontend',' Дополнительно визуализировать значение изменения курса.'); ?></li></ul>
        </div>
    </div>

            <div class="col-lg-12">
                <p class="main_page_text_align_middle_h2"><?= \Yii::t('frontend','Зачем существует подобный сервис и почему его нужно поддержать'); ?> </h2>

                <p><p class="pt-3 ">
                        <?= \Yii::t('frontend','В последнее время'); ?> <a href="https://www.cbr.ru/development/sxml/"><?= \Yii::t('frontend','технические
                        ресурсы Банка России</a> работают ненадежно. Усложнено получение данных
                        о текущих курсах валют: от разработчиков требуют ставить специальные
                        заголовки, данные не загружаются с первого раза. В следствие чего
                        старые скрипты перестали работать. '); ?>
                        </p>
                </p>
                        
            </div>
       
        </div>

    </div>
</div>
