<?php

$db = new SQLite3("contactgegevens.db");
$db->busyTimeout(5000);

if(isset($_POST["submit"])){
    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $email = $_POST["email"];
    $vraag = $_POST["vraag"];

    $to = '88877@glr.nl';
    $subject = 'Contactformulier ingevuld';
    $message = "Naam: $naam\nAdres: $adres\nTelefoonnummer: $telefoonnummer\nE-mail: $email\nVraag: $vraag";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Uw bericht is verzonden.');</script>";
    } else {
        echo "<script>alert('Uw bericht kon niet worden verzonen. Probeer het later opnieuw!');</script>";
    }

    $query = "INSERT INTO contactgegevens (Naam, Adres, Telefoonnummer, Email, Vraag) VALUES ('$naam', '$adres', '$telefoonnummer', '$email', '$vraag')";
    $db->exec($query);
}

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $db->exec("DELETE FROM contactgegevens WHERE ID='$id'");
}

?>
