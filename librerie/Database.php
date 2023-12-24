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
    
    public function closeConnection() {
        $this->conn->close();
    }
}
?>
