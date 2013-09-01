<?php

/**
 * This is the model class for table "pet".
 *
 * The followings are the available columns in table 'pet':
 * @property integer $id
 * @property integer $dono_id
 * @property integer $raca_id
 * @property integer $tipo_id
 * @property integer $bn_sexo
 * @property integer $bn_pedigri
 * @property string $dt_nascimento
 * @property string $nm
 * @property string $mensagem
 */
class Pet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pet the static model class
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
		return 'pet';
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
			array('id, dono_id, raca_id, tipo_id, bn_sexo, bn_pedigri', 'numerical', 'integerOnly'=>true),
			array('nm, mensagem', 'length', 'max'=>45),
			array('dt_nascimento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dono_id, raca_id, tipo_id, bn_sexo, bn_pedigri, dt_nascimento, nm, mensagem', 'safe', 'on'=>'search'),
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
			'dono_id' => 'Dono',
			'raca_id' => 'Raca',
			'tipo_id' => 'Tipo',
			'bn_sexo' => 'Bn Sexo',
			'bn_pedigri' => 'Bn Pedigri',
			'dt_nascimento' => 'Dt Nascimento',
			'nm' => 'Nm',
			'mensagem' => 'Mensagem',
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
		$criteria->compare('dono_id',$this->dono_id);
		$criteria->compare('raca_id',$this->raca_id);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('bn_sexo',$this->bn_sexo);
		$criteria->compare('bn_pedigri',$this->bn_pedigri);
		$criteria->compare('dt_nascimento',$this->dt_nascimento,true);
		$criteria->compare('nm',$this->nm,true);
		$criteria->compare('mensagem',$this->mensagem,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}