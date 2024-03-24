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
  