<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 26.02.13
 * Time: 0:01
 * To change this template use File | Settings | File Templates.
 */
class CutAvatar   extends CWidget
{
    public  $model;
    public function init()
    {
        $assets = Yii::app()->getAssetManager()->publish(Yii::app()->getBasePath().'/assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/css/imgareaselect-default.css?'.time());
        $cs->registerScriptFile($assets . '/scripts/jquery.imgareaselect.pack.js?'.time());
    }
    public function run()
    {
        $this->render("CutAvatar",array("model"=>$this->model));
    }
}
