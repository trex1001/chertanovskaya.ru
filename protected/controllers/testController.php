<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 25.02.13
 * Time: 23:03
 * To change this template use File | Settings | File Templates.
 */
class testController   extends CController
{
      public function actionImage()
      {
          Yii::import('application.extensions.image.Image');
          $image = new Image('D:\temp\IMG_3527_third_size.jpg');
          $image->crop(100,100,100,0);
          $image->save('D:\temp\IMG_35272_third_size.jpg');
          //$image->render();
      }

      public function    actionRand()
      {
         DFileHelper::getRandomFileName("C:\\" ,"jpg");
      }

      public function   actionUpdateImage()
      {
          $image= new Image();
          if(isset($_POST["Image"]))
          {
             $image->attributes= $_POST["Image"];
             if($image->save())
             {
                 echo "фотография успешна загружена";
             }
          }
          $this->render("updateImage",array("model"=>$image));
      }
}
