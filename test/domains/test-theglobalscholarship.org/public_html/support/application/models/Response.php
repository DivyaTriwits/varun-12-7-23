<?php
class Response extends CI_Model{
    
        public function send_sms($mobileNumberArray,$messageToSend,$tempId){
            // print_r('in sms function');exit;
            $username = '9620030302';
            $hash = 'G6bdgLBhH';
            $sender = urlencode('TRITGS');
            $message = rawurlencode($messageToSend);

            $numbers = $mobileNumberArray;
            
            // Prepare data for POST request
            $data = array('username' => $username, 'password' => $hash, 'to' => $numbers, "from" => $sender, "msg" => $message,"type" => "1","template_id" => $tempId);
            
            // Send the POST request with cURL
            $ch = curl_init('https://sms.office24by7.com/API/sms.php');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            //print_r($response);exit;
            // Process your response here
            return $response;
        }
        
        
        public function redirectToWhatsApp($username,$mobileNumber,$message,$redirect){
            $insertArray = array(
                'student_username' => $username,
                'mobile_no'  => $mobileNumber,
                'page_url'  =>$redirect,
                'contacted_date'  => date('Y-m-d H:i:s'),
                'contacted_by'  => $this->session->userdata('username')
                );
                if($this->db->insert('contact_logger',$insertArray)){
                    redirect('https://api.whatsapp.com/send/?phone=91'.$mobileNumber.'&text='.$message);
                }else{
                    redirect($redirect);
                }
        }
}
?>