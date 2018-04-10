<?php  if ( ! defined('SYS_ROOT')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.3.1
 * @filesource
 */

// ------------------------------------------------------------------------

require_once SYS_ROOT.'class/Smarty/SmartyBC.class.php';

/**
 * Smarty Class
 *
 * Lets you use smarty engine in CodeIgniter.
 *
 * @package		Application
 * @subpackage	Libraries
 * @category	Customize Class
 * @author		sitearth
 * @link		blog.sitearth.com
 */
class MySmarty extends SmartyBC {
	
	/**
	 * Smarty constructor
	 *
	 * The constructor runs the session routines automatically
	 * whenever the class is instantiated.
	 */
	public function __construct($path='')
	{
		parent::__construct();
		
		$this->template_dir = SYS_ROOT . $path.'/templates/';
		$this->compile_dir = SYS_ROOT . $path.'/templates_c/';
		//$this->config_dir = '';
		//$this->cache_dir = '';
		$this->caching = false;
		//$this->cache_lifetime = ;
		//$this->debugging = true;
		$this->left_delimiter = '{*';
		$this->right_delimiter = '*}';
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * An encapsulation of display method in smarty class
	 * 
	 * @access	public
	 * @param	string
	 * @param   array
	 * @return	void
	 */
	public function view($template_file, $assigns = array())
	{
		if (strpos($template_file, '.') === false)
		{
			$template_file .= '.html';
		}
		
		if ( ! is_file($this->template_dir . '/' . $template_file)) {
			echo("Smarty error: {$template_file} cannot be found.");
			exit;
		}

		if (is_array($assigns) && !empty($assigns))
		{
			foreach ($assigns as $key => $value)
				$this->assign($key, $value);
		}
		
		$this->display($template_file);
		exit();
	}

	// --------------------------------------------------------------------
	
	/**
	 * An encapsulation of fetch method in smarty class
	 * 
	 * @access	public
	 * @param	string
	 * @param   array
	 * @return	string
	 */
	public function get($template_file, $assigns = array())
	{
		if (strpos($template_file, '.') === false)
		{
			$template_file .= '.html';
		}
		
		if ( ! is_file($this->template_dir . '/' . $template_file)) {
			echo("Smarty error: {$template_file} cannot be found.");
			exit;
		}

		if (is_array($assigns) && !empty($assigns))
		{
			foreach ($assigns as $key => $value)
				$this->assign($key, $value);
		}
		
		return $this->fetch($template_file);
	}

}
/* End of file Smarty.php */
/* Location: ./application/libraries/Smarty.php */