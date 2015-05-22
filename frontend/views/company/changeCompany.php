<?php
/**
 * Created by PhpStorm.
 * User: Milos Barlov <mbarlov> milosbarlov@gmail.com
 * Date: 22.5.15. \
 * Time: 14.42
 */

use yii\helpers\Url;

?>

<form action="<?= Url::toRoute('company/change')?>" method="POST" style="height:200px;">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <label for="exampleInputEmail1">Izaberite Kompaniju</label>
    <select name="company_id" class="form-control" style="margin-bottom: 20px;">
        <?php foreach($model as $key=>$val){
            if($key != Yii::$app->company->id){?>
            <option value="<?php echo $key?>"><?php echo $val?></option>
        <?php } }?>

    </select>
    <button type="submit" class="btn btn-primary pull-right" style="margin-bottom:30px;">Zameni</button>
</form>