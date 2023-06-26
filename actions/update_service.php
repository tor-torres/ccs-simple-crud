<?php
if (isset($_POST['btn-update'])) {
    $id = $_GET['id'];
    $title = stripslashes($_POST['title']);
    $description = stripslashes($_POST['description']);

    if (empty($error)) {

        $select = "SELECT title FROM services_table WHERE title = ?";
        $stmt = $DB->prepare($select);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();
        $check = $result->num_rows;

        if ($check > 0) {
            set_message("Title already exist!", "warning");
        } else {

            $update = "UPDATE services_table SET title = ?, description = ? WHERE id = ?";
            $stmt = $DB->prepare($update);
            $stmt->bind_param("ssi", $title, $description, $id);

            if ($stmt->execute()) {
                set_message("Updated Successfully!", "success");
                header("Location: services");
                exit;
            } else {
                set_message("Error sa database!", "danger");
            }
        }
    }
}
?>