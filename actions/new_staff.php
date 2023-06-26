<?php
if (isset($_POST['btn-create'])) {
    $fullname = stripslashes($_POST['fullname']);
    $position = stripslashes($_POST['position']);

    if (empty($error)) {
        $select = "SELECT fullname FROM staff_table WHERE fullname = ?";
        $stmt = $DB->prepare($select);
        $stmt->bind_param("s", $fullname);
        $stmt->execute();
        $result = $stmt->get_result();
        $check = $result->num_rows;

        if ($check > 0) {
            set_message( "Fullname already exist!", "warning" );
        } else {
            if (!empty($_FILES["avatar"]["name"])) {
                $file_name = $_FILES["avatar"]["name"];
                $file_size = $_FILES["avatar"]["size"];
                $tmp_name = $_FILES["avatar"]["tmp_name"];
                $valid_image_extension = ['jpg', 'jpeg', 'png'];
                $image_extension = explode(".", $file_name);
                $image_extension = strtolower(end($image_extension));
            
                if (!in_array($image_extension, $valid_image_extension)) {
                    set_message( "Invalid file!", "warning" );
                } else if ($file_size > 3000000) {
                    set_message( "Image file is to large, only accept less than 3mb!", "warning" );
                } else {
                    $new_image_name = uniqid();
                    $new_image_name .= "." . $image_extension;
                    move_uploaded_file($tmp_name, "./assets/img/" . $new_image_name);
                    $create = "INSERT INTO staff_table (avatar, fullname, position) VALUES (?, ?, ?)";
                    $stmt = $DB->prepare($create);
                    $stmt->bind_param("sss", $new_image_name, $fullname, $position);

                    if ($stmt->execute()) {
                        set_message( "Created Successfully!", "success" );
                    } else {
                        set_message( "Database error!", "danger" );
                    }
                }
        }
    }
}
}
?>