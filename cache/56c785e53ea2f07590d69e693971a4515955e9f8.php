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

<table border="1">
    <tr>
        <td>real name</td>
        <td>name</td>
        <td>path</td>
        <td>mime type</td>
        <td>user</td>
        <td>actions</td>
    </tr>
    <?php $__currentLoopData = $userFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($userFile->real_name); ?></td>
            <td><a target="_blank" href="/<?php echo e($userFile->path); ?>">
                    <?php echo e($userFile->name); ?>

                </a>
            </td>
            <td>
                <?php if($userFile->mime_type == 'png' || $userFile->mime_type == 'jpg'): ?>
                    <a target="_blank" href="/<?php echo e($userFile->path); ?>">
                        <img src="<?php echo e($userFile->path); ?>" width="50" height="50" title="<?php echo e($userFile->real_name); ?>">
                    </a>
                <?php endif; ?>

            </td>
            <td><?php echo e($userFile->mime_type); ?></td>
            <td><?php echo e($userFile->user_id); ?></td>
            <td>
                <a href="<?php echo e('/delete-file/'.$userFile->id); ?>"> delete </a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</body>
</html><?php /**PATH D:\food-shop\views/panel/user-files.blade.php ENDPATH**/ ?>