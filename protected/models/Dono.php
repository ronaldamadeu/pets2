<?php

/**
 * This is the model class for table "dono".
 *
 * The followings are the available columns in table 'dono':
 * @property integer $id
 * @property integer $id_facebook
 * @property string $nm
 * @property string $nm_email
 * @property string $dt_nascimento
 * @property string $nm_cidade
 * @property string $nm_estado
 */
class Dono extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dono the static model class
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
		return 'dono';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, id_facebook', 'numerical', 'integerOnly'=>true),
			array('nm, nm_email, nm_cidade, nm_estado', 'length', 'max'=>45),
			array('dt_nascimento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_facebook, nm, nm_email, dt_nascimento, nm_cidade, nm_estado', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'id_facebook' => 'Facebook ID',
			'nm' => 'Nome',
			'nm_email' => 'Email',
			'dt_nascimento' => 'Nascimento',
			'nm_cidade' => 'Cidade',
			'nm_estado' => 'Estado',
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
		$criteria->compare('id_facebook',$this->id_facebook);
		$criteria->compare('nm',$this->nm,true);
		$criteria->compare('nm_email',$this->nm_email,true);
		$criteria->compare('dt_nascimento',$this->dt_nascimento,true);
		$criteria->compare('nm_cidade',$this->nm_cidade,true);
		$criteria->compare('nm_estado',$this->nm_estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}