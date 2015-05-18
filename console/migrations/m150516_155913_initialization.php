<?php

use yii\db\Schema;
use yii\db\Migration;

class m150516_155913_initialization extends Migration
{
    public function up()
    {
        $this->createTable('article',[
            'id'=>Schema::TYPE_PK,
            'supplier_id'=>Schema::TYPE_INTEGER.'(10) NOT NULL',
            'code'=>Schema::TYPE_STRING.'(45) NOT NULL',
            'name'=>Schema::TYPE_STRING.'(255) NOT NULL ',
            'tax'=>Schema::TYPE_STRING.'(2) NOT NULL',
            'coefficient'=>Schema::TYPE_INTEGER.'(5) DEFAULT 1',
        ]);

        $this->insert('article',[
            'id'=>1,
            'supplier_id'=>1,
            'code'=>'12',
            'name'=>'nesto sa 20%',
            'tax'=>'20',
            'coefficient'=>1

        ]);

        $this->createTable('calc_details',[
            'id'=>Schema::TYPE_PK,
            'calc_header_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'article_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'vat'=>Schema::TYPE_STRING.'(2) NOT NULL',
            'data'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'data_type'=>Schema::TYPE_SMALLINT.'(1) NOT NULL',
            'qty'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'items'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'incoming_price'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'seling_price' => Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL'
        ]);


        $this->createTable('calc_header',[
           'id'=>Schema::TYPE_PK,
            'supplier_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'company_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'number'=>Schema::TYPE_INTEGER.'(10)  UNSIGNED NOT NULL ',
            'calc_date'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'invoice_date'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'invoice_number'=>Schema::TYPE_STRING.'(45) NOT NULL',
            'invoice_total'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'vat_1'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'vat_2'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'payment_date'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'seling_total'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'seling_vat_1'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'selint_vat_2'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'profit'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'is_processed'=>Schema::TYPE_STRING.'(2) NOT NULL DEFAULT 0',
            'type'=>Schema::TYPE_STRING.'(1) NOT NULL DEFAULT 0'
        ]);



        $this->createTable('city',[
           'id'=>Schema::TYPE_PK,
            'country_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED DEFAULT 0',
            'name'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'zip'=>Schema::TYPE_STRING.'(10) NOT NULL',
        ]);

        $this->insert('city',[
            'id'=>1,
            'country_id'=>1,
            'name'=>'Beograd',
            'zip'=>'11000'
        ]);

        $this->createTable('company',[
            'id'=>Schema::TYPE_PK,
            'tin'=>Schema::TYPE_STRING.'(15) NOT NULL COMMENT "pib"',
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'city_id'=>Schema::TYPE_INTEGER.'(10) NOT NULL',
            'address'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'cin' => Schema::TYPE_STRING.'(15) DEFAULT NULL COMMENT "maticni broj"',
            'pdv'=>Schema::TYPE_SMALLINT.'(1)NOT NULL DEFAULT 0',
        ]);

        $this->insert('company',[
            'id'=>24,
            'tin'=>'101308101',
            'name'=>'Optika',
            'city_id'=>1,
            'address'=>'Knez Mihajlova 21',
            'cin'=>'234123413',
            'pdv'=>'0'
        ]);

        $this->createTable('company_info',[
            'id'=>Schema::TYPE_PK,
            'company_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'data'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'is_default'=>Schema::TYPE_SMALLINT.'(1)NOT NULL DEFAULT 0',
            'type'=>Schema::TYPE_STRING.'(20) NOT NULL',
        ]);

        $this->createTable('income_detail',[
            'id'=>Schema::TYPE_PK,
            'income_header_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'data_name'=>Schema::TYPE_STRING.' NOT NULL',
            'data_value'=>Schema::TYPE_INTEGER.'(11) NOT NULL',
            'data_type' =>Schema::TYPE_SMALLINT.'(1)NOT NULL DEFAULT 0',
        ]);

        $this->createTable('income_header',[
            'id'=>Schema::TYPE_PK,
            'company_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'income_date'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL'
        ]);

        $this->createTable('optometrist',[
            'id'=>Schema::TYPE_PK,
            'pacient_id'=>Schema::TYPE_SMALLINT.'(10) UNSIGNED NOT NULL ',
            'dodsph'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'dodcyl'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'dodax'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'dossph'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'doscyl'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'dosax'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'dpd'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'dstakla'=>'MEDIUMTEXT',
            'dokvir'=>'MEDIUMTEXT',
            'bodsph'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'bodcyl'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'bodax'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'bossph'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'boscyl'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'bosax'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'bpd'=>Schema::TYPE_STRING.'(6) DEFAULT NULL',
            'bstakla'=>'MEDIUMTEXT',
            'bokvir'=>'MEDIUMTEXT',
            'predio'=>Schema::TYPE_SMALLINT.'(1)NOT NULL DEFAULT 0',
            'vod'=>Schema::TYPE_STRING.'(7) DEFAULT NULL',
            'vos'=>Schema::TYPE_STRING.'(7) DEFAULT NULL',
            'note'=>'MEDIUMTEXT',
            'personal_note'=>'MEDIUMTEXT',
            'created_at'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL '
        ]);

        $this->createTable('pacient',[
            'id'=>Schema::TYPE_PK,
            'company_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL ',
            'first_name'=>Schema::TYPE_STRING.'(45) NOT NULL',
            'last_name'=>Schema::TYPE_STRING.'(100) NOT NULL',
            'birthday'=>Schema::TYPE_INTEGER.'(10) NOT NULL',
            'city_id'=>Schema::TYPE_INTEGER.'(10) DEFAULT NULL',
            'address'=>Schema::TYPE_STRING.' DEFAULT NULL',
            'phone'=>Schema::TYPE_STRING.'(100) DEFAULT NULL',
            'email'=>Schema::TYPE_STRING.' DEFAULT NULL',
            'pin'=>Schema::TYPE_STRING.'(20) DEFAULT NULL COMMENT "jmbg"'
        ]);

        $this->createTable('supplier',[
            'id'=>Schema::TYPE_PK,
            'tin'=>Schema::TYPE_STRING.'(15) NOT NULL COMMENT "pib"',
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'city_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'address'=>Schema::TYPE_STRING.'(255) DEFAULT NULL',
            'cin'=>Schema::TYPE_STRING.'(15) DEFAULT NULL COMMENT "maticni broj"',
            'data_type'=>Schema::TYPE_SMALLINT.'(1) DEFAULT 0'
        ]);

        $this->createTable('supplier_info',[
            'id'=>Schema::TYPE_PK,
            'supplier_id'=>Schema::TYPE_INTEGER.'(10) UNSIGNED NOT NULL',
            'data'=>Schema::TYPE_STRING.' NOT NULL',
            'is_default'=>Schema::TYPE_SMALLINT.'(1)NOT NULL DEFAULT 0',
            'type'=>Schema::TYPE_STRING.'(20) NOT NULL'
        ]);

        $this->createTable('user_company',[
            'id'=>Schema::TYPE_PK,
            'user_id'=>Schema::TYPE_STRING.'(10) NOT NULL',
            'company_id'=>Schema::TYPE_STRING.'(10) NOT NULL',
            'is_default'=>Schema::TYPE_SMALLINT.'(1) DEFAULT 0',
            'is_admin'=>Schema::TYPE_SMALLINT.'(1) DEFAULT 0'
        ]);

        $this->createTable('prodaja',[
            'id'=>Schema::TYPE_PK,
            'pacient_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'company_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'date'=>Schema::TYPE_INTEGER.' NOT NULL ',
            'user_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'diopter'=>Schema::TYPE_STRING.'(155) NOT NULL',
            'glasses'=>Schema::TYPE_STRING.'(155) NOT NULL',
            'frame'=>Schema::TYPE_STRING.'(155) NOT NULL',
            'glasses_price'=>Schema::TYPE_DECIMAL.'(10,2) UNSIGNED NOT NULL',
            'frame_price'=>Schema::TYPE_DECIMAL.'(10,2) UNSIGNED NOT NULL',
            'total_price'=>Schema::TYPE_DECIMAL.'(10,2) UNSIGNED NOT NULL',
            'napomena'=>'MEDIUMTEXT NOT NULL'
        ]);




    }

    public function down()
    {
        echo "m150516_155913_initialization cannot be reverted.\n";

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
