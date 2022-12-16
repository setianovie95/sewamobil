<?php

class Profil extends CI_Controller
{
	public function index()
	{
		$this->rental_model->customer_login();
		$this->_rules();
		$id_customer 			= $this->session->userdata('id_customer');
		$data['customer'] = $this->rental_model->get_where(['id_customer' => $id_customer], 'customer')->row_array();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates_customer/header');
			$this->load->view('customer/profil', $data);
			$this->load->view('templates_customer/footer');
		} else {
			$nama			= $this->input->post('nama');
			$alamat			= $this->input->post('alamat');
			$gender			= $this->input->post('gender');
			$no_telepon		= $this->input->post('no_telepon');
			$no_ktp			= $this->input->post('no_ktp');

			$update = [
				'nama'      	=> $nama,
				'alamat'		=> $alamat,
				'gender'		=> $gender,
				'no_telp'		=> $no_telepon,
				'no_ktp'		=> $no_ktp,
			];

			$where = [
				'id_customer' => $id_customer
			];

			$this->rental_model->update_data('customer', $update, $where);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Update Profil Berhasil
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('customer/profil');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', "Nama", 'required');
		$this->form_validation->set_rules('alamat', "Alamat", 'required');
		$this->form_validation->set_rules('gender', "Gender", 'required');
		$this->form_validation->set_rules('no_telepon', "No. Telepon", 'required|numeric');
		$this->form_validation->set_rules('no_ktp', "No. KTP", 'required|numeric');
	}
}
