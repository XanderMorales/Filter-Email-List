<?php


require('VerifyEmail.php');


//$file = file_get_contents('./emailz.txt', true);
$file = explode("\n", file_get_contents('emailz.txt'));

$count = 0;
foreach($file as $email) {
    $count ++;    
    $ve = new VerifyEmail($email, 'xandermorales@gmail.com');
    if($ve->verify()) {
        $myfile = file_put_contents('good-emailz.txt', $email.PHP_EOL , FILE_APPEND | LOCK_EX);
        // echo "$email goood<br>";
    } else {
        echo "$email<br>";
    }
    
   // if($count == 30) { exit(); }
    /*
    if(valid_email($email)) {
        echo $email . '<br>';
    } else {
        echo '<h1>bademail</h1>' . $email . '<br>';
    }
    */
}


function valid_email($email) {
    return !!filter_var($email, FILTER_VALIDATE_EMAIL);
}
?>