

<link rel="stylesheet" href="<?php echo e(asset('css/event-form.css')); ?>">

<?php $__env->startSection('content'); ?>
<h1>Create Event</h1>

<form method="POST" action="<?php echo e(route('events.store')); ?>">
    <?php echo csrf_field(); ?>

    <label>Title:</label><br>
    <input type="text" name="title" required><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br>

    <label>Location:</label><br>
    <input type="text" name="location" required><br>

    <label>Start Time:</label><br>
    <input type="datetime-local" name="start_time" required><br>

    <label>End Time:</label><br>
    <input type="datetime-local" name="end_time" required><br>

    <label>
        <input type="checkbox" name="is_public" checked> Public Event
    </label><br><br>

    <button type="submit">Create</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eltion_laravel\eltion-final\resources\views/events/create.blade.php ENDPATH**/ ?>