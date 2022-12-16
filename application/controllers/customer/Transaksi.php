<?php 

	class Transaksi extends CI_Controller{
		public function index(){
			$this->rental_model->customer_login();
			$customer = $this->session->userdata('id_customer');
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND cs.id_customer='$customer' ORDER BY id_rental ASC")->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/transaksi',$data);
			$this->load->view('templates_customer/footer');
		}

		public function pembayaran($id){
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_rental='$id' AND cs.nama_rental = tr.nama_rental ORDER BY id_rental DESC")->result();

			$nama_rental = $data['transaksi'][0]->nama_rental;
			$data['payment']	= $this->db->query("SELECT * FROM payment WHERE nama_rental = '$nama_rental'")->result();

			$this->load->view('templates_customer/header');
			$this->load->view('customer/pembayaran',$data);
			$this->load->view('templates_customer/footer');
		}

		public function pembayaran_aksi(){
			$id 				= $this->input->post('id_rental');
			
			$config['upload_path']		= './assets/upload/bukti-bayar';
			$config['allowed_types']	= 'jpg|jpeg|png|tiff|pdf|webp';
			$config['file_name'] 		= 'bukti bayar -' . time();
			$config['max_size']     	= 10240;
			$config['max_width']        = 0;
			$config['max_height']       = 0;
			$this->load->library('upload', $config);
			// jika inputan file kosong
			if(!$_FILES['bukti_pembayaran']['name']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Bukti Pembayaran tidak boleh kosong
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('customer/transaksi/pembayaran/'.$id);
			}
			// jika gagal upload tampilkan pesan
			if(!$this->upload->do_upload('bukti_pembayaran')) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						'.$this->upload->display_errors().'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
			redirect('customer/transaksi/pembayaran/' . $id);
			}

			$bukti_pembayaran = $this->upload->data('file_name');

			$data = array(
				'bukti_pembayaran' => $bukti_pembayaran
			);

			$where = array(
				'id_rental'			=> $id
			);

			$this->rental_model->update_data('transaksi', $data, $where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Bukti Pembayaran Anda Berhasil di Upload
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('customer/transaksi');

		}

		public function cetak_invoice($id){
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND tr.id_rental='$id'")->result();

			$data['nama_rental'] = $this->db->query("SELECT nama_rental FROM transaksi WHERE id_rental = '$id'")->result();

			$nama_rental = $data['nama_rental'][0]->nama_rental;
			$data['payment']	= $this->db->query("SELECT * FROM payment WHERE nama_rental = '$nama_rental'")->result();
			$data['rental']		= $this->db->query("SELECT * FROM customer WHERE nama_rental = '$nama_rental'")->result();

			$this->load->view('customer/cetak_invoice',$data);
		}

		public function batal_transaksi($id){
			$where = array('id_rental' => $id);
			$data  = $this->rental_model->get_where($where, 'transaksi')->row();

			$where2 = array('id_mobil' => $data->id_mobil);
			$data2	= array('status'   => '1');

			$this->rental_model->update_data('mobil', $data2, $where2);
			$this->rental_model->delete_data($where, 'transaksi');

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil dibatalkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('customer/transaksi');

		}
	}
