<?php

/**
 * This is the model class for table "tbl_photos".
 *
 * The followings are the available columns in table 'tbl_photos':
 * @property string $photo_name
 * @property string $photo_title
 * @property string $photo_desc
 * @property integer $photo_priority
 * @property string $photo_category
 */
class Photos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo_name, photo_title, photo_desc, photo_category, photo_priority', 'required'),
			array('photo_priority', 'numerical', 'integerOnly'=>true),
			array('photo_name', 'length', 'max'=>50),
			array('photo_title, photo_category', 'length', 'max'=>30),
			array('photo_desc', 'length', 'max'=>100),
            array('photo_name', 'file', 'types' => 'jpg,jpeg,JPG,JPEG,GIF,PNG,gif,png',
                'maxSize' => 1024 * 1024  * 13, 'tooLarge' => 'Size should be less then 13MB !!!'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('photo_name, photo_title, photo_desc, photo_category, photo_priority', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'photo_name' => 'Photo Name',
			'photo_title' => 'Photo Title',
			'photo_desc' => 'Photo Desc',
			'photo_priority' => 'Photo Priority',
            'photo_category' => 'Photo Category',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('photo_name',$this->photo_name,true);
		$criteria->compare('photo_title',$this->photo_title,true);
		$criteria->compare('photo_desc',$this->photo_desc,true);
		$criteria->compare('photo_priority',$this->photo_priority);
        $criteria->compare('photo_category',$this->photo_category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
