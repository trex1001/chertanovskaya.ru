<?php
abstract class ActiveRecord extends CActiveRecord
{
    public function beforeSave()
    {
        echo  "beforeSave";
        if($this->getIsNewRecord() && $this->hasAttribute("datetimeOfCreate") )
        {
            $this->datetimeOfCreate= new CDbExpression('NOW()');
        }
        if($this->hasAttribute("datetimeOfUpdate"))
        {
            $this->datetimeOfUpdate = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

    public function beforeValidate()
    {
       // echo  "beforeValidate";
        return parent::beforeValidate();
    }
}
?>