<?php
/**
 * Created by PhpStorm.
 * User: pohldom
 * Date: 02.10.2017
 * Time: 13:37
 */

class Db
{
    public $mysql;

    function __construct()
    {
        $this->mysql = new mysqli('localhost', 'root', '', 'db') or die('problem');
    }

    function delete_by_id($id)
    {
        $query = "DELETE from todo WHERE id = $id";
        $result = $this->mysql->query($query) or die('Fehler beim Löschen der Aufgabe.');

        if($result) {
            return 'Funktioniert ohne Fehlermeldung';
        }
    }

    function update_by_id($id, $description)
    {
        $query = "UPDATE todo SET description = ? WHERE id = ? LIMIT 1";

        if($stmt = $this->mysql->prepare($query)) {
            $stmt->bind_param('si', $description, $id);
            $stmt->execute();
            return 'Updaten der Aufgabe erfolgreich.';
        }
    }
}