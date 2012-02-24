<html>
<head>
<meta charset='utf-8' />
<title>SFA in China</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/sfa.js"></script>
</head>
<body>
<div class='panel'>
<?php
    require_once("db.inc.php");
    require_once("functions.inc.php");
    $sql = "select
                t.id,t.number,t.title,t.description,t.link,t.status,t.create_at,
                u.id as uid,u.name
            from tickets t
            left join users u on u.id=t.user_id
            order by t.create_at desc";

    $rows = queryWithSelect($sql);

    if(!empty($rows)) :
?>
<table class='tblist'>
    <tr class='listhead'>
        <th class='td50'>No</th>
        <th class='td200'>Title</th>
        <th class='td200'>Description</th>
        <th class='td50'>Link</th>
        <th class='td80'>Status</th>
        <th class='td80'>User</th>
        <th class='td120'>Create</th>
        <th class='td80'>Action</th>
    </tr>
<?php foreach($rows as $_r) : ?>
    <tr class='listitem'>
        <td><?php echo $_r["number"]; ?></td>
        <td><?php echo substr($_r["title"],0,200); ?></td>
        <td><?php echo substr($_r["description"],0,200); ?></td>
        <td><a target="_blank" href='<?php echo $_r["link"]; ?>'>go</a></td>
        <td><?php echo statusToSelect($_r["status"], $_r['id']); ?></td>
        <td><?php echo usersToSelect($_r["uid"], $_r['id']); ?></td>
        <td><?php echo $_r["create_at"]; ?></td>
        <td><input type="button" id='upd_btn_<?php echo $_r["id"]; ?>' name='upd_btn_<?php echo $_r["id"]; ?>'
                value="update" onclick="update(<?php echo $_r['id']; ?>);" /></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</div>
<div class="panel">
<form name='EditForm' action="add.php">
    <table class='tblist'>
        <tr class='listitem'>
            <td>Ticket No</td>
            <td><input name='number' value="" /></td>
        </tr>
        <tr class='listitem'>
            <td>Title</td>
            <td><input name='title' value="" /></td>
        </tr>
        <tr class='listitem'>
            <td>Description</td>
            <td><input name='description' value="" /></td>
        </tr>
        <tr class='listitem'>
            <td>RTC Link</td>
            <td><input name='link' value="" /></td>
        </tr>
        <tr class='listitem'>
            <td>Satus</td>
            <td><?php echo statusToSelect(); ?></td>
        </tr>
        <tr class='listitem'>
            <td>User</td>
            <td><?php echo usersToSelect(); ?></td>
        </tr>
        <tr class='listitem'>
            <td colspan="2"><input type="Submit" id='upd_btn_<?php echo $_r["id"]; ?>' name='upd_btn_<?php echo $_r["id"]; ?>'
                    value="update" onclick="update(<?php echo $_r['id']; ?>);" /></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>