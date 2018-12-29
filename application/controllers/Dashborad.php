<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashborad extends CI_Controller {

	/*
	public function __construct()
	{
		parent::__construct();
		//header('Access-Control-Allow-Origin: *');
		//header('Access-Control-Allow-Origin', 'http://localhost:4200');
		header('Access-Control-Allow-Credentials', 'true');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
     header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Max-Age: 1000');
      header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
      $this->load->model('Dashborad_modal');
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
	public function getLogData()
	{
		$data=$this->Dashborad_modal->gte_log_data();
		echo json_encode($data);
	}
	public function getUserData()
	{
		//echo json_encode("abcd");
		// $data=$this->Dashborad_modal->get_user_data();
		// echo json_encode($data);
		
	}
	public function get_all_users()
	{
		$data=$this->Dashborad_modal->get_all_users();
		echo json_encode($data);
		
	}
	public function update_password()
	{
		
			$data=json_decode(file_get_contents("php://input"));
			$data=(array)$data;
			$res=$this->Dashborad_modal->update_password($data);
			echo json_encode($res);
		
	}
	public function update_report()
	{
		
		
		$data=json_decode(file_get_contents("php://input"));
		$data=(array)$data;
		
			$res=$this->Dashborad_modal->update_report($data,$data['report_id']);
			echo json_encode($res);
		
	}
	public function update_stock()
	{
			$data=json_decode(file_get_contents("php://input"));
			$data=(array)$data;
			$res=$this->Dashborad_modal->update_stock($data);
			echo json_encode($res);
	}
	public function get_stock()
	{
			$res=$this->Dashborad_modal->get_stock();
			echo json_encode($res);
	}
	public function add_new_user()
	{
		$data=json_decode(file_get_contents("php://input"));
		
		$data=(array)$data;
		
		$info=array('username'=>$data['user_name'],'role'=>$data['role'],'password'=>$data['password']);
		
		$res=$this->Dashborad_modal->add_new_user($info);
		  echo json_encode($res);
		
	}
	public function add_new_location()
	{
		$data1=json_decode(file_get_contents("php://input"));
		
		$data1=(array)$data1;
		//echo json_encode($data1);
		//$data=@$data1['addresses'][0]; //for  2nd add/remove 
		$data=@$data1;

		
		$data['locations']=serialize($data['locations']);
		//$data->locations=serialize($data->locations); //for  2nd add/remove 
		$res=$this->Dashborad_modal->add_new_location($data);
		  echo json_encode($res);
		
	}
	public function delete_user()
	{
		$userid=json_decode(file_get_contents("php://input"));
		$res=$this->Dashborad_modal->delete_user($userid);
		echo json_encode($res);
		
	}
	public function delete_country()
	{
		$userid=json_decode(file_get_contents("php://input"));
		$res=$this->Dashborad_modal->delete_country($userid);
		echo json_encode($res);
		
	}
	public function get_all_location()
	{
		$res=$this->Dashborad_modal->get_all_location();
			if(count($res)>0)
			{
				for($i=0;$i<count($res);$i++){
					$res[$i]['locations']=unserialize($res[$i]['locations']);
				}
				echo json_encode($res);
			}else
		echo json_encode($res);
		
	}
	public function getcountrybyletter1()
	{
		$data=json_decode(file_get_contents("php://input"));
		$data=(array)$data;
		$res=$this->Dashborad_modal->getcountrybyletter($data['letter']);
		echo json_encode($res);
		
	}
	public function getlocationsbyid()
	{
		
		$data=json_decode(file_get_contents("php://input"));
		
		$res=$this->Dashborad_modal->getlocationsbyid($data);
		
		$is_location = @unserialize($res[0]['locations']);
		if(count($res)>0&&$is_location!=false){ 
		$res[0]['locations']=unserialize($res[0]['locations']);
		echo json_encode($res); 
		}
	else
		echo json_encode(array()); 
		
	}
	
	public function update_location()
	{
		
			$data=json_decode(file_get_contents("php://input"));
			$data=(array)$data;
			 
			$edit_loca_id=$data['edit_loca_id'];//index of location
			$this->db->select('locations');
			$this->db->from('location');
			$this->db->where('loc_id',$data['edit_country']);
			$result=$this->db->get()->result_array()[0];
			
			//Appending new location address
				$locations=unserialize($result['locations']);
				$locations[$edit_loca_id]->street=$data['edit_location_desc'];
				$new_locations=serialize($locations);
				$info=array('loc_id'=>$data['edit_country'],'locations'=>$new_locations);
				$res=$this->Dashborad_modal->update_location($info);
				echo json_encode($res);
		
	} 
	public function checkUsername()
	{
		$data=file_get_contents("php://input");
		$data=json_decode($data,true);
			
		$username=$data['user_name'];
	
			$query=$this->Dashborad_modal->check_username($username);
			echo json_decode($query);
	}
	/*public function add_new_loc_c json_decode(file_get_contents("php://input"));
			$data=(array)$data;
			 // echo json_encode($data); 
			// exit;
			$this->db->select('locations');
			$this->db->from('location');
			$this->db->where('loc_id',$data['loc_id']);
			$result=$this->db->get()->result_array();
			// echo json_encode($result);
			// exit;
			//Appending new location address
			$count=count($result);
			$locations=array();
			if($count>0){
				$rescnt=unserialize($result[0]['locations']);
			}
					if($count>0&&$rescnt>0){
				$locations=unserialize($result[0]['locations']);
					$arrayname['street'] = $data['loc_desc'];
					array_push($locations,$arrayname);
				
				$new_locations=serialize($locations);
				$info=array('loc_id'=>$data['loc_id'],'locations'=>$new_locations);
				}else{
					$arrayname['street'] = $data['loc_desc'];
					array_push($locations,$arrayname);
					$new_locations=serialize($locations);
					$info=array('loc_id'=>$data['loc_id'],'locations'=>$new_locations);
				}
				$res=$this->Dashborad_modal->update_only_location($info);
				echo json_encode($res);
		
	}*/
	public function delete_location()
	{
		$data=json_decode(file_get_contents("php://input"));
			$data=(array)$data;
		
			$edit_loca_id=$data['loc_id'];//index of location
			$this->db->select('locations');
			$this->db->from('location');
			$this->db->where('loc_id',$data['country_id']);
			$result=$this->db->get()->result_array()[0];
			
			//Appending new location address
				$locations=unserialize($result['locations']);
				//$locations[$edit_loca_id]->street=$data['edit_location_desc'];
				unset($locations[$edit_loca_id]);
				$new_locations=serialize($locations);
			
				$info=array('loc_id'=>$data['country_id'],'locations'=>$new_locations);
				$res=$this->Dashborad_modal->update_location($info);
				echo json_encode($res);
				
				
		
	}
	public function update_country()
	{
		$data=json_decode(file_get_contents("php://input"));
		
		$data=(array)$data;
		$data['locations']=serialize($data['locations']);
		$res=$this->Dashborad_modal->update_country($data);
		  echo json_encode($res);
		
	}

	public function saveOrderData()
	{
		$data=(array)json_decode(file_get_contents("php://input"));
		 $location=$data['street'];
		 $user_name=$data['user_name'];
		 $country_id=$data['country_id'];
		 $userid=$data['user_id'];
		$key=$data['allinfo'][0]->key;
		$value=$data['allinfo'][0]->value;
		$key1=@$data['allinfo'][1]->key;
		$value1=@$data['allinfo'][1]->value;
		if($value!='')
		{
		$alldata=array('user_id'=>$userid,'country_id'=>$country_id,'location'=> $location,'form_type'=>$key,'quntity_box'=>$value,'quntity_forms'=>$value*400,'date'=>Date('Y-m-d'));
		
		$getdata=$this->Dashborad_modal->sub_stock($key,$value);

		$data_log=array('date'=>Date('Y-m-d'),'user'=>$user_name,'content'=>$key.' '. 'Forms Ordered ');
		$this->Dashborad_modal->insertLogData($data_log);
			$id=$this->db->insert('report',$alldata);
		echo $id;
		}

		if($value1!='')
		{
			$getdata=$this->Dashborad_modal->sub_stock($key1,$value1);
			$data_log=array('date'=>Date('Y-m-d'),'user'=>$user_name,'content'=>$key1.' '. 'Forms Ordered ');;
			$this->Dashborad_modal->insertLogData($data_log);
			$alldata=array('user_id'=>$userid,'country_id'=>$country_id,'location'=> $location,'form_type'=>$key1,'quntity_box'=>$value1,'quntity_forms'=>$value1*400,'date'=>Date('Y-m-d'));
		$id=$this->db->insert('report',$alldata);
		}
	}

	public function getReportData()
	{
		$data=json_decode(file_get_contents("php://input"));
		if($data!='0')
		{
			$query=$this->Dashborad_modal->get_report($data);
		echo json_encode($query);
		}else{
			$query=$this->Dashborad_modal->get_report_admin();
		echo json_encode($query);
		}
		
	}

	public function checkStockData()
	{
		$data=(array)json_decode(file_get_contents("php://input"));
		$key=$data['allinfo'][0]->key;
		$value=$data['allinfo'][0]->value;
		$key1=@$data['allinfo'][1]->key;
		$value1=@$data['allinfo'][1]->value;
		$query=$this->Dashborad_modal->check_stock($key,$value);
		$query1=0;
		if($value1!='')
		{
			$query1=$this->Dashborad_modal->check_stock($key1,$value1);
		    //echo json_encode($query);
		}
		
			if($query==1 && $query1==1)
			{
				$result=$key.' '. 'AND'.' '. $key1 .' '.'Boxes Not Avilable';
			}

			if($query==1 && $query1==0)
			{
				$result=$key. ' ' .'Boxes Not Avilable';
			}

			if($query==0 && $query1==1)
			{
				$result=$key1. ' ' .'Boxes Not Avilable';
			}

			if($query==0 && $query1==0)
			{
				$result=1;
			}
			
		echo json_encode($result);


	}
	

	public function sendMail()
	{
		$data=(array)json_decode(file_get_contents("php://input"));
		$email=$data['email'];
		$userid=$data['user_id'];
		$query=$this->Dashborad_modal->get_report_email($userid);
		
		if($query !='')
		{

		$html='';
		$html.='<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
	<body>
		<table style="width:100%; border: 1px solid black; border-collapse: collapse;font-family:arial;">
		  <tr style="background-color:#efa809;color:#fff">
			<th style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">Date</th>
			<th style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">User Id</th>
			<th style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">Location</th>
			<th style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">Form Type</th>
			<th style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">Quantity (Box)</th>
			<th style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">Quantity (Forms)</th>
		  </tr>
		  '; 
		  foreach ($query as $report) {
		  	
		$html.= '<tr>
			<td style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">'.$report['date'].'</td>
			<td style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">'.$report['user_id'].'</td>
			<td style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">'.$report['location'].'</td>
			<td style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">'.$report['form_type'].'</td>
			<td style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">'.$report['quntity_box'].'</td>
			<td style=" border: 1px solid black; border-collapse: collapse;padding: 5px;text-align: left; ">'.$report['quntity_forms'].'</td>
		  </tr>';
		}

		$html.='</table>
	</body>
</html>';
	$message= $html;
	 	$subject='Report';
	 	$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'husenshikalgar007@gmail.com', 
            'smtp_pass' => '9561840980',//my valid email password
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
                  );

		$this->email->initialize($config);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");  
		$this->email->from('husenshikalgar007@gmail.com');
              //$this->email->to($emial_id[0]['email']); // user Emial to who perches the Sticker
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message); 
	    $this->email->send();
	    echo json_encode('Mail send successfully');
	}else{
		echo json_encode('No Records');
	}


		
	}
	
}