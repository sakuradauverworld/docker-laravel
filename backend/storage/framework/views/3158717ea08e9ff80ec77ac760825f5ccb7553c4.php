<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <div class="text-center">
          <p>お探しのページにアクセスする権限がありません。</p>
          <a href="<?php echo e(route('home')); ?>" class="btn">
            ホームへ戻る
          </a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/backend/resources/views/errors/403.blade.php ENDPATH**/ ?>