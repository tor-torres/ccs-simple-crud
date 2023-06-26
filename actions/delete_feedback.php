<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM feedback_table WHERE id = $id");
    header("Location: ?page=feedback");
    set_message( "Deleted Successfully!", "success" );
?>