<?php
	class login extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('model_login');
		}
		function index(){
			if($this->session->userdata('status') =='login'){
				redirect('admin/page');	
			}
			$this->load->view('login');
		}
		function aksi_login(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$where=array(
					'Username' =>$username,
					'Password' =>$password
				);
			$cek=$this->model_login->cek_login('login',$where)->num_rows();
			$query=$this->db->where('Username',$username)->get('login');
			$row=$query->row();
			if($cek > 0){
				$data_session=array(
					'nama'	=>$username,
					'status' => 'login',
					);
				$this->session->set_userdata($data_session);
				redirect('admin/page');
			}else{
				echo"<script>alert('Ussername dan password salah !')</script>";
				redirect('login');
			}

		}
		function logout(){
				$this->session->sess_destroy();
				redirect('login');
			}
	}
?>