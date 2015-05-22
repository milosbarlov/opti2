<?php

use yii\db\Schema;
use yii\db\Migration;

class m150518_152700_corrective extends Migration
{
    public function up()
    {
        $this->alterColumn('user_company','user_id',Schema::TYPE_SMALLINT.'(10)');

        $this->alterColumn('user_company','company_id',Schema::TYPE_SMALLINT.'(10)');

    }

    public function down()
    {
        echo "m150518_152700_corrective cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
