<?php
    
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;
    if($conn = OCILogon("hr", "hr", $db))
    {
        // echo "Successfully connected to Oracle.\n .'<br>'";
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . "Error Message : Failed Error " . $err;
    }

?>

