<?php

class RepairForm extends CFormModel
{
	public $email;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
            array('email','required','message' => '{attribute} пусто'),
            array('email','email','message' => '{attribute} некорректный'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'email' => 'Email',
		);
	}
}
