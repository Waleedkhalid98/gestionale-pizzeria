<?php
include 'librerie/Database.php';

$db = new Database();


function get_param($name) {
    if (isset($_GET[$name])) {
      return $_GET[$name];
    }
    
    if (isset($_POST[$name])) {
      return $_POST[$name];
    }
  
    return null;
  }
  

$paction=get_param("_action");

switch($paction) 
{	
    case "inserisciProdotto": 
       $nome=get_param("_nome");
       $fornitore=get_param("_fornitore");
       $prezzo=get_param("_prezzo");
       echo $saluto ='ciao'.$nome.$fornitore.$prezzo;
       
        if ($db->insertProdotto($nome, $fornitore, $prezzo)) {
        echo "Prodotto inserito con successo";
        } else {
            echo "Errore nell'inserimento del prodotto";
        }

    break;

    case "RecuperoProdotti":
       $risultato  = $db->ottieniProdotti();
       echo $risultato;
       
    break;  
    
    case"ciao":
        echo "ciao";
    break;  
    
}   
?>