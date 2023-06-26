<?php 
    $id = $_GET['id'];
    $result = $DB->query("DELETE FROM image_carousel_table WHERE id = $id");
    header("Location: ?page=image-carousel");
    set_message( "Deleted Successfully!", "success" );
?>