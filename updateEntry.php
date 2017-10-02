<?php
require_once 'db.php';
$db = new Db();
$response = $db->update_by_id($_POST['id'], $_POST['description']);