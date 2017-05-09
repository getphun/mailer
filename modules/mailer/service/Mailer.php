<?php
/**
 * mailer service
 * @package mailer
 * @version 0.0.1
 * @upgrade true
 */

namespace Mailer\Service;
use Core\Library\View;

class Mailer {
    
    protected $_error;
    
    public function getError(){
        return $this->_error;
    }
    
    public function send(String $view, Array $params=[]){
        $mail = new \PHPMailer;
        $mailer = \Phun::$config['mailer'];
        if(isset($mailer['SMTP']) && $mailer['SMTP'])
            $mail->isSMTP();
        
        $mail->isHTML(true);
        
        // default configs
        $configs = [
            'Host',
            'SMTPAuth',
            'Username',
            'Password',
            'SMTPSecure',
            'Port'
        ];
        foreach($configs as $conf){
            if(isset($mailer[$conf]))
                $mail->$conf = $mailer[$conf];
        }
        
        $mail->setFrom($mailer['FromEmail'], $mailer['FromName']);
        $mail->Subject = $params['subject'];
        
        foreach($params['to'] as $to){
            if(isset($to['name']))
                $mail->addAddress($to['email'], $to['name']);
            else
                $mail->addAddress($to['email']);
        }
        
        $html = new View('mailer', $view, $params);
        $mail->Body = $html->content;
        
        if(!$mail->send()){
            $this->_error = $mail->ErrorInfo;
            return false;
        }
        
        return true;
    }
}