<?php
namespace common\libs;
use common\libs\PHPMailer;
/**
 * senEmail.php
 */
class SenEmail
{
    /**
     * summary
     */
    public function SenEmail($senEmail,$subject,$body = "no body")
    {
        $email = new PHPMailer();

        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth    = true;
        $email->Username    = 'lecongthanhhn8912@gmail.com';
        $email->Password    = 'u3ve0n2Op7y2kTL6sfsN';
        $email->SMTPSecure  = 'ssl';
        $email->Port        = 465;
        $email->isHTML(true);
        $email->CharSet = 'UTF-8';
       
        $email->SetFrom('nguyensonqang240@gmail.com', 'Mailer');
        
        if (is_array($senEmail)) {
        	foreach ($senEmail as $value) {
        		$email->addAddress($value);
        	}
        }else {
    		$email->addAddress($senEmail);
        }

        $email->Subject = $subject;
        $email->Body = $body;

        // $email->Subject = 'Here is the subject';
        // $email->Body    = 'This is the HTML message body <b>in bold!</b>';
        $email->AltBody = 'This is the body in plain text for non-HTML email clients';

        if ($email->send()) {
        	echo 'Message has been sent';
        }else {
            dbg($email->ErrorInfo);
        	echo 'Message couldn\'n been sent';
        	echo 'Mailer Error : '.$email->ErrorInfo;
        }
    }
}