<html>
    <head>
        <title>Upload Image</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>
    <body>
        <div id="page">
            <div id="header">
                <h1>Upload Image</h1>
            </div>
            <div id="main">
                <h2>Image to be uploaded</h2>
                <h3> .png File Only</h3>
                <p>Please Keep your image name and book code the same.</p>
                
                <form id="upload_form"
                      action="." method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload"/>
                    <input type="file" name="file1"/><br />
                    <input id="upload_button" type="submit" value="Upload"/>
                </form>
                <h2>Images in the directory</h2>
                <?php if (count($files) == 0) : ?>
                    <p>No images uploaded.</p>
                <?php else: ?>
                    <ul>
                    <?php foreach($files as $filename) :
                        $file_url = $image_dir . '/' .
                                    $filename;
                        $delete_url = '.?action=delete&filename=' .
                                      urlencode($filename);
                    ?>
                        <li>
                            <a href="<?php echo $delete_url;?>">
                                <img src="delete.png" alt="Delete"/></a>
                            <a href="<?php echo $file_url; ?>">
                                <?php echo $filename; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>
