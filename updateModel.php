<html>
    <head>
        <meta charset="UTF-8">
        <title>Used by along with tf.save to upload the model file onto the server</title>
    </head>
    <body>
        <?php
        print_r($_FILES);

        $targetdir = __DIR__.'/model/';
        foreach ($_FILES as $file) {
            print_r($file);
            $destination = $targetdir . $file['name'];
            //delete file at location
            unlink($destination);
            //upload file to location
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo 'upload success!';
            } else {
                echo 'upload failed!';
            }
        }
        ?>
    </body>
</html>
