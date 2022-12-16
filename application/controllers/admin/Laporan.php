<?php 
	class Laporan extends CI_Controller{

		public function index(){
			$this->rental_model->admin_login();

			$dari 		= $this->input->post('dari');
			$sampai 	= $this->input->post('sampai');
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->load->view('templates_admin/header');
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/filter_laporan');
				$this->load->view('templates_admin/footer');
			}else{

			if ($sampai < $dari) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Rentang Tanggal sepertinya terbalik
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/laporan');
			}
				$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tanggal_rental) >= '$dari' AND date(tanggal_rental) <= '$sampai'")->result();

				$this->load->view('templates_admin/header');
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/tampilkan_laporan',$data);
				$this->load->view('templates_admin/footer');
			} 
		}


		public function print_laporan(){
			$this->rental_model->admin_login();
			$dari 		= $this->input->get('dari');
			$sampai 	= $this->input->get('sampai');

			$data['title']	 = "Print Laporan Transaksi";
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tanggal_rental) >= '$dari' AND date(tanggal_rental) <= '$sampai'")->result();

				$this->load->view('templates_admin/header');
				$this->load->view('admin/print_laporan',$data);
		}

		public function _rules(){
			$this->form_validation->set_rules('dari', 'Dari Tanggal','required');
			$this->form_validation->set_rules('sampai', 'Sampai Tanggal','required');
		}
	}
?>