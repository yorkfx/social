<?php

function post($key) {
    if (isset($_POST[$key]))
        return $_POST[$key];
    return false;
}

// setup the database connect
$cxn = mysql_connect('localhost', 'root', 'root');
if (!$cxn)
    exit;
mysql_select_db('samia', $cxn);

// check if we can get hold of the form field
if (!post('my_value'))
    exit;

// let make sure we escape the data
$val = mysql_real_escape_string(post('my_value'), $cxn);

// lets setup our insert query
$sql = sprintf("INSERT INTO %s (column_name_goes_here) VALUES '%s';",
                'table_name_goes_here',
                $val
);

// lets run our query
$result = mysql_query($sql, $cxn);

// setup our response "object"
$resp = new stdClass();
$resp->success = false;
if($result) {
    $resp->success = true;
}

print json_encode($resp);
?>

