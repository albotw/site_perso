<?php
$to = "yann.trou@gmail.com";
$subject = "Test email PHP";
$body = "email test PHP";
$header = "From: yann.trou@gmail.com";

try {
    mail($to, $subject, $body, $header);
}catch(Exception $exception)
{
    echo $exception->getMessage();
}