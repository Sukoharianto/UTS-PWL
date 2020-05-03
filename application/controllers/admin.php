<?php
	class admin extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('model_admin');
			if($this->session->userdata('status')!='login'){
				redirect('login');
			}
		}
		function page(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='home';
			}
			$data['page']=$page;
			if($page=='s_masuk'){
				$data['tamp_sm']=$this->model_admin->s_masuk()->result();
				$this->load->view('index',$data);
			}elseif($page=='f_sm'){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['value']='Simpan';
					$data['judul']='Input Surat Masuk';
					$data['open']='admin/simpan_sm';
					$data['hid']='hidden';
				}else{
					$data['status']='edit';
					$data['value']='Edit';
					$data['judul']='Edit Surat Masuk';
					$data['open']='admin/edit_sm';
					$data['hid']='';
					$data['hsl']=$this->model_admin->qw("surat_masuk","WHERE ID_SM= '$yy'");
				}
				$this->load->view('index',$data);
			}elseif($page=='s_keluar'){
				$data['tamp_sk']=$this->model_admin->s_keluar()->result();
				$this->load->view('index',$data);
			}elseif($page=='s_fm'){
				$data['tamp_fm']=$this->model_admin->s_fm()->result();
				$this->load->view('index',$data);
			}elseif($page=='s_fk'){
				$data['tamp_fk']=$this->model_admin->s_fk()->result();
				$this->load->view('index',$data);
			}elseif($page=='f_sk'){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['value']='Simpan';
					$data['judul']='Input Surat Keluar';
					$data['open']='admin/simpan_sk';
					$data['hid']='hidden';
				}else{
					$data['status']='edit';
					$data['hid']='';
					$data['value']='Edit';
					$data['judul']='Edit Surat Keluar';
					$data['open']='admin/edit_sk';
					$data['hsl']=$this->model_admin->qw("surat_keluar","WHERE ID_SK= '$yy'");
				}
				$this->load->view('index',$data);
			}elseif($page=='f_fm'){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['value']='Simpan';
					$data['judul']='Input Fax Masuk';
					$data['open']='admin/simpan_fm';
					$data['hid']='hidden';
				}else{
					$data['status']='edit';
					$data['hid']='';
					$data['value']='Edit';
					$data['judul']='Edit Fax Masuk';
					$data['open']='admin/edit_fm';
					$data['hsl']=$this->model_admin->qw("fax_masuk","WHERE ID_FM= '$yy'");
				}
				$this->load->view('index',$data);
			}elseif($page=='f_fk'){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['value']='Simpan';
					$data['judul']='Input Fax Keluar';
					$data['open']='admin/simpan_fk';
					$data['hid']='hidden';
				}else{
					$data['status']='edit';
					$data['hid']='';
					$data['value']='Edit';
					$data['judul']='Edit Fax Keluar';
					$data['open']='admin/edit_fk';
					$data['hsl']=$this->model_admin->qw("fax_keluar","WHERE ID_FK= '$yy'");
				}
				$this->load->view('index',$data);
			}else{
				$this->load->view('index',$data);	
			}
		}

		function simpan_sm(){
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
					$ary=array(
					'Tgl_Agenda'	=>$this->input->post('Tgl_Agenda'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'Asal_Surat'	=>$this->input->post('Asal_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Tujuan'	=>$this->input->post('Tujuan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->simpan_sm('surat_masuk',$ary);
					redirect('admin/page/s_masuk');
		}
		function edit_sm(){
			$filename=$_FILES['foto']['name'];
			if(empty($filename)){
					$id=$this->input->post('id');
					$ary=array(
					'Tgl_Agenda'	=>$this->input->post('Tgl_Agenda'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'Asal_Surat'	=>$this->input->post('Asal_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Tujuan'	=>$this->input->post('Tujuan')
					);
					$this->model_admin->edit_sm('surat_masuk',$id,$ary);
					redirect('admin/page/s_masuk');
			}else{
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
				$id=$this->input->post('id');
				$this->db->where('ID_SM',$id);
				$query=$this->db->get('surat_masuk');
				$row=$query->row();
				unlink("./assets/gambar/$row->Upload");
					$ary=array(
					'Tgl_Agenda'	=>$this->input->post('Tgl_Agenda'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'Asal_Surat'	=>$this->input->post('Asal_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Tujuan'	=>$this->input->post('Tujuan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->edit_sm('surat_masuk',$id,$ary);
					redirect('admin/page/s_masuk');
			}

		}
		function hapus_sm($id){
			$this->db->where('ID_SM',$id);
			$query=$this->db->get('surat_masuk');
			$row=$query->row();
			unlink("./assets/gambar/$row->Upload");
			$this->model_admin->hapus_sm('surat_masuk',$id);
			redirect('admin/page/s_masuk');
		}
		function simpan_sk(){
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
					$ary=array(
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tujuan_Surat'	=>$this->input->post('Tujuan_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Keterangan'	=>$this->input->post('Keterangan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->simpan_sk('surat_keluar',$ary);
					redirect('admin/page/s_keluar');
		}
		function edit_sk(){
			$filename=$_FILES['foto']['name'];
			if(empty($filename)){
					$id=$this->input->post('id');
					$ary=array(
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tujuan_Surat'	=>$this->input->post('Tujuan_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Keterangan'	=>$this->input->post('Keterangan')
					);
					$this->model_admin->edit_sk('surat_keluar',$id,$ary);
					redirect('admin/page/s_keluar');
			}else{
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
				$id=$this->input->post('id');
				$this->db->where('ID_SK',$id);
				$query=$this->db->get('surat_keluar');
				$row=$query->row();
				unlink("./assets/gambar/$row->Upload");
					$ary=array(
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tujuan_Surat'	=>$this->input->post('Tujuan_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Keterangan'	=>$this->input->post('Keterangan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->edit_sk('surat_keluar',$id,$ary);
					redirect('admin/page/s_keluar');
			}

		}
		function hapus_sk($id){
			$this->db->where('ID_SK',$id);
			$query=$this->db->get('surat_keluar');
			$row=$query->row();
			unlink("./assets/gambar/$row->Upload");
			$this->model_admin->hapus_sk('surat_keluar',$id);
			redirect('admin/page/s_keluar');
		}

		function simpan_fm(){
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
					$ary=array(
					'Tgl_Agenda'	=>$this->input->post('Tgl_Agenda'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'Asal_Surat'	=>$this->input->post('Asal_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Tujuan'	=>$this->input->post('Tujuan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->simpan_fm('fax_masuk',$ary);
					redirect('admin/page/s_fm');
		}
		function edit_fm(){
			$filename=$_FILES['foto']['name'];
			if(empty($filename)){
					$id=$this->input->post('id');
					$ary=array(
					'Tgl_Agenda'	=>$this->input->post('Tgl_Agenda'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'Asal_Surat'	=>$this->input->post('Asal_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Tujuan'	=>$this->input->post('Tujuan')
					);
					$this->model_admin->edit_fm('fax_masuk',$id,$ary);
					redirect('admin/page/s_fm');
			}else{
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
				$id=$this->input->post('id');
				$this->db->where('ID_FM',$id);
				$query=$this->db->get('fax_masuk');
				$row=$query->row();
				unlink("./assets/gambar/$row->Upload");
					$ary=array(
					'Tgl_Agenda'	=>$this->input->post('Tgl_Agenda'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'Asal_Surat'	=>$this->input->post('Asal_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Tujuan'	=>$this->input->post('Tujuan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->edit_fm('fax_masuk',$id,$ary);
					redirect('admin/page/s_fm');
			}

		}
		function hapus_fm($id){
			$this->db->where('ID_FM',$id);
			$query=$this->db->get('fax_masuk');
			$row=$query->row();
			unlink("./assets/gambar/$row->Upload");
			$this->model_admin->hapus_fm('fax_masuk',$id);
			redirect('admin/page/s_fm');
		}
		function simpan_fk(){
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
					$ary=array(
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tujuan_Surat'	=>$this->input->post('Tujuan_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Keterangan'	=>$this->input->post('Keterangan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->simpan_fk('fax_keluar',$ary);
					redirect('admin/page/s_fk');
		}
		function edit_fk(){
			$filename=$_FILES['foto']['name'];
			if(empty($filename)){
					$id=$this->input->post('id');
					$ary=array(
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tujuan_Surat'	=>$this->input->post('Tujuan_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Keterangan'	=>$this->input->post('Keterangan')
					);
					$this->model_admin->edit_fk('fax_keluar',$id,$ary);
					redirect('admin/page/s_fk');
			}else{
				$config['upload_path']='assets/gambar';
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='3000';
				$config['encrypt_name']=true;
				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$data=$this->upload->data();
				$gambar=$data['file_name'];
				$id=$this->input->post('id');
				$this->db->where('ID_FK',$id);
				$query=$this->db->get('fax_keluar');
				$row=$query->row();
				unlink("./assets/gambar/$row->Upload");
					$ary=array(
					'Tgl_Surat'	=>$this->input->post('Tgl_Surat'),
					'No_Surat'	=>$this->input->post('No_Surat'),
					'Tujuan_Surat'	=>$this->input->post('Tujuan_Surat'),
					'Perihal'	=>$this->input->post('Perihal'),
					'Disposisi_GM'	=>$this->input->post('Disposisi_GM'),
					'Keterangan'	=>$this->input->post('Keterangan'),
					'Upload'	=>$gambar
					);
					$this->model_admin->edit_fk('fax_keluar',$id,$ary);
					redirect('admin/page/s_fk');
			}

		}
		function hapus_fk($id){
			$this->db->where('ID_FK',$id);
			$query=$this->db->get('fax_keluar');
			$row=$query->row();
			unlink("./assets/gambar/$row->Upload");
			$this->model_admin->hapus_fk('fax_keluar',$id);
			redirect('admin/page/s_fk');
		}
	}
?>