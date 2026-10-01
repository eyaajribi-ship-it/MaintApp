

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Catégories</h1>
    <a href="#" class="btn btn-success">Nouvelle Catégorie</a>
</div>

<table class="table table-hover">
    <thead class="table-light">
        <tr>
            <th>Titre</th>
            <th>Slug</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($category->title); ?></td>
            <td><code><?php echo e($category->slug); ?></code></td>
            <td><?php echo e(Str::limit($category->content, 50)); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="3" class="text-center">Aucune catégorie trouvée.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.application', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelapp\resources\views/categories/index.blade.php ENDPATH**/ ?>