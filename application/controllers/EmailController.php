<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmailController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function index()
	{
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'infor.tapchitamlyhocvietnam@gmail.com';
		$config['smtp_pass'] = 'obdxtvfkoqucdzls';
		$config['smtp_port'] = 465;
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('infor.tapchitamlyhocvietnam@gmail.com', 'Tạp Chí Tâm Lý Học Việt Nam');
		$this->email->to('infor.tapchitamlyhocvietnam@gmail.com');
$mess = '
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Template email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    #customers tr:hover {background-color: #ddd;}
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>
<body>
  <table id="customers">
    <tr>
      <th>Company</th>
      <th>Contact</th>
      <th>Country</th>
    </tr>
    <tr>
      <td><img src="https://tapchitamlyhocvietnam.com/public/img/banner_vn.jpg" width="100%"></td>
      <td>Contact</td>
      <td>Country</td>
    </tr>
    <tr>
      <td>Company</td>
      <td>Contact</td>
      <td>Country</td>
    </tr>
  </table>
</body>
</html>
';
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->subject('Thông báo phản biện');
		$this->email->message($mess);

		$this->email->send();

	}

	public function htmlemail(){
		$this->load->view('email/v_main');
	}

}

/* End of file EmailController.php */
/* Location: ./application/controllers/EmailController.php */