 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('tasks.create')); ?>"> Create New task</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($task->name); ?></td>
            <td><?php echo e($task->detail); ?></td>
            <td>
                <form action="<?php echo e(route('tasks.destroy',$task->id)); ?>" method="POST">
   
                    <a class="btn btn-info" href="<?php echo e(route('tasks.show',$task->id)); ?>">Show</a>
    
                    <a class="btn btn-primary" href="<?php echo e(route('tasks.edit',$task->id)); ?>">Edit</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo $tasks->links(); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tasks.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/artem/backup/blog/resources/views/tasks/index.blade.php ENDPATH**/ ?>