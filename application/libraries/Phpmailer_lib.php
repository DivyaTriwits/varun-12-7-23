<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'PHPMailer/src/Exception.php';
require APPPATH . 'PHPMailer/src/PHPMailer.php';
require APPPATH . 'PHPMailer/src/SMTP.php';

class Phpmailer_lib
{
    public function __construct()
    {
	$this->mail = new PHPMailer(true);
		// Set SMTP configuration
		$this->mail->isSMTP();
		$this->mail->Host = 'p4kap4cfc5vhzrfud8lu.co.in';
		$this->mail->SMTPAuth = true;
		$this->mail->Username = 'support@theglobalscholarship.org';
		$this->mail->Password = 'd35ky1FFu';
		$this->mail->SMTPSecure = 'tls';
      	$this->mail->Port = 587;
      

// Set email parameters
		$this->mail->setFrom('support@theglobalscholarship.org', 'The Global Scholarship Security team');
		//$this->mail->addReplyTo('reply_to_email_address', 'Reply-to Name');
		//$this->mail = new PHPMailer(true);
    }
}