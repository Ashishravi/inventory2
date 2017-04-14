<?php

if (!empty($_FILES["myFile"])) {
    
    $target_dir = "uploads/"
    $myFile = $_FILES["myFile"];
    $extension = end(explode(".", $_FILES["myFile"]["name"]));
    $path=md5($current_date.$current_time).'.'.$extension;
    $target_file = $target_dir . basename($_FILES["myFile"]["name"]);
    
    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($_FILES["myFile"]["tmp_name"][$i], "uploads/".$path);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }
}

?>