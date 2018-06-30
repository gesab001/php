<?php

    if ($db = sqlite_open('sampleDB', 0666, $sqliteerror) ) { 
        $result = sqlite_query($db, 'select bar from foo');
        var_dump(sqlite_fetch_array($result) ); 
    } else {
        die($sqliteerror);
    }

?>
