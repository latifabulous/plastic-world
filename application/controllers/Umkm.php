<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umkm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();

		$id =  $this->session->userdata('id_umkm');

		// $this->db->from('plastik');
		// $data['plastik'] = $this->db->count_all_results();
		$this->db->where('id_umkm', $id);
		$this->db->from('penukaran_plastik');
		$data['penukaran'] =  $this->db->count_all_results();
		$data['plastik'] =  $this->db->count_all('plastik');

		$data['judul'] = 'Dashboard';
		$this->load->view('templates/umkm_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('umkm/umkm-dashboard', $data);
		$this->load->view('templates/admin_footer');
	}

	public function Penukaran()
	{

		$data['judul'] = 'Data Penukaran';
		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		$id =  $this->session->userdata('id_umkm');

		// $data['Penukaran'] =  $this->db->count_all('Penukaran');
		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id_umkm' => $id])->result_array();

		// $this->load->model('Home_model', 'home');
		// $data['penukaran'] =  $this->home->getMasyarakat();
		// $data['apa'] =  $this->home->getResult();
		// $data['Penukaran'] =  $this->db->get_where('Penukaran')->result_array();
		// $data['artikel'] =  $this->db->count_all('artikel');
		// $data['plastik'] =  $this->db->count_all('plastik');

		$this->load->view('templates/umkm_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('umkm/umkm-data-Penukaran', $data);
		$this->load->view('templates/admin_footer');
	}


	public function detailpenukaran($id)
	{

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		// $data['umkm'] =  $this->db->get('umkm')->result_array();
		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id' => $id])->row_array();
		$this->form_validation->set_rules('poin', 'Nama', 'required');

		$data['judul'] = 'Ubah Penukaran';
		$this->load->view('templates/umkm_nav', $data);
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('umkm/umkm-ubah-penukaran', $data);
		$this->load->view('templates/admin_footer');
	}

	public function ubahPenukaran()
	{

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();
		// $data['umkm'] =  $this->db->get('umkm')->result_array();
		$id = $this->input->post('id', true);

		$data['penukaran'] =  $this->db->get_where('penukaran_plastik', ['id' => $id])->row_array();
		$this->form_validation->set_rules('poin', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Ubah Penukaran';
			$this->load->view('templates/umkm_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('umkm/umkm-ubah-penukaran', $data);
			$this->load->view('templates/admin_footer');
		} else {

			$id = $this->input->post('id', true);
			$poin = $this->input->post('poin');
			$pet = $this->input->post('quantity1', true);
			$hdp = $this->input->post('quantity2', true);
			$pvc = $this->input->post('quantity3', true);
			$ldpe = $this->input->post('quantity4', true);
			$pp = $this->input->post('quantity5', true);
			$ps = $this->input->post('quantity6', true);
			$other = $this->input->post('quantity7', true);
			$status = $this->input->post('status', true);


			$this->db->set('total_poin', $poin);
			$this->db->set('pet', $pet);
			$this->db->set('hdp', $hdp);
			$this->db->set('pvc', $pvc);
			$this->db->set('ldpe', $ldpe);
			$this->db->set('pp', $pp);
			$this->db->set('ps', $ps);
			$this->db->set('pp', $pp);
			$this->db->set('other', $other);
			$this->db->set('status', $status);
			$this->db->where('id', $id);
			$this->db->update('penukaran_plastik');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('umkm/penukaran');
		}
	}

	public function editProfile()
	{
		$data['judul'] = 'Edit Profile';
		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_message('required', 'Wajib diisi.');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/umkm_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('umkm/umkm-edit-profile', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$uname = $this->input->post('uname');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			$desc = $this->input->post('desc');

			$upload_gambar = $_FILES['gambar']['name'];
			// var_dump($upload_gambar);
			// die;

			if ($upload_gambar) { //ada gambar yg diupload
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2024';

				$this->load->library('upload', $config);

				//upload file
				if ($this->upload->do_upload('gambar')) {
					//gambar ganti semua hilang kecuali default
					$old_image = $data['umkm']['gambar_umkm'];
					if ($old_image != 'default.jpg') { //hapus gambar
						unlink(FCPATH . 'assets/img/profile/' . $old_image); //LETAK FILE (front controer) mengetahui path 
					}

					$new_image = $this->upload->data('file_name');

					$this->db->set('gambar_umkm', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_umkm', $nama);
			$this->db->set('email_umkm', $email);
			$this->db->set('nohp_umkm', $nohp);
			$this->db->set('alamat_umkm', $alamat);
			$this->db->set('desc_umkm', $desc);
			$this->db->where('username_umkm', $uname);
			$this->db->update('umkm');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			redirect('umkm/editProfile');
		}
	}


	public function gantiPass()
	{
		$data['judul'] = 'Edit Profile';

		$data['umkm'] =  $this->db->get_where('umkm', ['username_umkm' => $this->session->userdata('username_umkm')])->row_array();

		$this->form_validation->set_rules('pass', 'Password Sekarang', 'required|trim');
		$this->form_validation->set_rules('new-pass', 'Password Baru', 'required|trim|min_length[5]|matches[new-pass2]', array('min_length' => '{field} terlalu pendek'));
		$this->form_validation->set_rules('new-pass2', 'Konfirmasi Password', 'required|trim|matches[new-pass]', array('matches' => 'Password tidak sama'));


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/umkm_nav', $data);
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('umkm/umkm-edit-profile', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$pass_sekarang = md5($this->input->post('pass'));
			$new_pass = md5($this->input->post('new-pass'));

			if ($pass_sekarang != $data['umkm']['password_umkm']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('umkm/editProfile');
			} else {
				if ($pass_sekarang == $new_pass) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang diganti tidak boleh sama dengan password sekarang!</div>');
					redirect('umkm/editProfile');
				} else {
					$this->db->set('password_umkm', $new_pass);
					$this->db->where('username_umkm', $this->session->userdata('username_umkm'));
					$this->db->update('umkm');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasi diubah!</div>');
					redirect('umkm/editProfile');
				}
			}
		}
	}
}
