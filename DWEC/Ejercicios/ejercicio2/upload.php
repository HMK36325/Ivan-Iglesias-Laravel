<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'my_db';

try {
    if (empty($_FILES['image'])) {
        throw new Exception('Image file is missing');
    }
    $image = $_FILES['image'];
    // check INI error
    if ($image['error'] !== 0) {
        if ($image['error'] === 1) 
            throw new Exception('Max upload size exceeded');
            
        throw new Exception('Image uploading error: INI Error');
    }
    // check if the file exists
    if (!file_exists($image['tmp_name']))
        throw new Exception('Image file is missing in the server');
    $maxFileSize = 2 * 10e6; // in bytes
    if ($image['size'] > $maxFileSize)
        throw new Exception('Max size limit exceeded'); 
    // check if uploaded file is an image
    $imageData = getimagesize($image['tmp_name']);
    if (!$imageData) 
        throw new Exception('Invalid image');
    $mimeType = $imageData['mime'];
    // validate mime type
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedMimeTypes)) 
        throw new Exception('Only JPEG, PNG and GIFs are allowed');
    
    // nice! it's a valid image
    // get file extension (ex: jpg, png) not (.jpg)
    $fileExtention = strtolower(pathinfo($image['name'] ,PATHINFO_EXTENSION));
    // create random name for your image
    $fileName = round(microtime(true)) . mt_rand() . '.' . $fileExtention; // anyfilename.jpg
    // Create the path starting from DOCUMENT ROOT of your website
    $path = '/DWEC/image-upload/'. $fileName;
    // file path in the computer - where to save it 
   $destination = $_SERVER['DOCUMENT_ROOT'] . $path;
  //  $destination= "upload/" . $fileName;
    if (!move_uploaded_file($image['tmp_name'], $destination))
        throw new Exception('Error in moving the uploaded file');

    // create the url
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
    $domain = $protocol . $_SERVER['SERVER_NAME'];
    $url = $domain . $path;
   // $url =  $destination;
   /* 
   $mysqli = new mysqli($host, $user, $password, $database);
   $stmt = $mysqli -> prepare('INSERT INTO image (url) VALUES (?)');
    if (
        $stmt &&
        $stmt -> bind_param('s', $url) &&
        $stmt -> execute()
    ) */
    $conn= mysqli_connect($host, $user, $password, $database);
    if(!$conn){
        die('Could not Connect MySql Server:' .mysql_error());
    }
    $sql="INSERT INTO image(url) VALUES('$url')";
    if (mysqli_query($conn,$sql)){
        exit(
            json_encode(
                array(
                    'status' => true,
                    'url' => $url
                )
            )
        );
    } else 
        throw new Exception('Error in saving into the database');

} catch (Exception $e) {
    exit(json_encode(
        array (
            'status' => false,
            'error' => $e -> getMessage()
        )
    ));
}
?>