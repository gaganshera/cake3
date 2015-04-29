<?php 
// plugins/Admin/src/Model/Table/UsersTable.php:
namespace Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AdminsTable extends Table
{
	public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
    	$validator
    	->notEmpty('email', 'Email cannot be empty')
		->notEmpty('username', 'Email cannot be empty')
		->notEmpty('password', 'Email cannot be empty')
    	->add('username', [
    		'unique' => [
    			'rule' => 'validateUnique',
    			'provider' => 'table',
    			'message' => 'Username is not unique.'
			]
	    ])
		->add('email', [
    		'unique' => [
    			'rule' => 'validateUnique',
    			'provider' => 'table',
    			'message' => 'Username is not unique.'
			]
	    ])
		->add('password', [
    		'unique' => [
    			'rule' => 'validateUnique',
    			'provider' => 'table',
    			'message' => 'Username is not unique.'
			],
			'minLength' => [
	            'rule' => ['minLength', 6],
	            'last' => true,
	            'message' => 'Password should be minimum of 6 characters.'
	        ],
	    ]);
        return $validator;
    }
}
?>