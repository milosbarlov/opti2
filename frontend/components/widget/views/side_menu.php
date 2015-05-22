<?php
/**
 * Created by PhpStorm.
 * User: Milos Barlov <mbarlov> milosbarlov@gmail.com
 * Date: 19.5.15. \
 * Time: 13.23
 */

    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class="list-group">
    <?php  foreach($items as $item){?>

        <a href="<?= Url::toRoute($item['url'])?>" class="list-group-item"><?= $item['label']?></a>

  <?php  }?>


</div>

