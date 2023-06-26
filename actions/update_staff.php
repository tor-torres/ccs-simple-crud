<?php
if (isset($_POST['btn-update'])) {
    $id = $_GET['id'];
    $fullname = stripslashes($_POST['fullname']);
    $position = stripslashes($_POST['position']);

    if (empty($error)) {
            $select = "SELECT * FROM staff_table WHERE fullname = ?";
            $stmt = $DB->prepare($select);
            $stmt->bind_param("s", $fullname);
            $stmt->execute();
            $result = $stmt->get_result();
            $check = $result->num_rows;

            if(preg_match('/\d/', $fullname)){
                set_message("Staff Fullname cannot be a number!", "warning");
            }elseif ($check > 0) {
                set_message("Staff Fullname already exist!", "warning");
            }else {

            if (!empty($_FILES["avatar"]["name"])) {
                $file_name = $_FILES["avatar"]["name"];
                $file_size = $_FILES["avatar"]["size"];
                $tmp_name = $_FILES["avatar"]["tmp_name"];
                $valid_image_extension = ['jpg', 'jpeg', 'png'];
                $image_extension = explode(".", $file_name);
                $image_extension = strtolower(end($image_extension));
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $tmp_name);
                finfo_close($finfo);

                if (!in_array($image_extension, $valid_image_extension) || !preg_match('/^image\/(jpeg|png)$/', $mime_type)) {
                    set_message( "Invalid format/file extension.", "warning" );
                } else if ($file_size > 3000000) {
                    set_message( "Image size is to large. Please select less than 3mb.", "warning" );
                } else {

                    $query = "SELECT avatar FROM staff_table WHERE id = ?";
                    $stmt = $DB->prepare($query);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->bind_result($existing_image);
                    $stmt->fetch();
                    $stmt->close();

                    if (!empty($existing_image)) {
                        $existing_image_path = "./assets/img/" . $existing_image;
                        if (file_exists($existing_image_path)) {
                            unlink($existing_image_path);
                        }
                    }

                    imagejpeg($image, $upload_path);
                    imagedestroy($image);

                    $update = "UPDATE staff_table SET avatar = ?, fullname = ?, position = ? WHERE id = ?";
                    $stmt = $DB->prepare($update);
                    $stmt->bind_param("sssi", $new_image_name, $fullname, $position, $id);

                    if ($stmt->execute()) {
        			    set_message( "Updated Successfully!", "success" );
                        header("Location: staff");
                    } else {
                        set_message( "Error sa database!" . $DB->error, "danger" );
                    }
                }
            } else {
                
                // Update without changing the image
                $update = "UPDATE staff_table SET fullname = ?, position = ? WHERE id = ?";
                $stmt = $DB->prepare($update);
                $stmt->bind_param("ssi", $fullname, $position, $id);

                if ($stmt->execute()) {
    			    set_message( "Updated Successfully!", "success" );
                    header("Location: staff");
                    exit;
                } else {
                    set_message( "Error sa database!" . $DB->error, "danger" );
                }
            }
        }
    }
}
?>