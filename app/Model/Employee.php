<?php

class Employee extends AppModel {

	public $belongsTo = [
		'Department' => [
			'className' => 'Department',
			'foreignKey' => 'department_id'
		]
	];

	public $validate = [
		'name' => [
			'rule' => 'notBlank'
		],
		'email' => [
			'rule' => 'notBlank'
		]
	];

}