<?php
if (isset($_POST['btn-sbmt'])) {
    $title = stripslashes($_POST['title']);
    $description = stripslashes($_POST['description']);

    if (empty($error)) {
        $select = "SELECT title FROM image_carousel_table WHERE title = ?";
        $stmt = $DB->prepare($select);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();
        $check = $result->num_rows;

        if ($check > 0) {
            set_message( "Title already exist!", "warning" );
        } else {
            if (!empty($_FILES["image"]["name"])) {
                $file_name = $_FILES["image"]["name"];
                $file_size = $_FILES["image"]["size"];
                $tmp_name = $_FILES["image"]["tmp_name"];
                $valid_image_extension = ['jpg', 'jpeg', 'png'];
                $image_extension = explode(".", $file_name);
                $image_extension = strtolower(end($image_extension));
            
                if (!in_array($image_extension, $valid_image_extension)) {
                    set_message( "ERROR: Invalid Image Extension!", "warning" );
                } else if ($file_size > 3000000) {
                    set_message( "Image size too large. Please select a file less than 3MB.", "warning" );
                } else {
                    $new_image_name = uniqid();
                    $new_image_name .= "." . $image_extension;
                    move_uploaded_file($tmp_name, "./assets/img/" . $new_image_name);
                    $create = "INSERT INTO image_carousel_table (image, title, description) VALUES (?, ?, ?)";
                    $stmt = $DB->prepare($create);
                    $stmt->bind_param("sss", $new_image_name, $title, $description);
                    if ($stmt->execute()) {
                        set_message( "Created Successfully!", "success" );
                    } else {
                        set_message( "DATABASE ERROR : 404!", "danger" );
                    }
                }
        }
    }
}
}
?>