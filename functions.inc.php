<?php

require_once("db.inc.php");

function usersToSelect($u_id="", $ticket_id=0)
{
    $suffix = (empty($ticket_id)?"":"_{$ticket_id}");
    $sql = "select id,name from users order by id";
    $rows = queryWithSelect($sql);
    $_html = "<select id='user_id{$suffix}' name='user_id{$suffix}'>";
    $_html .= "<option value='0'>--选择一个用户--</option>";
    foreach($rows as $_r)
    {
        $checked = (($u_id == $_r['id'])?" selected='selected' ":"");
        $_html .= "<option value='{$_r['id']}' {$checked}>{$_r['name']}</option>";
    }
    $_html .= "</select>";

    return $_html;
}

function statusToSelect($status="", $ticket_id=0)
{
    $status_arr = array('New', 'Assigned', 'Finished');
    $suffix = (empty($ticket_id)?"":"_{$ticket_id}");

    $_html = "<select id='status{$suffix}' name='status{$suffix}'>";
    foreach($status_arr as $_s)
    {
        $checked = (($status == $_s)?" selected='selected' ":"");
        $_html .= "<option value='{$_s}' {$checked}>{$_s}</option>";
    }
    $_html .= "</select>";

    return $_html;
}

?>
