<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col col-md-4">
      <nav class="panel panel-default">
        <div class="panel-heading">フォルダ</div>
        <div class="panel-body">
          <a href="<?php echo e(route('folders.create')); ?>" class="btn btn-default btn-block">
            フォルダを追加する
          </a>
        </div>
        <div class="list-group">
          <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('tasks.index', ['id' => $folder->id])); ?>" class="list-group-item <?php echo e($current_folder_id === $folder->id ? 'active' : ''); ?>">
            <?php echo e($folder->title); ?>

          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </nav>
    </div>
    <div class="column col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">タスク</div>
        <div class="panel-body">
          <div class="text-right">
            <a href="<?php echo e(route('tasks.create', ['id' => $current_folder_id])); ?>" class="btn btn-default btn-block">
              タスクを追加する
            </a>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>タイトル</th>
              <th>状態</th>
              <th>期限</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($task->title); ?></td>
              <td>
                <span class="label <?php echo e($task->status_class); ?>"><?php echo e($task->status_label); ?></span>
              </td>
              <td><?php echo e($task->formatted_due_date); ?></td>
              <td><a href="<?php echo e(route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id])); ?>">
                  編集
                </a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sakuradadaisuke/samplePJ/TEST1/resources/views/tasks/index.blade.php ENDPATH**/ ?>