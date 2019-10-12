<?php
    function createLink($queryString, $popup) 
    {
        $baseUrl = $popup ? 'popup.php' : 'main.php'; 
        return $baseUrl . "?" . $queryString . "&popup=1";
    }
?>