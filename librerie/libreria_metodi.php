<?php 

function get_param($name) {
    if (isset($_GET[$name])) {
      return $_GET[$name];
    }
    
    if (isset($_POST[$name])) {
      return $_POST[$name];
    }
  
    return null;
  }


 function get_db_array($name) {
  $db = new Database();
  $ordini_array = array();
  $ordini = $db->conn->query("SELECT * FROM $name");
  
  if ($ordini) {
      while ($row = $ordini->fetch_assoc()) {
          $ordini_array[] = $row;
      }
  } else {
      // Gestione errore query
  }
  
  return $ordini_array;
}
  