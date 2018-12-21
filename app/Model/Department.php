<?php

class Department extends AppModel {

	public $hasMany = [
		'Employee' => [
			'className' => 'Employee',
			'foreignKey' => 'department_id'
		]
	];

	public $validate = [
		'title' => [
			'rule' => 'notBlank'
		]
	];

}