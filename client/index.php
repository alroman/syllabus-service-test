<?php

$srs = isset($_POST['srs']) ? $_POST['srs'] : '';
$term = isset($_POST['term']) ? $_POST['term'] : '';
$filename = isset($_POST['file_name']) ? $_POST['file_name'] : '';
$url = isset($_POST['url']) ? $_POST['url'] : '';
$token = isset($_POST['token']) ? $_POST['token'] : '';

// Save the file..
if(isset($_POST['file_name'])) {
    $path = './files';
    $fname = $_POST['file_name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $path . '/' . $fname);
}

// Save data to DB
$sql = 'INSERT INTO syllabus_incoming'
    . '(id, term, srs, filename, url, token)'
    . 'VALUES' 
    . '(NULL, "' . $term . '","' . $srs . '","' . $filename . '","' . $url . '","' . $token . '")';

mysql_connect('localhost', 'syllabus', 'syllabus');
mysql_select_db('syllabus');
mysql_query($sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Syllabus client</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>This is intentionally blank.</div>
    </body>
</html>
