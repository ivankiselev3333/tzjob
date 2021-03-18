<?php
use \yii\db\Migration;

class m130426_161933_cron_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('tbl_cron_jobs', array(
   			 'id' => $this->integer()->unsigned()->notNull(),
			'execute_after' => $this->dateTime()->notNull(),
			'executed_at' => $this->dateTime()->notNull(),
			'succeeded' => $this->integer(1),
			'action' => $this->string(15),
			'parameters' => $this->string(10),
			'execution_result' => $this->text(),
			  'PRIMARY KEY ([[id]])',
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_cron_jobs');
	}
}