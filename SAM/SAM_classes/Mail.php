<?php


namespace SAM\Classes;

require __DIR__.'/../../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer as PHPMailer;

class Mail
{
	protected $mail;

	public function __construct()
	{
		$this->mail = new PHPMailer;
		$this->setUp();
	}
	public function setUp()
	{
		try{
			// PHPmailer security set up 
			$this->mail->isSMTP(); // Set mailer to use SMTP
			$this->mail->Mailer = 'smtp';
			$this->mail->SMTPAuth = true; // authentication enabled
			$this->mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail ; encription options must match requirement of email service provider eg. gmail.com , yahoo.com , google.com

			//create env set up followed .env file
			$this->mail->Host = getenv('SAM_SMTP_HOST'); //SMTP server name
			$this->mail->Port = getenv('SAM_SMTP_PORT'); //TCP port to connect to 

			$environment = getenv('SAM_APP_ENV');
			//in dev, env is called local
			//in production, env is called production
			if($environment === 'local'){
				// this SMTPOptions have to be changed once we use GoDaddy server.
				$this->mail->SMTPOptions =[
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				];

				$this->mail->SMTPDebug =2; // Enable verbose debug output
				// $this->mail->SMTPDebug = '';
			}

			//auth info
			$this->mail->Username = getenv('SAM_EMAIL_USERNAME'); //SMTP username ; it is set in C:\xampp\sendmail\sendmail.ini and C:\xampp\php\php.ini
			$this->mail->Password = getenv('SAM_EMAIL_PASSWORD'); //SMTP password ; it is set in C:\xampp\sendmail\sendmail.ini and C:\xampp\php\php.ini

			//enable email to be send as html
			$this->mail->isHTML(true); // Set email format to HTML
			$this->mail->SingleTo = true;

			//sender info
			$this->mail->From = getenv('SAM_ADMIN_EMAIL'); 
			$this->mail->FromName= getenv('SAM_ADMIN_EMAIL'); 

		}catch(Exception $e){
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

	}

		//sent email information
	public function send($data)
	{
		$this->mail->addAddress($data['to'], $data['name']);
		$this->mail->Subject = $data['subject'];
		$this->mail->Body = _make($data['view'], array('data'=> $data['body']));
		
		return $this->mail->send();
	}
}
?>
