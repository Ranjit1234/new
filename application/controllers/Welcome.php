<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*
	public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Max-Age: 1000');
      header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

      //	 header("Access-Control-Allow-Methods: GET");
	}*/
	public function __construct()
		{
			parent::__construct();
			if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
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
			 $this->load->model('Dashborad_modal');
		}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login()
	{
 

		$info = file_get_contents("php://input");
		$json = json_decode($info, true);	
		$username=$json['userName'];
		$password=$json['password'];
		$validate=array('username'=>$username,'password'=>$password);
		$this->db->select("*");
		$this->db->from("user"); 
		$this->db->where($validate);
		$res=$this->db->get()->result_array();
		if(count($res)>0)
		{
			$data=array('date'=>Date('Y-m-d'),'user'=>$json['userName'],'content'=>'Login User');
			$this->Dashborad_modal->insertLogData($data);
			echo json_encode($res);
		}else{
			echo json_encode("no");
		}
		/*if($username=='ranjit')
		{
			echo json_encode("yes");
		}else{
			echo json_encode("no");
		}*/

		 // $username=json_decode($info);
		 // echo json_encode($username['userName']);
	}
}
