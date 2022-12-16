<?php

	class Rental_model extends CI_Model{
		public function get_data($table){
			return $this->db->get($table);
		}

		public function get_where($where, $table){
			return $this->db->get_where($table, $where);
		}

		public function insert_data($data, $table){
			$this->db->insert($table, $data);
		}

		public function update_data($table, $data, $where){
			$this->db->update($table, $data, $where);
		}		

		public function delete_data($where, $table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function ambil_id_mobil($id){
			$hasil = $this->db->where('id_mobil',$id)->get('mobil');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			}else{
				return false;
			}
		}

		public function cek_login(){
			$username = set_value('username');
			$password = set_value('password');

			$result = $this->db
							->where('username',$username)
							->where('password',md5($password))
							->limit(1)
							->get('customer');

			if($result->num_rows() > 0){
				return $result->row();
			}else{
				return FALSE;
			}
		}

		public function update_password($where, $data, $table){
			$this->db->where($where);
			$this->db->update($table,$data);
		
		}

		public function downloadPembayaran($id){
			$query = $this->db->get_where('transaksi',array('id_rental' => $id));
			return $query->row_array();
		}

		public function total_data_rental(){
			$nama_rental 		= $this->session->userdata('nama_rental');

			$menunggu_konfirmasi= $this->db->query("SELECT * FROM transaksi WHERE bukti_pembayaran != '' AND status_pembayaran = '0' AND nama_rental = '$nama_rental'")->num_rows();
			$transaksi			= $this->db->get_where('transaksi', array('nama_rental' => $nama_rental))->num_rows();
			$transaksi_selesai	= $this->db->query("SELECT * FROM transaksi WHERE status_rental = 'Selesai' AND nama_rental = '$nama_rental'")->num_rows();
			$mobil 				= $this->db->get_where('mobil', array('nama_rental' => $nama_rental))->num_rows();

			$data = array(

				'total_menunggu_konfirmasi' => $menunggu_konfirmasi,
				'total_transaksi'	=> $transaksi,
				'total_transaksi_selesai' => $transaksi_selesai,
				'total_mobil'	=> $mobil
			);	

			return $data;
		}


		public function total_data_admin(){
			$customer			= $this->db->get_where('customer', array('role_id' => '2'))->num_rows();
			$transaksi			= $this->db->count_all_results('transaksi');
			$transaksi_selesai	= $this->db->get_where('transaksi', array('status_rental' => 'Selesai'))->num_rows();
			$mobil 				= $this->db->count_all_results('mobil');

			$data = array(

				'total_customer' => $customer,
				'total_transaksi'	=> $transaksi,
				'total_transaksi_selesai' => $transaksi_selesai,
				'total_mobil'	=> $mobil
			);	

			return $data;
		}

		public function rental_login(){
			$pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Akses hanya untuk Pemilik Rental saja
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
			if (!empty($this->session->userdata('role_id'))) {
				if ($this->session->userdata('role_id') == '3') {
					return;
				}elseif($this->session->userdata('role_id') == '2') {
				$this->session->set_flashdata('pesan', $pesan);
					redirect('customer/dashboard');
				}else {
				$this->session->set_flashdata('pesan', $pesan);
					redirect('admin/dashboard');
				}
			}else {
			$this->pesan_harus_login();
			redirect('auth/login');
			}
		}

		public function admin_login(){
			$pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Akses hanya untuk Admin saja
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
			if (!empty($this->session->userdata('role_id'))) {
				if ($this->session->userdata('role_id') == '1') {
					return;
				}elseif($this->session->userdata('role_id') == '2') {
				$this->session->set_flashdata('pesan', $pesan);
					redirect('customer/dashboard');
				}else {
				$this->session->set_flashdata('pesan', $pesan);
					redirect('rental/dashboard');
				}
			}else {
			$this->pesan_harus_login();
			redirect('auth/login');
			}
		}

		public function customer_login(){
			$pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Akses hanya untuk Customer saja
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
			if (!empty($this->session->userdata('role_id'))) {
				if ($this->session->userdata('role_id') == '2') {
					return;
				}elseif($this->session->userdata('role_id') == '1') {
					$this->session->set_flashdata('pesan', $pesan);
					redirect('admin/dashboard');
				}else {
					$this->session->set_flashdata('pesan', $pesan);
					redirect('rental/dashboard');
				}
			}else {
				$this->session->set_flashdata('pesan', $pesan);
				$this->pesan_harus_login();
				redirect('auth/login');
			}
		}

		private function pesan_harus_login()
		{
			return $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Silakan login untuk melanjutkan
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
	}
	public function kodeOtomatis($tabel, $key)
	{
		$this->db->select('right(' . $key . ',3) as kode', false);
		$this->db->order_by($key, 'desc');
		$this->db->limit(1);
		$query = $this->db->get($tabel);
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = date('dmY') . $kodemax;
		return $kodejadi;
	}
	}
