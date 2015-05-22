<?php
/**
 * Created by PhpStorm.
 * User: Milos Barlov <mbarlov> milosbarlov@gmail.com
 * Date: 19.5.15. \
 * Time: 13.18
 */
namespace frontend\components\widget;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class SideMenuWidget extends Widget{

    public $items;

    public function run(){
        return $this->render('side_menu',[
            'items'=>$this->items
        ]);
    }
}