<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginauth extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('common_view/header');
		$this->load->view('common_view/login');
		$this->load->view('common_view/footer');
	}
	public function signup()

	{
		$data['company'] = $this->MainModel->selectAll('company_details', 'company_name');
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('signup',$data);
		$this->load->view('common_view/footer');
		
	}

	public function user_register()
	{
		// $data = $_POST;
		// echo "<pre>";
		// print_r($data);die;
		$f_name = $this->input->post('first_name_inptxt');
		$l_name = $this->input->post('last_name_inptxt');
		$email = $this->input->post('InputEmail');
		$contact = $this->input->post('contact');
		$company_id = $this->input->post('comp_id');
		$role = $this->input->post('urole');

		if (isset($email)){
			$data = $this->MainModel->selectAllFromWhere('users', array('email_id' => $email));
			if ($data<1) {
				$insert = array(
					'f_name' => $f_name,
					'l_name' => $l_name,
					'email_id' => $email,
					// 'password' => $password,
					'user_role' => $role,
					'contact_no' => $contact,
					'company_id'=> $company_id
				);
				$res = $this->MainModel->insertInto('users', $insert);
				
				if($res!=""){
					$this->session->set_flashdata("error", "user created.");
					redirect(base_url('admin/users'));
				}
				else {
					$this->session->set_flashdata("error", "error occourd.");
				}

			}
			else{
				$this->session->set_flashdata("error", "Account Already Exist.");
			}
			redirect(base_url('admin/register-user'));
		}
	}

	public function ISO_27001_gap_analysis()
	{
		$title="ISO 27001 requirement";
		$annex_title="Annex A controls";

		$data['main_content'] =	$this->MainModel->selectAllFromWhere('mainsection', array('tag_type'=>$title, ));
		$data['annex_content'] =	$this->MainModel->selectAllFromWhere('mainsection', array('tag_type'=>$annex_title, ));
		
		// echo "<pre>";
		// print_r($data);
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('isoanalysistool',$data);
		$this->load->view('common_view/footer');
	}

}

