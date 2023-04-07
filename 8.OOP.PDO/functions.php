<?php 

// simetricna enkripcija e koga 5 pati klikame istata enkripcija da ni ja dava
// asimetricna e obratno 
require_once __DIR__ . "/constsdb.php";

function encrypt($text) // ovde go enkriptiram t.e. od random text primer (hello) stanuva afksfhsdkjf 
{  
    return openssl_encrypt($text, "AES-128-ECB", ENCRYPTION_PASSWORD);
}


function decrypt($encrypttxt) // ovde go vrakam od afksfhsdkjf vo istiot prethoden text stanuva pak (hello)
{
    
    return openssl_decrypt($encrypttxt, "AES-128-ECB", ENCRYPTION_PASSWORD);
}



// stigna do 1:11:30 
?>