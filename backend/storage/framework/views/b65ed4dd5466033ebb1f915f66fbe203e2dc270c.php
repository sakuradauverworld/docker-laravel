<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <?php echo $__env->yieldContent('styles'); ?>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
    <div class="my-navbar-control">
      <?php if(Auth::check()): ?>
        <span class="my-navbar-item">ようこそ, <?php echo e(Auth::user()->name); ?>さん</span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
          <?php echo csrf_field(); ?>
        </form>
      <?php else: ?>
        <a class="my-navbar-item" href="<?php echo e(route('login')); ?>">ログイン</a>
        ｜
        <a class="my-navbar-item" href="<?php echo e(route('register')); ?>">会員登録</a>
      <?php endif; ?>
    </div>
  </nav>
</header>
<main>
  <?php echo $__env->yieldContent('content'); ?>
</main>
<?php if(Auth::check()): ?>
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
<?php endif; ?>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /work/backend/resources/views/layout.blade.php ENDPATH**/ ?>