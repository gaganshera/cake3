<?php
namespace Admin\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Admin\Controller\AppController;

/**
 * Admins Controller
 *
 * @property \Admin\Model\Table\AdminsTable $Admins
 */
class AdminsController extends AppController
{

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Admin.Utility');
    }
	
	public function beforeFilter(Event $event)
	{
	    parent::beforeFilter($event);
		$this->Auth->config('authenticate', [
		    'Form' => [
		    	'userModel' => 'Admins',
		    	'scope' => ['Admins.is_active' => 1]
	    	]
		]);
	    // Allow users to register and logout.
	    // You should not add the "login" action to allow list. Doing so would
	    // cause problems with normal functioning of AuthComponent.
	    $this->Auth->allow(['add', 'logout']);
	}
	
	public function login()
	{
	    if ($this->request->is('post')) {
	        $admin = $this->Auth->identify();
	        if ($admin) {
	            $this->Auth->setUser($admin);
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Flash->error(__('Invalid username or password, try again'));
	    }
	}
	
	public function logout()
	{
	    return $this->redirect($this->Auth->logout());
	}

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
    	//This section handles multipe delete and change status
    	if ($this->request->is('post'))
		{
			if(!isset($this->request->data['ids']) || empty($this->request->data['ids']))
			{
				$this->Flash->error(__('Please Select the rows.'));
			} else
			{
				$status = $this->Utility->update_data_by_action($this->request->data, $this->request->data['option'], 'Admins');
				if($status)
				{
					$action = $this->request->data['Admin']['action'];
					$this->Flash->success(__('The action ' . $action. ' has been performed.'));
				} else
				{
					$this->Flash->error(__('The ' . $action. ' couldnot be performed.'));
				}
			}
			$this->redirect(array('action' => 'index'));
		}
		//This section handles multipe delete and change status
    	if (!empty($this->request->query))
		{
			$filter_column = $this->request->query['filter'];
			$keyword = $this->request->query['search_keyword'];
			if(!empty($filter_column) && !empty($keyword))
			{
				$conditions = $this->Utility->create_conditions_by_keyword($keyword, 'Admins', array($filter_column));
				$this->paginate = array(
					'conditions' => $conditions 
				);
			}
		}
        $this->set('admins', $this->paginate($this->Admins));
        $this->set('_serialize', ['admins']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);
        $this->set('admin', $admin);
        $this->set('_serialize', ['admin']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admin = $this->Admins->newEntity();
        if ($this->request->is('post')) {
            $admin = $this->Admins->patchEntity($admin, $this->request->data);
            if ($this->Admins->save($admin)) {
                $this->Flash->success('The admin has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The admin could not be saved. Please, try again.');
            }
        }
		$this->set('admin_status',	Configure::read('admin_status'));
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        	if(empty($this->request->data['User']['password']))
			{
				unset($this->request->data['User']['password']);
			}
            $admin = $this->Admins->patchEntity($admin, $this->request->data);
            if ($this->Admins->save($admin)) {
                $this->Flash->success('The admin has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The admin could not be saved. Please, try again.');
            }
        }
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
    }

	    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function change_pwd()
    {
		if ($this->request->is('post'))
		{
			$oldpwd = $this->request->data['old_password'];
			$adminsTable = TableRegistry::get('Admins');
			$admin = $adminsTable->get($this->Auth->user('id'));
			if(!empty($admin))
			{
				if($retun_pwd = $this->Utility->check_password($oldpwd, $admin->password, true))
				{
					if($this->request->data['password'] != $this->request->data['compare_password'])
					{
						 $this->Flash->error("New password and confirm password doesn't match.");
					} else
					{
						$admin->password = $retun_pwd;
						if($adminsTable->save($admin)) 
						{
							$this->Flash->success("Password has been changed successfully");
						} else
						{
							$this->Flash->error("Password couldnot be changed. Please try again");
						}
					}
				} else
				{
					$this->Flash->error("Old Password is incorrect.");
				}
			} else 
			{
				$this->Flash->error("Invalid User.");
			}
			$this->redirect($this->referer());
		}
    }
    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admins->get($id);
        if ($this->Admins->delete($admin)) {
            $this->Flash->success('The admin has been deleted.');
        } else {
            $this->Flash->error('The admin could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
