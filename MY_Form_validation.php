<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * MY Form Validation Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Validation
 * @author		Tiago M. Vanderlei
 */
class MY_Form_validation extends CI_Form_validation {

	/**
	 * Constructor
	 */
	public function __construct($rules = array())
	{
		parent::__construct($rules = array());
	}
	
	/** validate data * *
	* Validate all data 
	* @access public
	* @return array
	*/
	public function validate_data($rules)
	{
		$return = array();
		
		$this->set_rules($rules);
	  
  		if (FALSE === $this->run()) 
  		{
			$return['status'] = 0; //invalid
			$return['errors'] = $this->error_string();
			$return['data'] = NULL;
		}
		else
		{
			$return['status'] = 1; //valid
			$return['errors'] = NULL;
			$return['data']   = $this->get_value_array();
			
		}
		return $return;
	}
	
	/** get value array * *
	* return array with all values validate   
	* @access public
	* @return array
	*/
	function get_value_array($field = '', $default = '')
	{
		$return = array();	
		
		foreach	($this->_field_data as $key => $value)
		{
			$return[$key] = $value['postdata'];
		}
		
		return $return;
	}
	
	
}
// END Form Validation Class

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */