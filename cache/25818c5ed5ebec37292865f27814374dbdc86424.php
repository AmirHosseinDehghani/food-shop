<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uploader</title>
</head>
<body>
<form method="post" action="<?php echo e('/upload'); ?>" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="upload">
</form>

</body>
</html><?php /**PATH D:\food-shop\views/panel/upload-form.blade.php ENDPATH**/ ?>