<?php
$email = "example@exa mple.com";

if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)){
         exit ("E-mail is not valid");
}else{
         echo "E-mail is valid";
}

?>