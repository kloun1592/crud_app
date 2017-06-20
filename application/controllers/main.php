<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->library('grocery_CRUD');
    $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
    $this->load->library('ion_auth');
  }

  public function index()
  {
    redirect('main/computers');
  }

  public function computers()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('auth/login');
    }
    else
    {
      $this->grocery_crud->set_table('computer');
      $output = $this->grocery_crud->render();
      $this->_example_output($output);
    }
  }

  public function soft()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('auth/login');
    }
    else
    {
      $this->grocery_crud->set_table('soft');
      $output = $this->grocery_crud->render();
      $this->_example_output($output);
    }
  }

  public function first_query()
  {
  	$this->load->view('first_query');
  }

  public function second_query()
  {
    $this->load->view('second_query');
  }

  public function third_query()
  {
    $this->load->view('third_query');
  }

  public function _example_output($output = null)
  {
    $this->load->view('page_template', $output);
  }

}