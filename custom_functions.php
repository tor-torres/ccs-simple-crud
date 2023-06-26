<?php
function title(){
    global $DB;
    $query =$DB->query("SELECT * FROM settings");
    $row = $query->fetch_assoc();
    return $row['title'];
}