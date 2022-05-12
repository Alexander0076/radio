<?php
   session_destroy();
   header('Location:' . constant('URL') . "main/principal");  
?>