<?php
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
echo "Uploading..." . $fn;
if ($fn) {
    echo "... through AJAX...";
    // AJAX call
    file_put_contents(
        '../uploads/' . $fn,
        file_get_contents('php://input')
    );
    echo "$fn uploaded";
    exit();
} else {
    // form submit
    echo "... through form submit...";
    $files = $_FILES['fileselect'];
    var_dump($files);
    foreach ($files['error'] as $id => $err) {
        echo $id . ", " . $err . "\n";
        echo "<p>kkmk</p>";
        echo "<p>err == UPLOAD_ERR_OK ?" . ($err == UPLOAD_ERR_OK) . "</p>";
        if ($err == UPLOAD_ERR_OK) {
            $fn = $files['name'][$id];
            echo "fn = " . $fn;
            $success = move_uploaded_file(
                $files['tmp_name'][$id],
                '../uploads/' . $fn
//                '/opt/ui/irina/licenta/html/uploads/' . $fn
            );
            echo "success: " . $success;
            echo "true: " . true;
            echo "false: " . false;
            echo "<p>File $fn uploaded.</p>";
        } else  {
            echo "<p>Error while uploading the file '" . $fn . "'. Error is: " . $err . "</p>";
        }
    }
}