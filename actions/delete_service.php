<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM services_table WHERE id = $id");
    header("Location: ?page=services");
    set_message( "Deleted Successfully!", "success" );
?>