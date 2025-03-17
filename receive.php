<?php
// Configurazione del database
$servername = "localhost";
$username = "root";
$password = ""; // Default per XAMPP
$dbname = "reglog";

// Creazione connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ricezione dati dal client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['dato'])) {
        $dato = $_POST['dato'];

        // Recupero del valore attuale di 'rifiuti'
        $query = "SELECT patito FROM ricevi WHERE id = 62"; // Cambia la condizione WHERE per selezionare l'utente corretto
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $valore_attuale = $row['patito'];

            // Somma il nuovo dato
            $nuovo_valore = $valore_attuale + $dato;

            // Aggiorna il valore di 'rifiuti'
            $stmt = $conn->prepare("UPDATE ricevi SET patito = ? WHERE id = 62"); // Cambia la condizione WHERE se necessario
            $stmt->bind_param("i", $nuovo_valore); // "i" per intero
            if ($stmt->execute()) {
                echo "Valore aggiornato con successo!";
            } else {
                echo "Errore nell'aggiornamento: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Nessun utente trovato!";
        }
    } else {
        echo "Parametro 'dato' non trovato!";
    }
}

$conn->close();
?>
