<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client_info`.
 */
class m170602_221735_create_client_info_table extends Migration
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
        if (!in_array('client_info', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%client_info}}', [
                    'client_id' => 'INT(11) NOT NULL',
                    0 => 'PRIMARY KEY (`client_id`)',
                    'birth_date' => 'DATE NULL',
                    'address' => 'VARCHAR(200) NULL',
                    'passport' => 'VARCHAR(200) NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_client_id_2085_00','client_info','client_id',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_client_208_00','{{%client_info}}', 'client_id', '{{%client}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `client_info`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
