<?php

class Contact extends Controller {

	function Contact() {
		parent::Controller();

		$this->load->model('contact_model');
		$this->load->helper('url');
		$this->load->library('tank_auth');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	function index() {
	  $data['title'] = 'Contact List';
	  $data['contacts'] = $this->contact_model->list_all();
		$this->load->view($this->config->item('theme') . '/includes/header',$data);
		$this->load->view($this->config->item('theme') . '/contact/list',$data);
		$this->load->view($this->config->item('theme') . '/includes/footer');
	}

	function add() {

    $this->load->helper(array('form', 'url', 'html'));
		$this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email');
    $this->form_validation->set_rules('phone', 'Phone');
    $this->form_validation->set_rules('address', 'Address');
    $this->form_validation->set_rules('notes', 'Notes');

		if ($this->form_validation->run()) {

			$this->contact_model->add(
			  $this->input->post('name'),
			  $this->input->post('email'),
			  $this->input->post('phone'),
			  $this->input->post('address'),
			  $this->input->post('notes')
			);

      $this->session->set_flashdata('message','Contact has been added.');

      if ($this->input->post('submitmore'))
        redirect('contact/add');

		  redirect('');

		} else {

			$data['title'] = 'Add Contact';
		  $this->load->view($this->config->item('theme') . '/includes/header',$data);
			$this->load->view($this->config->item('theme') . '/contact/add');
		  $this->load->view($this->config->item('theme') . '/includes/footer');

		}
	}

	function edit($id) {

    $this->load->helper(array('form', 'url', 'html'));
		$this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email');
    $this->form_validation->set_rules('phone', 'Phone');
    $this->form_validation->set_rules('address', 'Address');
    $this->form_validation->set_rules('notes', 'Notes');

		if ($this->form_validation->run()) {

			$this->contact_model->edit(
			  $id,
			  $this->input->post('name'),
			  $this->input->post('email'),
			  $this->input->post('phone'),
			  $this->input->post('address'),
			  $this->input->post('notes')
			);

      $this->session->set_flashdata('message','Contact has been saved.');
      redirect('contact/edit/' . $id);

		} else {

			$data['title'] = 'Edit Contact';
			$data['contact'] = $this->contact_model->get_by_id($id);
		  $this->load->view($this->config->item('theme') . '/includes/header', $data);
			$this->load->view($this->config->item('theme') . '/contact/edit', $data);
		  $this->load->view($this->config->item('theme') . '/includes/footer');

		}
	}

	function delete($id) {
	  $this->contact_model->delete($id);
	  $this->session->set_flashdata('message','Contact has been deleted.');
    redirect('');
	}
}
