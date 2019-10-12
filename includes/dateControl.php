<?php

    function convertTime($timestamp) 
    {
        $realTimeStart = new DateTime("2020-01-01T0:0:0");
        $onGameTimeStart = new DateTime("2060-01-01T0:0:0");

        $t1 = $realTimeStart->getTimestamp();
        $t2 = $onGameTimeStart->getTimestamp();

        $newTimestamp = 3*($timestamp - $t1) + $t2;

        $newDatetime = new DateTime();
        $newDatetime->setTimestamp($newTimestamp);
        
	    return $newDatetime->format("d-m-Y"); 
    }
?>