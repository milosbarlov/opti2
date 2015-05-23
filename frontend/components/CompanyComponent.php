<?php

    namespace frontend\components;

    use Yii;
    use common\models\Company;
    use common\models\UserCompany;
    use yii\base\Object;




class CompanyComponent extends Object
{
    private $_id;
    private $_name;
    private $_company;

    public function getInfo(){
        $this->_company = Company::findOne(Yii::$app->session->get('companyId'));

        return $this->_company;
    }

    public function getId(){
        if(!isset($this->_id))
            $this->_id = Yii::$app->session->get('companyId');

        return $this->_id;
    }

    public function getName(){
        if(!isset($this->_name)){
           if(Yii::$app->session->has('companyId')){
               $company = $this->getInfo();
               $this->_name = $company->name;
           }else{
               $this->_name = '';
           }

        }

        return $this->_name;
    }
}

