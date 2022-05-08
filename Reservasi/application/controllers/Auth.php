<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		
		parent:: __construct();
	    $this->load->model('Auth_model');
	    $this->load->model('Kamar_model');
	    $this->load->model('Transaksi_model');
	} 

	public function login()
	{
		 if ($this->session->userdata('email')) redirect('Welcome');
		if ($this->input->post('login')) 
		{
			$login=$this->Auth_model->getuser($this->input->post('email'));
			if ($login != NULL) {

				$data = array(
					'nama' 	=> $login->nama,
					'email' => $login->email,
					'no' 	=> $login->no,
					'akses'=> $login->akses,
					'gambar'=> $login->gambar
				);
				if ($this->input->post('no')==$login->no)
				{
					$this->session->set_userdata($data);
					redirect('Welcome');
				}
			}
			$this->session->set_flashdata('msg', '<p style="color:red;">Invalid Username or Password!</p>');
		}
			$this->load->view('login');
	}

	public function logout()
	{
	    $this->session->sess_destroy();
		redirect('welcome');
	}

	public function daftar()
	{
	    if ($this->input->post('daftar')) {
			$this->Auth_model->register();
			if($this->db->affected_rows() > 0){
        		$this->session->set_flashdata('msg', '<p style="color:green">Berhasil mendaftar</p>');
        	}else{
        		$this->session->set_flashdata('msg', '<p style="color:red;">Gagal mendaftar!</p>');
        	}
			$this->load->view('login');
		}
	}

	public function booking($id)
	{
		if (! $this->session->userdata('email')) redirect('Auth/login');
		$data['detail'] = $this->db->get_where('kamar',['id' => $id])->row();
		$this->load->view('user/booking', $data);
	}

	public function do_booking(){
		if (! $this->session->userdata('email')) redirect('Auth/login');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no = $this->input->post('no');
		$tgl_in = $this->input->post('tgl_in');
		$tgl_out = $this->input->post('tgl_out');
		$jenis = $this->input->post('jenis');
		$jumlah = $this->input->post('jumlah');
 
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'no' => $no,
			'tgl_in' => $tgl_in,
			'tgl_out' => $tgl_out,
			'jenis' => $jenis,
			'jumlah' => $jumlah,
			);
		$this->Auth_model->input_data($data,'transaksi');
		$this->session->set_flashdata('msg', '<p style="color:green;">Anda berhasil melakukan pemesanan!</p>');
		redirect('Auth/konfirmasi',$data);
	}

	public function konfirmasi()
	{
		if (! $this->session->userdata('email')) redirect('Auth/login');
		$data['trans'] = $this->db->get_where('transaksi',['no' => $this->session->userdata('no')])->row();
		$data['kamar'] = $this->Transaksi_model->getAllTrans();
		$this->load->view('user/konfirmasi', $data);
	}
}