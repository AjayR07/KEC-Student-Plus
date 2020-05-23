<?php
    $start="17/02/2019";
    $end="22/02/2019";
    $p=date("Y-m-d", strtotime(str_replace('/', '-', $start)));
    echo '<br>'.$p;
    $q=date("Y-m-d", strtotime(str_replace('/', '-', $end)));
    echo '<br>'.$q;
    $diff=date_diff(date_create($p),date_create($q));
    $days=$diff->format("%a")+1;

    echo '<br>'.$days;
?>
