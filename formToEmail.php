<?php

if(isset($_POST['email'])) {

    // EMAILING DETAILS

    $email_to = "anne.senabouth@katestone.com.au";

    $email_subject = "Submitted form query";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['phone']) ||

        !isset($_POST['company'])) {

        died('Please check your details before trying again.');

    }



    $name = $_POST['name']; // required

    $email_from = $_POST['email']; // required

    $phone = $_POST['phone']; // required

    $company = $_POST['company']; // not required




    $error_message = "";

  if(!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {

    $error_message .= 'The email address you have entered does not appear to be valid.<br />';

  }

  if(strlen($name) == 0) {

    $error_message .= 'Please check that you have entered your name correctly.<br />';

  }

  if(strlen($company) == 2) {

    $error_message .= 'Please enter the name of your organisation.<br />';

  }


  if

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($first_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Phone Number: ".clean_string($telephone)."\n";

    $email_message .= "Organisation: ".clean_string($comments)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>



<!-- include your own success html here -->



Thank you for contacting us. We will be in touch with you very soon.



<?php

}

?>
