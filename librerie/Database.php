<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "pizzeria";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connessione fallita: " . $this->conn->connect_error);
        }
    }

    public function insertProdotto($nome, $fornitore, $prezzo) {
        $nome = $this->conn->real_escape_string($nome);
        $fornitore = $this->conn->real_escape_string($fornitore);
        $prezzo = $this->conn->real_escape_string($prezzo);

        $sql = "INSERT INTO prodotti (nome, fornitore, prezzo) VALUES ('$nome', '$fornitore', '$prezzo')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    
    public function insertOrdine($id_prodotto, $prezzp, $quantita) {
        $id_prodotto = $this->conn->real_escape_string($id_prodotto);
        $prezzo = $this->conn->real_escape_string($prezzp);
        $quantita = $this->conn->real_escape_string($quantita);
        $data = date('Y-m-d'); // Ottieni la data corrente nel formato 'YYYY-MM-DD HH:MM:SS'


        $sql = "INSERT INTO ordini (id_prodotto, data_inserimento, prezzo, quantita) VALUES ('$id_prodotto','$data', '$prezzo', '$quantita')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function ottieniProdotti (){
        $result = $this->conn->query("SELECT * FROM prodotti");

        // Costruisci il formato HTML della tabella
        $html = "";
        while ($row = $result->fetch_assoc()) {
            $html .= "<tr>";
            $html .= "<td>" . $row['idProdotto'] . "</td>";
            $html .= "<td>" . $row['Nome'] . "</td>";
            $html .= "<td>" . $row['prezzo'] . "</td>";
            $html .= "<td>" . $row['fornitore'] . "</td>";
            $html .= "</tr>";
        }
        return $html;
    }


    public function ottieniNome($id) {
        $result = $this->conn->query("SELECT prezzo FROM prodotti WHERE idProdotto = '$id'");
        
        if ($result && $result->num_rows > 0) {
            // Estrai il prezzo dalla riga risultante
            $row = $result->fetch_assoc();
            $prezzo = $row['prezzo'];
            
            // Restituisci il valore del prezzo
            return $prezzo;
        } else {
            // Se non ci sono risultati, restituisci null o un valore predefinito
            return null;
        }
    }
    
    public function closeConnection() {
        $this->conn->close();
    }
}
?>
