<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $mesaj = $_POST['mesaj'];

    // Deschideți sau creați baza de date SQLite
    $db = new SQLite3('contact.db');

    // Creați tabelul contact dacă nu există deja
    $db->exec('CREATE TABLE IF NOT EXISTS contact (nume TEXT, email TEXT, mesaj TEXT)');

    // Inserați datele în tabelul contact
    $insertQuery = "INSERT INTO contact (nume, email, mesaj) VALUES ('$nume', '$email', '$mesaj')";
    $result = $db->exec($insertQuery);

    if ($result) {
        echo "Mesajul a fost salvat în baza de date!";
    } else {
        echo "Eroare la salvarea mesajului în baza de date.";
    }

    $db->close();
}
?>