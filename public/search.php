<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // Query across city, state and post code, results behave like staffs implementation
    $places = CS50::query("SELECT * FROM places WHERE MATCH (postal_code,admin_name1,place_name,admin_code1,admin_name2,admin_code2) AGAINST (?)", $_GET["geo"] ); 

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>