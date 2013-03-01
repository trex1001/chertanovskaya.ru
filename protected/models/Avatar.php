<?php

/**
 * This is the model class for table "avatar".
 *
 * The followings are the available columns in table 'avatar':
 * @property integer $id
 * @property integer $width
 * @property integer $heigth
 * @property integer $top
 * @property integer $left
 * @property string $image
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class Avatar extends ActiveRecord
{
    const  path ="/images/avatars/";
    private function  uploadpath(){
        return Yii::getPathOfAlias('webroot').Avatar::path;
    }
    private function pathToImage()
    {
      return $this->uploadpath().$this->image.".jpg";;
    }
    private function  uploadUrl(){
        return Avatar::path;
    }
    public  function urlToImage()
    {
      return $this->uploadUrl().$this->image.".jpg";
    }
    public function  init()
    {
       if($this->image==null)$this->image = DFileHelper::getRandomFileName($this->uploadpath() ,"jpg");
    }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Avatar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{

		return 'avatar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('width, heigth, top, left', 'required'),
			array('width, heigth, top, left', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>100),
  //          array('image', 'file', 'types'=>'jpg'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, width, heigth, top, left, image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'users' => array(self::HAS_MANY, 'User', 'avatarId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'width' => 'Width',
			'heigth' => 'Heigth',
			'top' => 'Top',
			'left' => 'Left',
			'image' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('width',$this->width);
		$criteria->compare('heigth',$this->heigth);
		$criteria->compare('top',$this->top);
		$criteria->compare('left',$this->left);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function  image()
    {
        Yii::import('application.extensions.image.Image');
        if(file_exists($this->pathToImage()))return new Image($this->pathToImage());
        $file = CUploadedFile::getInstance($this,'image');
        $image = new Image($file->getTempName());
        $image->save($this->pathToImage());
        return $image;
    }
    public function beforeValidate()
    {
        if($this->isNewRecord)$this->automaticCutAvatar();
        return parent::beforeValidate();
    }


    private function  automaticCutAvatar()
    {
        $image = $this->image();
        if($image->width<=$image->height)$minlength=$image->width;
        else $minlength=$image->height;
        $this->heigth=$minlength;
        $this->width =$minlength;
        $this->top  =($image->height-$minlength)/2;
        $this->left =($image->width-$minlength)/2;
    }


    public function render()
    {

    }







}