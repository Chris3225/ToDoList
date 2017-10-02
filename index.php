<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/default.css" />
        <title>Meine ToDo Liste</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>

    <body>
    <div id="container">
        <h1>My to-Do List</h1>
        <ul id="tabs">
            <li id="todo_tab" class="selected"><a href="#">To-Do</a></li>
        </ul>
        <div id="main">
            <div id="todo">
                <?php
                    require 'db.php';
                    $db = new Db();
                    $query = "SELECT * FROM todo ORDER BY id asc";
                    $results = $db->mysql->query($query);
                    if($results->num_rows) {
                        while($row = $results->fetch_object()) {
                            $title = $row->title;
                            $description = $row->description;
                            $id = $row->id;
                    echo '<div class="item">';

                    $data = <<<EOD
                        <h4> $Title </h4> 
                        <p> $description </p> 
                        
                        <input type="hidden" name="id" id="id" value="$id" /> 
  
                        <div class="options"> 
                            <a class="deleteEntryAnchor" href="delete.php?id=$id">D</a> 
                            <a class="editEntry" href="#">E</a> 
                        </div> 
EOD;
          
                    echo $data; 
                    echo '</div>'; 
                        } 
                    } else { 
                        echo "<p>Keine Aufgaben in der Liste.</p>";
                    } 
                ?> 
            </div>
            <div id="addNewEntry">
                ...
            </div>
        </div>
    </div>
    </body>
</html>