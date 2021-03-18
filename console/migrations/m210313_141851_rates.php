<?php

use yii\db\Migration;

/**
 * Class m210313_141851_rates
 */
class m210313_141851_rates extends Migration
{
    /**
     * {@inheritdoc}
     */

     public function safeUp()
     {

         $q = "CREATE TABLE rates (
               id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
               valute_id VARCHAR(8) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
               dttm DATETIME NOT NULL,
               numcode SMALLINT(3) UNSIGNED NOT NULL DEFAULT '0',
               charcode VARCHAR(3) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
               name VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
               nominal SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
               value DECIMAL(8,4) UNSIGNED NOT NULL DEFAULT '0.0000',
               PRIMARY KEY (id) USING BTREE,
               UNIQUE INDEX dttm (dttm, charcode) USING BTREE,
               INDEX valute_id (valute_id) USING BTREE,
               INDEX numcode (numcode) USING BTREE,
               INDEX charcode (charcode) USING BTREE,
               INDEX name (name) USING BTREE,
               INDEX value (value) USING BTREE
             )
             COLLATE='utf8_general_ci'
             ENGINE=InnoDB
             ;";
       
        
        Yii::$app->db->createCommand($q)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210313_141851_rates cannot be reverted.\n";

        $q = "
        DROP TABLE `rates`;
        ";
        Yii::$app->db->createCommand($q)->execute();
    }

 
}
