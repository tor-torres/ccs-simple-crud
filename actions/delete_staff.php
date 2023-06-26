<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM staff_table WHERE id = $id");
    header("Location: ?page=staff");
    set_message( "Deleted Successfully!", "success" );
?>