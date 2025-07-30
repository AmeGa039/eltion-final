

<link rel="stylesheet" href="<?php echo e(asset('css/event-list.css')); ?>">

<?php $__env->startSection('content'); ?>
<h1>All Events</h1>

<a href="<?php echo e(route('events.create')); ?>">Create New Event</a>

<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div style="margin-bottom: 1.5rem;">
        <h2><a href="<?php echo e(route('events.show', $event)); ?>"><?php echo e($event->title); ?></a></h2>
        <p><strong>Location:</strong> <?php echo e($event->location); ?></p>
        <p><strong>Time:</strong> <?php echo e($event->start_time); ?> to <?php echo e($event->end_time); ?></p>
        <p><?php echo e(Str::limit($event->description, 100)); ?></p>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eltion_laravel\eltion-final\resources\views/events/index.blade.php ENDPATH**/ ?>