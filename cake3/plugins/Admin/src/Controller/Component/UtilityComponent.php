<?php 
namespace Admin\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class UtilityComponent extends Component
{

/*
 * Purpose :- this function will create conditions for input data 
 * 
 * Inputs : $data - The data from which we need to create conditions   
 * 
 * Outputs : $conditions - condition array after iterating the data array
 * 
 * Returns : It will return condition from the data.
*/
    	public function create_conditions_by_keyword($keyword = '', $model_name = '', $fields = array())
    	{
    		if(count($fields) == 1)
			{
				$keyword_conditions = "{$model_name}.{$fields[0]} LIKE '%$keyword%'";
			} else
			{
				foreach($fields as $field)
				{
					$keyword_conditions['OR'][] = "{$model_name}.{$field} LIKE '%$keyword%'";
				}
			}
			return $keyword_conditions;
	    }
/*
 * Purpose :- this function will update the input data for given action 
 * 
 * Inputs : $data - The data which we need to update
 * 			$modelName = name of model for which we need to update data   
 * 
 * Outputs : $status - 1 if data updated , 0 if not updated
 * 
 * Returns : It will return status
*/		
	public function update_data_by_action($ids, $action, $model)
	{
		$objects = TableRegistry::get($model);
		switch ($action)
		{
			case 'deactive':
				$query = $objects->query();
				$status = $query->update()
				    ->set(['is_active' => false])
				    ->where(['id' => $ids])
				    ->execute();
				break;
			case 'active':
				$query = $objects->query();
				$status = $query->update()
				    ->set(['is_active' => true])
				    ->where(['id' => $ids])
				    ->execute();
				break;
			case 'delete':
				$query = $objects->query();
				$status = $query->delete()
				    ->where(['id' => $ids])
				    ->execute();
				break;
			default:
				$status = false;
				break;
		}
		return $status;
	}
/*
 * Purpose :- this function will check password for input string 
 * 
 * Returns : It will return hashed pwd from the data if true params
*/
	public function check_password($password, $hashed, $return_pwd = false)
	{
		$hasher = new DefaultPasswordHasher();
		$return = false;
		if($return_pwd)
		{
			if($hasher->check($password, $hashed))
			{
				$return = $hasher->hash($password);
			}
		} else
		{
			$return = $hasher->check($password, $hashed);
		}
		return $return;
    }
}

?>