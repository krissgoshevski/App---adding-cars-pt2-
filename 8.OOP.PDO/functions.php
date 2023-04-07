<?php 

require_once __DIR__ . "/constsdb.php";

function encrypt($text) 
{  
    return openssl_encrypt($text, "AES-128-ECB", ENCRYPTION_PASSWORD);
}


function decrypt($encrypttxt) 
{
    
    return openssl_decrypt($encrypttxt, "AES-128-ECB", ENCRYPTION_PASSWORD);
}

?>
