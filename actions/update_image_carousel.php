<?php

if (isset($_POST['btn-update'])) {
    $id = $_GET['id'];
    $title = stripslashes($_POST['title']);
    $description = stripslashes($_POST['description']);

    if (empty($error)) {
            if (!empty($_FILES["image"]["name"])) {
                $file_name = $_FILES["image"]["name"];
                $file_size = $_FILES["image"]["size"];
                $tmp_name = $_FILES["image"]["tmp_name"];
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

                    $query = "SELECT image FROM image_carousel_table WHERE id = ?";
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

                    $update = "UPDATE image_carousel_table SET image = ?, title = ?, description = ? WHERE id = ?";
                    $stmt = $DB->prepare($update);
                    $stmt->bind_param("sssi", $new_image_name, $title, $description, $id);

                    if ($stmt->execute()) {
        			    set_message( "Updated Successfully!", "success" );
                        header("Location: image-carousel");
                    } else {
                        set_message( "Error sa database!", "danger" );
                    }
                }
            } else {
                
                // Update without changing the image
                $update = "UPDATE image_carousel_table SET title = ?, description = ? WHERE id = ?";
                $stmt = $DB->prepare($update);
                $stmt->bind_param("ssi", $title, $description, $id);

                if ($stmt->execute()) {
    			    set_message( "Updated Successfully!", "success" );
                    header("Location: image-carousel");

                } else {
                    set_message( "Error sa database!", "danger" );
                }
            }
        }
    }
?>