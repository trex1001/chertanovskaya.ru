<?php
class renderAvatar extends  CWidget
{
    /* @var $user User */
    public $user;
    public $userId;
    public function init()
    {
        $assets = Yii::app()->getAssetManager()->publish(Yii::app()->getBasePath().'/assets',false, -1, true);
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/css/jquery.fancybox-1.3.4.css?'.time());
        $cs->registerScriptFile($assets . '/scripts/jquery.mousewheel-3.0.4.pack.js?'.time());
        $cs->registerScriptFile($assets . '/scripts/jquery.fancybox-1.3.4.pack.js');
        $cs->registerScriptFile($assets . '/scripts/jquery.fancybox.init.js');

    }
    public function run()
    {
        $this->user = User::model()->findByPk($this->userId);
        if($this->user!=null && !$this->user->isNewRecord)
        {
           // $this->userId = $this->user->id;
        }
        $this->render("renderAvatar");
    }
}
