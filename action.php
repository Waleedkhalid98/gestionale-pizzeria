<?php
include 'librerie/Database.php';
include 'librerie/libreria_metodi.php';
  
$db = new Database();



$paction=get_param("_action");

switch($paction) 
{	
    case "inserisciProdotto": 
       $nome=get_param("_nome");
       $fornitore=get_param("_fornitore");
       $prezzo=get_param("_prezzo");
       
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