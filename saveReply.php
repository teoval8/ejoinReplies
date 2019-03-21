<?php

include_once("Database.php");
include_once("models/risposte_sms.php");

$conn = Database::getConnection();

$getstring = "";

if(!empty($_GET)) {  //If we have something
    foreach ($_GET as $key => $value) {
        $getstring .= "KEY: " . $key . " => " . $value . "\n";
    }

    mail("matteovalotto@aimon.it", "Nuova risposta registrata su ejoin", "Nuova risposta registrata dal gateway ejoin\nDi seguito l'array get\n\n" . $getstring . "\n\nVerifica nel db se tutto funziona");

    $risposta = new risposte_sms($_GET['username'], $_GET['password'], $_GET['sender'], $_GET['receiver'], $_GET['port'], $_GET['charset'], $_GET['content']);
    access_risposte_sms::insertResply($risposta);
}