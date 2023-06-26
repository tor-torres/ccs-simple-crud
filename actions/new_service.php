<?php
if (isset($_POST['btn-sbmt'])) {

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
            set_message( "Cannot be save data already exist.", "warning" );
        } else {
            $insert = "INSERT INTO services_table (title, description) VALUES (?, ?)";
            $stmt = $DB->prepare($insert);
            $stmt->bind_param("ss", $title, $description);

            if ($stmt->execute()) {
			    set_message( "Created Successfully!", "success" );
            } else {
                set_message( "Error in database!", "danger" );
            }
        }
    }
}
?>