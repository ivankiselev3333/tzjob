все подряд для сервера на убунту. 
https://www.codegrepper.com/code-examples/php/ubuntu+install+php+7.4

php init 
опция 0 

composer install

create table databasename;

common/config/main-local.php 
нужно прописать базу. 

php migrate/up

php yii rates/update-rates 

crontab -e

получать обновления курса в минуту
* * * * * sh /var/www/html/domain yiigetrates.sh

один раз в день, в 23 59 
23 59 * * * sh /var/www/html/domain yiigetrates.sh
курсы обновляются один раз. 

var/www/html/domain/yiigetrates.sh >
php /var/www/html/yii rates/update-rates

или 
php yii rates/update-rates 

