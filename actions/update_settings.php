<?php
if (isset($_POST['btn-update'])) {
    $title = stripslashes($_POST['title']);

    if ($title == '') {
            set_message("Cannot be empty!", "warning");
        } else {

            $update = "UPDATE settings SET title = ?";
            $stmt = $DB->prepare($update);
            $stmt->bind_param("s", $title);

            if ($stmt->execute()) {
                set_message("Updated Successfully!", "success");
                header("Location: settings");
            } else {
                set_message("Error sa database!", "danger");
            }
        }
    }
?>