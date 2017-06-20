<?php
    $gDblink = NULL;
  
    function dbInitialConnect($dbName)
    {
        global $gDblink;
        $gDblink = mysqli_connect(HOST, USER, PASS, $dbName);
        $error = mysqli_connect_error();
        if ($error) 
        {
            die('Unable to connect to database');
        }
    }

    function dbConnectClose()
    {
        global $gDblink;
        mysqli_close($gDblink);
    }

    function dbQuery($query)
    {
        global $gDblink;
        $result = mysqli_query($gDblink, $query);
        return $result;
    }

    function dbQueryGetResult($query)
    {
        global $gDblink;
        $data = array();
        if ($result = mysqli_query($gDblink, $query)) 
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                array_push($data, $row);
            }
        }
        mysqli_free_result($result);
        return $data;
    }

    function destroyInjection($injectableString)
    {
        global $gDblink;
        $safetyString = mysqli_real_escape_string($gDblink, $injectableString);
        return $safetyString;
    }