<!DOCTYPE html>
<html>
<head>
    <title>Event App</title>
</head>
<body>
    <?php if(session('success')): ?>
        <div style="color: green;"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(auth()->guard()->check()): ?>
        <p>Logged in as <?php echo e(auth()->user()->name); ?> | <a href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none;">
            <?php echo csrf_field(); ?>
        </form>
    <?php endif; ?>

    <hr>

    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\eltion_laravel\eltion-final\resources\views/layouts/app.blade.php ENDPATH**/ ?>