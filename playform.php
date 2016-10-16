<?php
if ( ! empty( $_POST ) ) {
## MySQL Query Function:

// Load the MySQL Connection Script:
// Setup Files:
include('../../public_ftp/connect.php'); // Connection stored in $dbc variable


// Escape user inputs for security
    $url = mysqli_real_escape_string($dbc, $_POST['url']);
    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $name_speaker = mysqli_real_escape_string($dbc, $_POST['name_speaker']);
    $sermon_date = mysqli_real_escape_string($dbc, $_POST['sermon_date']);
    $sermon_time = mysqli_real_escape_string($dbc, $_POST['sermon_time']);
    $tags = mysqli_real_escape_string($dbc, $_POST['tags']);
    $category = mysqli_real_escape_string($dbc, $_POST['category']);

// attempt insert query execution
    $sql = "INSERT INTO player (url, title, name_speaker, sermon_date, sermon_time, tags) VALUES ('$url', '$title', '$name_speaker', '$sermon_date', '$sermon_time', '$tags', '$category')";
    if(mysqli_query($dbc, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
    }

// close connection
    mysqli_close($dbc);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FBC Audio Player Add Record Form</title>
</head>
<body>
<h1>FBC Audio Player Add Record Form</h1>
<form action="playform.php" method="post">
    <p>
        <label for="URL">URL:</label>
        <input type="text" name="url" id="url">
    </p>
    <p>
        <label for="TITLE">TITLE:</label>
        <input type="text" name="title" id="title">
    </p>
    <p>
        <label for="NAME_SPEAKER">NAME SPEAKER:</label>
        <input type="text" name="name_speaker" id="name_speaker">
    </p>
    <p>
        <label for="SERMON_DATE">SERMON DATE:</label>
        <input type="text" name="sermon_date" id="sermon_date">
    </p>
    <p>
        <label for="SERMON_TIME">SERMON TIME:</label>
        <input type="text" name="sermon_time" id="sermon_time">
    </p>
    <p>
        <label for="TAGS">TAGS:</label>
        <input type="text" name="tags" id="tags">
    </p>
    <p>
        <label for="CATEGORY">CATEGORY:</label>
        <input type="text" name="category" id="category">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>