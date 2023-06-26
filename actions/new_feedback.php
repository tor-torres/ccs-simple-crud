<?php
if (isset($_POST['submit'])) {

    $fullname = stripslashes($_POST['fullname']);
    $email = stripslashes($_POST['email']);
    $message = stripslashes($_POST['message']);

    if(preg_match('/\d/', $fullname)){
        set_message("Your name cannot contain a number");
    }elseif (!preg_match('/@(yahoo\.com|gmail\.com|microsoft\.com)$/', $email));
        set_message("Only email addresses ending with @yahoo.com, @gmail.com, or @microsoft.com are allowed!", "warning");
    }else{

    $insert = "INSERT INTO feedback_table (fullname, email, message) VALUES (?, ?, ?)";
    $stmt = $DB->prepare($insert);
    $stmt->bind_param("sss", $fullname, $email, $message);

    if ($stmt->execute()) {
        set_message( "Submitted Successfully!", "success" );
    } else {
        set_message( "Error in database!", "danger" );
    }
} 
?>