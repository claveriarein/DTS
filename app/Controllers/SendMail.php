<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use Modules\UserManagement\Models as UserManagement;
use Modules\UniversityManagement\Models as UniversityManagement;
use Modules\ReservationManagement\Models as ReservationManagement;

class SendMail extends Controller
{
    function __construct(){
        $this->email = \Config\Services::email();
        $this->usersModel = new UserManagement\UsersModel();
    }

    public function sendMail($to, $subject, $message) { 
        $this->email->setTo($to);
        $this->email->setFrom('Stack Overflow Development Team', 'LRFOIMS');
        
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        if($this->email->send()){
            return $this->email->printDebugger(['headers']);
            // return "Email sent!";
        }else{
            return $this->email->printDebugger(['headers']);
        }
    }

    public function sendMailForOffices($id){
        $custodians = $this->usersModel->get(['role_id' => 7]);
        $admins = $this->usersModel->get(['role_id' => 8]);
        $reservation = $this->reservationsModel->get(['id' => $id])[0];
        $president = $this->studentsModel->get(['id' => $reservation['student_id']])[0];
        $professor = $this->facultiesModel->get(['id' => $reservation['faculty_id']])[0];

        $subject = "For Approval: Reservation " . strtoupper($reservation['reservation_code']);
        $message = "<p>Good day, Sir/Ma'am! <br><br> A reservation has been approved by the administrative office. Kindly check the reservation for your approval. <br><br> Thank you! <br><br><br> Warm regards,</p><br><b>Administrative Office</b><br><p>** This email is system generated. Do not reply. **</p>";

        foreach($custodians as $custodian){
            $this->sendMail($custodian['email_address'], $subject, $message);
        }        
        foreach($admins as $admin){
            $this->sendMail($admin['email_address'], $subject, $message);
        }
        $this->sendMail($president['email_address'], $subject, $message);   
        $this->sendMail($professor['email_address'], $subject, $message);   

    } 

}