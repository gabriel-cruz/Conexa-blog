<?php

/**
 * This is the model class for table "tbl_comment".
 *
 * The followings are the available columns in table 'tbl_comment':
 * @property integer $comn_id
 * @property string $comn_content
 * @property string $author
 * @property integer $post
 * @property integer $comn_date
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Post $post0
 */
class Comment extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
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
		return 'tbl_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comn_content, author', 'required'),
			array('author, url', 'length', 'max'=>128),
			array('url', 'url',)
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
			'post0' => array(self::BELONGS_TO, 'Post', 'post'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comn_id' => 'Id',
			'comn_content' => 'Comentário',
			'author' => 'Nome',
			'post' => 'Post',
			'comn_date' => 'Create Time',
			'url'=> 'Website',
		);
	}

	public function getUrl($post=null)
	{
		if($post===null)
			$post=$this->post;
		return $post->url.'#c'.$this->comn_id;
	}

	public function getAuthorLink()
	{
		if(!empty($this->url))
			return CHtml::link(CHtml::encode($this->author),$this->url);
		else
			return CHtml::encode($this->author);
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

		$criteria->compare('comn_id',$this->comn_id);
		$criteria->compare('comn_content',$this->comn_content,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('post',$this->post);
		$criteria->compare('comn_date',$this->comn_date);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave(){
		if(parent::beforeSave()){
			
			if($this->isNewRecord){
				$this->comn_date=time();
			}

			return true;
		}

		else{
			return false;
		}
	}
}