

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des interventions</h2>
        <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-success">+ Ajouter une intervention</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Sujet/equipement</th>
                <th>Description</th>
              
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($post->id); ?></td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->summary); ?></td>
                <td><?php echo e($post->author->firstName ?? 'Auteur'); ?> <?php echo e($post->author->lastName ?? 'Inconnu'); ?></td>                <td>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.application', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelapp\resources\views/posts/index.blade.php ENDPATH**/ ?>