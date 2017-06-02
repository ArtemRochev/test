<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client`.
 */
class m170602_221656_create_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('client', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%client}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'first_name' => 'VARCHAR(200) NULL',
                    'last_name' => 'VARCHAR(200) NULL',
                    'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_first_name_last_name_5604_00','client','first_name,last_name',1);
        $this->createIndex('idx_first_name_last_name_5605_01','client','first_name,last_name',0);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `client`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
