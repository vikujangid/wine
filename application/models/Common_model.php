<?php
class Common_Model extends CI_Model
{
	function __construct()
	{
		global $URI, $CFG, $IN;
        $ci = get_instance(); 
        $ci->load->config('config');

		date_default_timezone_set('Asia/Kolkata'); 

		$this->user_id = $this->session->userdata('user_id');

		$this->db->where('id','1');
		$query = $this->db->get('tbl_website_settings');
		$row = $query->row();
		
		$this->setUserConfigData();
		$this->session->set_userdata('shop_id', $this->get_selected_shop_id());
	}
	function setUserConfigData()
	{
		if ($this->user_id) {
			$user = $this->_get_user($this->user_id);
			$this->config->set_item('first_name', $user->first_name);
			$this->config->set_item('username', $user->username);
			$this->config->set_item('email', $user->email);
		}
	}
	function get_selected_shop_id()
	{
		if($this->session->userdata('shop_id'))
			return $this->session->userdata('shop_id');
		
		$this->load->model('shops_model', 'shops');
		$shop = $this->shops->get_selected_shop();
		return $shop->id;
	}
	
	function _get_user($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('tbl_users');
		$result = $query->row();
		return $result;
	}
	function showLimitedText($string,$len) 
	{
		$string = strip_tags($string);
		if (strlen($string) > $len)
			$string = substr($string, 0, $len-3) . "...";
		return $string;
	}
	function createSlugForTable($app_title,$table)
	{
		$slug = url_title($app_title);
		$slug = strtolower($slug);
		$i = 0;
		$params = array ();
		$params['slug'] = $slug;
		while ($this->db->where($params)->get($table)->num_rows()) 
		{
			if (!preg_match ('/-{1}[0-9]+$/', $slug )) 
			{
				$slug .= '-' . ++$i;
			}
			else 
			{
				$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
			}
			$params ['slug'] = $slug;
		}
		$app_title=$slug;
		return $app_title;
	}
	function check_user_must_login()
	{
		if ($this->user_id) {
			return TRUE;
		
		} else {
			redirect('login');
		}
	}
	function checkRequestedDataExists($data)
	{
		if(!$data)
		{
			show_404();
		}
		return true;
	}
	function get_shops()
	{
		$this->load->model('shops_model', 'shops');
		$shops = $this->shops->get_records();
		return $shops;
	}
	function removeFilesByLocationAndName($pathurl,$file_name)
	{
		$this->load->helper('directory');
		$map = directory_map($pathurl);
		foreach($map as $key=>$val)
		{
			$imgarr=@explode('.',$file_name);
			if(substr_count($val,$imgarr[0]))
			{
			   unlink($pathurl.'/'.$val);
			}
		}
	}
	function deleteDir($dirPath) 
	{
	    if (! is_dir($dirPath)) {
	        throw new InvalidArgumentException("$dirPath must be a directory");
	    }
	    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
	        $dirPath .= '/';
	    }
	    $files = glob($dirPath . '*', GLOB_MARK);
	    foreach ($files as $file) {
	        if (is_dir($file)) {
	            self::deleteDir($file);
	        } else {
	            unlink($file);
	        }
	    }
	    rmdir($dirPath);
	}
}