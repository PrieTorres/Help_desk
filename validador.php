<?php

  session_start();

  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    header('Location: index.php?login=erro2'); // volta para a pagina index.ph e informa o parametro login como erro2
    
  }

?>