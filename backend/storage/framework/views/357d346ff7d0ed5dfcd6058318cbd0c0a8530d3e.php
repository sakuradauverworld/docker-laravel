<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">パスワード再発行</div>
          <div class="panel-body">
            <?php if(session('status')): ?>
              <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

              </div>
            <?php endif; ?>
            <form action="<?php echo e(route('password.email')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">再発行リンクを送る</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sakuradadaisuke/samplePJ/TEST1/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>