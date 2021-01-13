<?php

/**
 * This is the model class for table "tbl_post".
 *
 * The followings are the available columns in table 'tbl_post':
 * @property integer $post_id
 * @property string $title
 * @property string $content
 * @property integer $tags
 * @property integer $author
 * @property integer $date
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Users $author0
 * @property Tags $tags0
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'tbl_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required'),
			array('title', 'length', 'max'=>128),
			array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/',
			'message'=>'Tags só podem conter palavras.'),
			array('tags', 'normalizeTags');

			array('title', 'safe', 'on'=>'search'), 
		);
	}

	public function normalizeTags($attribute,$params){
    	$this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author'=> (array(self::BELONGS_TO, 'Users', 'author')),
			'comments'=> array(self::HAS_MANY, 'Comment', 'post_id',
				'condition'=>'comments.status='.Comment::STATUS_APROVED,
				'order'=>'comments.comn_date DESC'),
			'commentCount'=> array(self::STAT, 'Comment', 'post_id',
				'condition'=>'status='.Comment::STATUS_APROVED),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_id' => 'Post',
			'title' => 'Title',
			'content' => 'Content',
			'tags' => 'Tags',
			'author' => 'Author',
			'date' => 'Date',
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

		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags);
		$criteria->compare('author',$this->author);
		$criteria->compare('date',$this->date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}