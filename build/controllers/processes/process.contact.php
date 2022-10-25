<?php
    //instantiate class.forms.php
    $form = new forms();

    if($form->_forbid_direct_access()){
        forbidden_page();
    }

    //set return uri
    $return_uri = $_SERVER['HTTP_REFERER'];

    if($form->_is_demo()){
        $_SESSION['ice_error'] = 'The site is in Demo Mode. No actions will be executed!';
		header('location:'.$return_uri.'');
		exit();
    }

    //check and verify the nonce
    if(!$form->_nonce_passed($_POST)){
        forbidden_page();
    }

    //check if the request is valid
    $op = $form->valid_request($_POST);

    //instantiate the validation class
    use Respect\Validation\Validator as v;


    if($op === null){
        forbidden_page();
    }

    if($op === 'new'){
        $name = clean_post('name');             $_SESSION['cont']['name'] = $name;
        $email = clean_post('email');           $_SESSION['cont']['email'] = $email;
        $subject = clean_post('subject');       $_SESSION['cont']['subject'] = $subject;
        $message = clean_post('message');       $_SESSION['cont']['message'] = $message;

        if(!v::alnum(' ')->validate($name)){
            $_SESSION['ice_error'] = 'The name provided is invalid';
            header('location:'.$return_uri.'');
            exit();
        }

        if(!v::email()->validate($email)){
            $_SESSION['ice_error'] = 'The email provided is invalid';
            header('location:'.$return_uri.'');
            exit();
        }

        if(!v::stringType()->notEmpty()->validate($subject)){
            $_SESSION['ice_error'] = 'The subject provided is invalid';
            header('location:'.$return_uri.'');
            exit();
        }

        if(!v::stringType()->notEmpty()->validate($message)){
            $_SESSION['ice_error'] = 'The message provided is invalid';
            header('location:'.$return_uri.'');
            exit();
        }

        //build the message
        $msg = "
        You have a new contact message.<br>
        -----------------------------------------------
        <p>Name: $name</p>
        <p>$message</p>
        ";
        //instantiate our mail sender
        $mail = new Nette\Mail\Message;
        $mail//->setFrom('Contact Form <noreply@isvipi.com>')
             ->setFrom(''.$name.' <'.$email.'>')
             ->addTo(CONTACT_EMAIL)
             ->setSubject($subject)
             ->setHtmlBody($msg);
        
        //send email
        $mailer = new Nette\Mail\SendmailMailer;
        $mailer->send($mail);

        unset($_SESSION['cont']);

        $_SESSION['ice_error'] = 'Your message has been sent successfully.';
        header('location:'.$return_uri.'');
        exit();

    }


