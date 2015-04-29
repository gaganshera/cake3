<?php

namespace Admin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public function initialize()
	{
	    $this->loadComponent('Flash');
	    $this->loadComponent('Auth', [
	    	'loginAction' => [
	        	'plugin' => 'Admin',
	            'controller' => 'Admins',
	            'action' => 'login'
	        ],
	        'loginRedirect' => [
	        	'plugin' => 'Admin',
	            'controller' => 'Admins',
	            'action' => 'index'
	        ],
	        'logoutRedirect' => [
	        	'plugin' => 'Admin',
	            'controller' => 'Admins',
	            'action' => 'login',
	        ]
	    ]);
	}
}
