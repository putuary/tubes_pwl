<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		if (! $this->session->userdata('email')) redirect('Auth/login');
		$this->load->model('Kamar_model');
		$this->load->model('Transaksi_model');
	} 
	public function read()
	{
		
		if (! $this->session->userdata('akses')=='Admin') {
			$this->load->view('admin/index');
		}else{
			$data['trans']=$this->Transaksi_model->read();
			$data['error'] = '';
	        $data['result'] = $this->db->where('status','Pending')
	                                    ->get('transaksi')
	                                    ->result();
			$this->load->view('admin/transaksi/data1', $data);
		}
	}
	public function data()
	{
		if (! $this->session->userdata('akses')=='Admin') {
			$this->load->view('admin/index');
		}else{
			$data['trans']=$this->Transaksi_model->read();
			$data['error'] = '';
	        $data['result'] = $this->db->where('status','Confirm')
	                                    ->get('transaksi')
	                                    ->result();
			$this->load->view('admin/transaksi/data2', $data);
		}
	}

	public function add()
	{
		if (! $this->session->userdata('akses')=='Admin') {
			$this->load->view('admin/index');
		}else{
			$data['kamar']=$this->Kamar_model->read();
			$data['error'] = '';
	        $data['result'] = $this->db->order_by('id','ASC')
	                                    ->get('kamar')
	                                    ->result();
			$this->load->view('admin/transaksi/tambah', $data);
		}
	}

	public function tambah(){
		if (! $this->session->userdata('email')) redirect('Auth/login');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no = $this->input->post('no');
		$tgl_in = $this->input->post('tglin');
		$tgl_out = $this->input->post('tglout');
		$jenis = $this->input->post('jenis');
		$jumlah = $this->input->post('jumlah');
 		$status = $this->input->post('status');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'no' => $no,
			'tgl_in' => $tgl_in,
			'tgl_out' => $tgl_out,
			'jenis' => $jenis,
			'jumlah' => $jumlah,
			'status' => $status,
			);
		$this->Transaksi_model->input_data($data,'transaksi');
		$this->session->set_flashdata('msg', '<p style="color:green;">Anda berhasil melakukan transaksi!</p>');
		redirect('Transaksi/data',$data);
	}

	public function edit($id){
	    $this->db->set('status','Confirm');
		$this->db->where('id', $id);
		$this->db->update('transaksi');

		redirect('Transaksi/data',$data);
	}
}
