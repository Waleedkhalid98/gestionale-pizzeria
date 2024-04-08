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

    case "inserisciOrdine": 

        $idProdotto=get_param("_id");
        $prezzo=get_param("_prezzo");
        $quantita=get_param("_quantita");
        
            if ($db->insertOrdine($idProdotto, $prezzo, $quantita)) {
            echo "Ordine inserito con successo";
            } else {
                echo "Errore nell'inserimento del prodotto";
            }

    break;

    case "RecuperoProdotti":

        $risultato  = $db->ottieniProdotti();
        echo $risultato;
       
    break;  
    
    case "recuperaProdNome";
        
        $id = get_param("_k");
        $prezzo = $db->ottieniNome($id);

        echo $prezzo;
    break;
 
    
}   
?>