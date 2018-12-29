<?php
 header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashborad_modal extends CI_Model {

public function __construct()
		{
			parent::__construct();
			
			if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header("Access-Control-Allow-Origin: *");
			//header("Access-Control-Allow-Origin: 'http://localhost:4200'");
			//header("Access-Control-Allow-Origin: 'http://192.168.100.11:4200'");
			
			
			header('Access-Control-Allow-Credentials: true');
			 header('Access-Control-Max-Age: 86400'); 
			}
			if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			exit(0);
			}
		}
	public function get_report($data)
	{
		$this->db->select('*');
		$this->db->from('report');
		$this->db->where('user_id',$data);
		return $this->db->get()->result_array();
	}
	public function get_report_admin()
	{
		$this->db->select('*');
		$this->db->from('report');
		return $this->db->get()->result_array();
	}
	public function gte_log_data()
	{
		$this->db->select('*');
		$this->db->from('logs');
		return $this->db->get()->result_array();
	}

	public function check_username($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		return $this->db->get()->num_rows();
	}

	public function check_stock($key,$value)
	{
			$this->db->select('*');
			$this->db->from('stock_level');
			$this->db->where('stock_name',$key);
			$this->db->where('quantity <',$value);
			return $this->db->get()->num_rows();
	}
	public function sub_stock($key,$value)
	{
	$this->db->set('quantity','quantity -'.$value.'',false);
		$this->db->where('stock_name',$key);
		 $this->db->update('stock_level');
	}

	public function get_report_email($userid)
	{
		$this->db->select('*');
		$this->db->from('report');
		$this->db->where('user_id',$userid);
		return $this->db->get()->result_array();
		
	}

	public function insertLogData($data)
	{
		$this->db->insert('logs',$data);
	}

	public function get_user_data()
	{
		return "abc";
		// $this->db->select('*');
		// $this->db->from('user');
		// return $this->db->get()->result_array();
	}
	public function get_all_users()
	{
		$this->db->select('*');
		$this->db->from('user');
		return $this->db->get()->result_array();
	}
	public function add_new_user($info)
	{
		return $this->db->insert('user',$info);
	}
	
	public function delete_user($user_id)
	{
		 $this->db->where('user_id',$user_id);
		return $this->db->delete('user');
	}
	public function update_password($info)
	{
		$this->db->where('user_id',$info['user_id']);
		$this->db->set('password',$info['password']);
		return $this->db->update('user');
	}
	public function update_report($info,$report_id)
	{
		
		unset($info['report_id']);
		$info['date']= Date('Y-m-d');
		$this->db->where('report_id',$report_id);
		return $this->db->update('report',$info);
	}
	public function update_stock($info)
	{
		$this->db->where('stock_id',$info['stock_id']);
		$this->db->set('stock_name',$info['stock_name']);
		$this->db->set('quantity',$info['quantity']);
		return $this->db->update('stock_level');
	}
	public function get_stock()
	{
		$this->db->select('*');
		$this->db->from('stock_level');
		return $this->db->get()->result_array();
	}
	public function add_new_location($info)
	{

		return $this->db->insert('location',$info);
	}
	public function get_all_location()
	{
		$this->db->select('*');
		$this->db->from('location');
		return $this->db->get()->result_array();
	}
	
	public function delete_country($loc_id)
	{
		 $this->db->where('loc_id',$loc_id);
		return $this->db->delete('location');
	}
	public function getcountrybyletter($letter)
	{
		
		// $this->db->select('*');
		// $this->db->from('location');
		// $this->db->like('country', $letter, 'after'); 
		// return $this->db->get()->result_array();
		
		
		$query=$this->db->query("select * FROM location WHERE country like '$letter%' ");
		// return $this->db->get()->result_array();
		// foreach ($query->result_array() as $row)
		// {
		   // echo $row['title'];
		   // echo $row['name'];
		   // echo $row['body'];
		// }
		//return $this->db->last_query();
		return $query->result_array();
		
	}
	
	public function getlocationsbyid($loc_id)
	{
		
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('loc_id',$loc_id);
		return $this->db->get()->result_array(); 
	}
	public function update_location($info)
	{
		$this->db->where('loc_id',$info['loc_id']);
		$this->db->set('locations',$info['locations']);
		return $this->db->update('location');
	}
	public function update_only_location($info)
	{
		
		$this->db->where('loc_id',$info['loc_id']);
		$this->db->set('locations',$info['locations']);
		return $this->db->update('location');
	}
	public function update_country($info)
	{
		
		$this->db->where('loc_id',$info['loc_id']);
		$this->db->set('locations',$info['locations']);
		$this->db->set('country',$info['country']);
		return $this->db->update('location');
	}
}

	