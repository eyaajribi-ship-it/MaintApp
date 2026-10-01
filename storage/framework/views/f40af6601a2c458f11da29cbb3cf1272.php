<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="/">MaintApp </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAdmin">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('posts*') ? 'active' : ''); ?>" href="<?php echo e(route('posts.index')); ?>">Interventions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('categories*') ? 'active' : ''); ?>" href="<?php echo e(route('categories.index')); ?>">Catégories</a>
                </li>
                </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link nav-link" style="text-decoration: none;">
                            Déconnexion (<?php echo e(Auth::user()->firstName); ?>)
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\laravelapp\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>