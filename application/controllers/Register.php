<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller 
{
  function __construct() 
  { 
    parent::__construct();
    $this->load->library('email');
    $this->load->helper('string');
    $this->load->model('users_model');
    $this->user_id = $this->session->userdata('user_id');
  }
  function login() 
  {
    if($this->user_id)
      redirect('sales');  
    if ($_POST)
    {
      $success = true;
      $message = false;
      $failure = false;
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_is_email_exist_in_database');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if($this->form_validation->run())
      { 
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $userRecord = $this->users_model->login_autantication($email,md5($password));
        if($userRecord)
        {
          if($userRecord->status != 'Active')
          {
            $failure = true;
            $message = "Your Account is not Active";
          }
          else
          {
            $this->session->set_userdata('user_id',$userRecord->id);
          }
        }
        else
        {
          $failure = true;
          $message = "Please try with right credentials";
        }
      }
      else
      {
        $failure = true;
        $message = validation_errors();
      }
      if($this->input->is_ajax_request())
      {
        if($failure)
        {
          $data['success'] = false;
        }
        else
        {
          $data['redirectURL'] = site_url();
        }
        $data['message'] = $message;
        echo json_encode($data); die;
      }
    }
    $this->load->view('admin/register/login');
  }
    public function user_autantication() 
    { 
        $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email|callback_is_email_exist_in_database');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
          $this->load->view('admin/register/login');
        }
        else
        { 
          $email_address = $this->input->post('email');
          $password = md5($this->input->post('password'));
          $user_record = $this->users_model->login_autantication($email_address,$password);
        if($user_record){
        if($user_record->status == 'Active')
         {
           $this->session->set_userdata('user_id',$user_record->id);
           redirect('sales');
          }
         else
         {
            $this->session->set_flashdata('login_failed_msg', 'You have not verified your email ! go to your mail inbox and varify');
            $this->load->view('admin/register/login');
          }}
          else
          {
             $this->session->set_flashdata('login_failed_msg', 'Wrong password! please try again');
             $this->load->view('admin/register/login');
          }}
    }        

    public function get_email_for_forgot_password()
    {
       $this->load->view('admin/register/forgot_password');
    }
    public function generate_validation_link()
    {
       $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email|callback_is_email_exist_in_database');
       if ($this->form_validation->run())
       {
        $email_address = $this->input->post('email');
        $validation_key = random_string('alnum', 16);
        $this->users_model->update_validation_key($email_address,$validation_key);
        $validationLink = "Click on link to varify your email address - <a href='http://192.168.1.90/wine/register/check_key_validation/"
        .$validation_key."'>http://192.168.1.90/wine/register/check_key_validation/".$validation_key."</a>";
        echo $validationLink;
        }
        else
        {
        $this->load->view('admin/register/forgot_password'); 	
        }
    }
    public function check_key_validation($validation_key) 
    {
        $user_id = $this->users_model->get_user_id($validation_key);
        if($user_id)
        {
            $output['user_id'] = $user_id;
            $this->load->view('admin/register/reset_password',$output);
        }
        else
        {
            $this->session->set_flashdata('login_failed_msg', 'Your varification key does not match');
            redirect('login');
        }
    }
    public function update_password()
    { 
        $user_id = $this->input->post('user_id');
        $new_password = md5($this->input->post('password'));
      	$this->form_validation->set_rules('password', 'Password', 'trim|required');
      	if ($this->form_validation->run())
        { 
          $this->users_model->update_password($user_id,$new_password);
          redirect('login');
        }
        else
        { 
          $output['user_id'] = $user_id;
          $this->load->view('admin/register/reset_password',$output);
        }
    }

    function is_email_exist_in_database($email) 
    {
        $is_email_exist = $this->users_model->is_email_exist_in_database($email);
        if($is_email_exist)
        {
           return true;
        }
        else
        {
           $this->form_validation->set_message('is_email_exist_in_database','This email address does not exist');
           return false;
        }
    }
    public function send_email($email_id_to_send_email,$forgotPasswordKey)
    {
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "gprawat.vitv@gmail.com"; 
        $config['smtp_pass'] = "jkndkj1234";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $to = $email_id_to_send_email;
        $from = 'gprawat.vitv@gmail.com';
        $companyName = 'Xtreem Solutions';
        $subject = 'Password Reset Link';
        $resetPasswordLink = "Click on link to varify your email address - <a href='http://192.168.1.103/girraj/student/update_verification_status/".$forgotPasswordKey."'>http://192.168.1.103/girraj/student/update_verification_status/".$forgotPasswordKey."</a>";
        $message = 'You have successfully compleated your registration.<br/><br/>'.$resetPasswordLink;

        $this->email->clear();
        $this->email->from($from, $companyName);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send())
        {
          return true;
        }
        else
        {
         return false;
        }
    }
    function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
