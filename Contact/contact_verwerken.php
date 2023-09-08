<?php
$servername = "localhost:3306"; // Het serveradres
$username = "epicberoeps"; // Jouw databasegebruikersnaam
$password = "*v17E4e4k"; // Jouw databasewachtwoord
$database = "db-contact"; // De naam van jouw database

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

if(isset($_POST["submit"])){
    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $bedrijfnaam = $_POST["bedrijfnaam"];
    $email = $_POST["email"];
    $vraag = $_POST["vraag"];

    $to = '088877@glr.nl';
    $subject = 'Contactformulier ingevuld';
    $message = "Naam: $naam\nAdres: $adres\nTelefoonnummer: $telefoonnummer\nBedrijfnaam: $bedrijfnaam\nE-mail: $email\nVraag: $vraag";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Uw bericht is verzonden.');</script>";
    } else {
        echo "<script>alert('Verzending mislukt. Probeer het later opnieuw!');</script>";
    }

    $sql = "INSERT INTO Gegevens (naam, adres, telefoonnummer, bedrijfnaam, email, vraag)
        VALUES ('$naam', '$adres', '$telefoonnummer', '$bedrijfnaam', '$email', '$vraag')";

    if ($conn->query($sql) === TRUE) {
        echo "Gegevens zijn succesvol opgeslagen in de database.";
    } else {
        echo "Fout bij het opslaan van gegevens: " . $conn->error;
    }

    $conn->close();
} ?>
