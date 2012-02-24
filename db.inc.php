<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","111111");
define("DB_NAME","pm");

function getDBConnect()
{
    $db = @mysql_pconnect(DB_HOST, DB_USER, DB_PASS);
    @mysql_select_db(DB_NAME, $db);
    @mysql_set_charset("utf8", $db);
    return $db;
}

function queryExec($sql)
{
    global $db;
    @mysql_query($sql, $db);
}

/*
 * @return array("fieldname"=>"field value")
 */
function queryWithSelect($sql)
{
    global $db;
    $result = mysql_query($sql, $db);
    if (mysql_num_rows($result) == 0) {
        echo "Empty";
        return null;
    }

    $rows = array();
    while($_r = mysql_fetch_assoc($result))
    {
        $rows[] = $_r;
    }
    return $rows;
}

$db = getDBConnect();