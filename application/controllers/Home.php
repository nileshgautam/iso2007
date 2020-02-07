<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	// function to load home page after logged in
	public function login()
	{
		$this->load->view('common_view/header');
		$this->load->view('home_page');
		$this->load->view('common_view/footer');
	}
	// function to load admin view
	public function admin()
	{
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('home_page');
		$this->load->view('common_view/footer');
	}
	// function to load admin view
	public function common_users()
	{
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('home_page');
		$this->load->view('common_view/footer');
	}
	//  function to get question data 
	public function get_data()
	{
		$title = $this->input->post('qid');
		$data = $this->MainModel->selectAllFromWhere('sub_section', array('main_title_code' => $title,));
		$myjson = json_encode($data, true);
		echo $myjson;
	}
	// functio to load question to question view
	public function question_view($id)
	{
		$sub_section = $id;
		// print_r($id);die;
		// print_r($sub_section);
		$data['status'] = $this->MainModel->selectAll('status', 'status');
		// $data['users'] = $this->MainModel->selectAll('users', 'status');
		$data['users'] = $this->MainModel->selectAllFromWhere('users', array('company_id' => $_SESSION['sub_Comp_Info']['id']));

		$data['question'] = $this->MainModel->selectAllFromWhere('tbl_question', array('sub_section_code' => $sub_section));

		$data['id'] = $_SESSION['sub_Comp_Info']['id'];
		$this->load->view('common_view/header');
		// $this->load->view('common_view/nav');
		$this->load->view('common_view/question_nav', $data);
		$this->load->view('question-pages', $data);
		$this->load->view('common_view/footer');
	}
	// function to insert 

	public function insert_question_responce()
	{

		$comp_id = $this->input->post('hiddenComp_id');
		$res_ponce_by = $this->input->post('responceBy');
		$note = $this->input->post('note');
		$question_type = $this->input->post('qt');
		$qtpy = '';
		$word = "A";
		$mystring = $question_type;
		// Test if string contains the word 
		if (strpos($mystring, $word) !== false) {
			$qtpy = 'Annex';
			// return true;
		} else {
			$qtpy = 'ISO';
			// return false;
		}
		$data = array(
			'company_id' => $comp_id,
			'user_responce' => $res_ponce_by,
			'note' => $note,
			'question_type' => $qtpy,
			'question_responce' => json_encode($_POST, true)
		);
		$res = $this->MainModel->insertInto('company_responce', $data);

		if ($res) {
			echo $this->session->set_flashdata('msg', "Submited successfuly");
		}
		redirect('Home/audit_view/' . $comp_id);
	}
	// function to show create compnay view
	public function c_users()
	{
		// print_r($_POST);die;
		// $c_id="";
		// $data['users'] = $this->MainModel->selectAllFromWhere('users', array('company_id' => $id));
		$data['users'] = $this->MainModel->selectAll('users');
		// $data['users'] = $this->MainModel->selectAll('users', 'f_name');
		// echo "<pre>";
		// 		print_r($data);die;

		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('users', $data);
		$this->load->view('common_view/footer');
	}
	// function to show create compnay view
	public function create_company()
	{
		// print_r($_POST);die;
		$data['country'] = $this->MainModel->selectAll('countries', 'name');
		// echo "<pre>";
		// print_r($data);die;
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('create_company', $data);
		$this->load->view('common_view/footer');
	}

	// function to show state compnay view
	public function select_state()
	{
		// print_r($_POST);die;
		$id = $this->input->post('c_id');
		$data = $this->MainModel->selectAllFromWhere('states', array('country_id' => $id));
		// echo "<pre>";
		// print_r($data);die;
		$myjson = json_encode($data, true);
		echo $myjson;



		// $this->load->view('common_view/header');
		// $this->load->view('common_view/nav');
		// $this->load->view('create_company',$data);
		// $this->load->view('common_view/footer');
	}
	// function to show city compnay view
	public function select_cities()
	{

		$id = $this->input->post('c_id');
		$data = $this->MainModel->selectAllFromWhere('cities', array('state_id' => $id));
		// echo "<pre>";
		// print_r($data);die;
		$myjson = json_encode($data, true);
		echo $myjson;
	}
	//  insereting company details into the database
	public function company_register()
	{
		// print_r($_POST);
		// die;
		// $data['roles'] = $this->MainModel->selectAll('role_status');
		$c_name = $this->input->post('InputName');
		$c_address = $this->input->post('Address');
		$c_city = $this->input->post('City');
		$c_state = $this->input->post('State');
		$c_country = $this->input->post('Country');
		$c_email = $this->input->post('Email');
		$c_contact_no = $this->input->post('Contact_No');
		$c_zip_pin_code = $this->input->post('Zip_Pin_Code');
		$gst_number = $this->input->post('GST_Number');

		if (isset($c_email)) {
			$data = $this->MainModel->selectAllFromWhere('company_details', array('email' => $c_email));

			if (!empty($data)) {
				print_r($data);
				$this->session->set_flashdata("error", "Company, Already Exist Please enter uniqe company name.");
				redirect(base_url('Home/create_company'));
				die;
			} elseif (empty($data)) {

				$insert = array(
					'company_name' => $c_name,
					'address' => $c_address,
					'city' => $c_city,
					'state' => $c_state,
					'country' => $c_country,
					'zip_pin_code' => $c_zip_pin_code,
					'contact_no' => $c_contact_no,
					'email' => $c_email,
					'gst_number' => $gst_number
				);
				$res = $this->MainModel->insertInto('company_details', $insert);
				if (!empty($res)) {
					$this->session->set_flashdata("error", "Company Successfully Registered.");

					$company_data = array(
						'company_name' => $c_name,
						'email' => $c_email
					);
					$this->session->set_userdata("company_data", $company_data);
					redirect(base_url('Home/choose_services'));
				}
			} else {
				$this->session->set_flashdata("error", "Company Already Exist.");
				redirect(base_url('Home/create_company'));
			}
		}
		redirect(base_url('Home/create_company'));
	}

	// compnay services iso setups view
	public function choose_services()
	{
		// print_r($_POST);die;
		$data['iso27001'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => ISO_27001_requirement));
		// $data['annex'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => Annex_A_controls));
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('iso27001_services', $data);
		$this->load->view('common_view/footer');
	}
	// compnay services  annex setups view
	public function annex_services()
	{
		// print_r($_POST);die;

		// $data['iso27001'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => ISO_27001_requirement));
		$data['annex'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => Annex_A_controls));
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('annex_services', $data);
		$this->load->view('common_view/footer');
	}

	// company list view 
	public function company_list()
	{
		// print_r($_POST);die;

		// $data['iso27001'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => ISO_27001_requirement));
		$data['company_list'] = $this->MainModel->selectAll('company_details', 'company_name');
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('company_list', $data);
		$this->load->view('common_view/footer');
	}
	// company services setting
	public function set_services()
	{
		$company_email = $_SESSION['company_data']['email'];
		if ($_POST['services_type'] == 1) {
			// $data = $this->MainModel->selectAllFromWhere('company_details', array('email' => $company_email));
			// echo "<pre>";
			// print_r($data);
			$iso_data = json_encode(array($_POST));
			$question = array(
				'iso_option' => $iso_data
			);
			$result = $this->MainModel->update_table('company_details', array('email' => $company_email), $question);
			redirect(base_url('Home/annex_services'));
		} elseif ($_POST['services_type'] == 2) {

			$annex_data = json_encode(array($_POST));
			$question = array(
				'annex_option' => $annex_data
			);
			$result = $this->MainModel->update_table('company_details', array('email' => $company_email), $question);
			redirect(base_url('Home/company_list'));
			// $iso_data = json_encode(array($_POST));
		}
	}
	// company audit view
	public function audit_view($id)
	{
		$data = $this->MainModel->selectAllFromWhere('company_details', array('id' => $id));
		// print_r($data);die;
		$sub_company_data = array(
			'id'       =>  $data[0]['id'],
			'company_name'  => $data[0]['company_name'],
			'email'      => $data[0]['email']
		);
		$this->session->set_userdata("sub_Comp_Info", $sub_company_data);
		// print_r($sub_company_data['id']); die;
		$iso_data = json_decode($data[0]['iso_option'], true);
		$annex_data = json_decode($data[0]['annex_option'], true);

		$question_data = [];
		if (!empty($iso_data)) {
			$key = array_keys($iso_data[0]);
			// print_r($key);
			for ($i = 0; $i < count($iso_data[0]) - 1; $i++) { // print_r($i);
				$data = $this->MainModel->selectAllFromWhere('mainsection', array('clause_section' => $iso_data[0][$key[$i]]));
				array_push($question_data, $data[0]);
			}
		}

		$annex_qdata = [];
		if (!empty($annex_data)) {
			$key = array_keys($annex_data[0]);
			// print_r($key);
			for ($i = 0; $i < count($annex_data[0]) - 1; $i++) { // print_r($i);
				$adata = $this->MainModel->selectAllFromWhere('mainsection', array('clause_section' => $annex_data[0][$key[$i]]));
				array_push($annex_qdata, $adata[0]);
			}
		}

		$question = array(
			'iso'       =>  $question_data,
			'annex'  => $annex_qdata,
			// 'email'     => $email,
			// 'user_role'     => $user_role,
			'logged_in' => TRUE
		);

		$this->session->set_userdata("question", $question);

		$data['annex_data'] = $annex_qdata;
		$data['main_content'] = $question_data;
		$data['id'] = $id;
		$this->load->view('common_view/header');
		// $this->load->view('common_view/nav');
		$this->load->view('common_view/question_nav', $data);
		// $this->load->view('company_audit', $data);
		$this->load->view('common_view/footer');
	}
	// public function annex_view($id)
	// {
	// 	// $company_id = $id;
	// 	// print_r($company_id);die;

	// 	$data = $this->MainModel->selectAllFromWhere('company_details', array('id' => $id));

	// 	$annex_data = json_decode($data[0]['annex_option'], true);
	// 	// $iso=array_pop($iso_data[0]);
	// 	// $iso=array_pop($iso_data);
	// 	// echo "<pre>";
	// 	// print_r($iso_data);
	// 	$question_data = [];
	// 	if (!empty($annex_data)) {
	// 		$key = array_keys($annex_data[0]);
	// 		// print_r($key);
	// 		for ($i = 0; $i < count($annex_data[0]) - 1; $i++) { // print_r($i);
	// 			$data = $this->MainModel->selectAllFromWhere('mainsection', array('clause_section' => $annex_data[0][$key[$i]]));
	// 			array_push($question_data, $data[0]);
	// 		}
	// 	}

	// 	$data['main_content'] = $question_data;
	// 	$data['id'] = $id;
	// 	$this->load->view('common_view/header');
	// 	$this->load->view('common_view/nav');
	// 	$this->load->view('annex_audit', $data);
	// 	$this->load->view('common_view/footer');
	// }
	// compnay services  annex setups view

	public function thank_you($id)
	{
		// print_r($_POST);die;

		// $data['iso27001'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => ISO_27001_requirement));
		$data['annex'] = $this->MainModel->selectAllFromWhere('mainsection', array('tag_type' => Annex_A_controls));
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('common_view/thank_you', $data);
		$this->load->view('common_view/footer');
	}

	// function to populate dashboard for all the company
	public function comp_dashboard($id)
	{
		// $id=$comp_id;
		// extratcting question data from database by company id
		$data1 = $this->MainModel->selectAllFromWhere('company_responce', array('company_id' => $id, 'question_type' => 'ISO'));
		$data = $this->MainModel->selectAllFromWhere('company_responce', array('company_id' => $id, 'question_type' => 'Annex'));
		// $atotalquestion = 114;
		$iso = $this->count_Status($data1);
		$annexe = $this->count_Status($data);
		$result1 = $this->count_Status_per($iso);
		$result2 = $this->count_Status_per($annexe);
		// echo"<pre>";
		// print_r($result1);
		// print_r($result2);
		$resultdata['iso'] = $result1;
		$resultdata['annexe'] = $result2;

		// print_r($resultdata);
		// print_r($result2);
		// die;
		$this->load->view('common_view/header');
		$this->load->view('common_view/nav');
		$this->load->view('common_view/comp_dashboard', $resultdata);
		$this->load->view('common_view/footer');
	}
	// function to count all the status belonging to all the questions
	public function count_Status($data)
	{
		if ($data) {
			$status_arr = [];
			for ($i = 0; $i < count($data); $i++) {
				$data1 = json_decode($data[$i]['question_responce'], true);
				$keys = array_keys($data1);
				for ($j = 0; $j < (count($keys) - 4); $j++) {
					$searched_data = $data1[$keys[$j]];
					array_push($status_arr, $searched_data);
				}
			}
			return array_count_values($status_arr);
		}
	}

	public function count_Status_per($data)
	{
		$result_arr = [];

		if ($data) {
			$keys = array_keys($data);
			$searched_data = (int) '';
			for ($j = 0; $j < count($keys); $j++) {
				$searched_data += (int) $data[$keys[$j]];
			}
			for ($k = 0; $k < count($keys); $k++) {
				$result = ((int) $data[$keys[$k]] * 100) / $searched_data;
				array_push($result_arr, [$keys[$k] => round($result)]);
			}
			// echo "<pre>";
			// print_r($result_arr);
			$result = [];
			foreach ($result_arr as $val) {
				foreach ($val as $key => $d) {
					$result[$key] = $d;
				}
			}
			return $result;
		}
	}


	// compnay services  annex setups view
	public function company_responce()
	{
		$id = $_POST['comp'];
		$data = $this->MainModel->selectAllFromWhere('company_responce', array('company_id' => $id));
		$myjon = json_encode($data, true);
		echo  $myjon;
	}
}
