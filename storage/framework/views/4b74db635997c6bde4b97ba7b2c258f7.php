<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Ajouter un nouvel article</h2>

    <form action="<?php echo e(route('posts.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Résumé</label>
            <textarea name="summary" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenu</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <select name="categories[]" class="form-select" multiple>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <small class="text-muted">Maintenez Ctrl pour choisir plusieurs catégories</small>
        </div>

        <input type="hidden" name="authorId" value="1">
        <input type="hidden" name="published" value="1">
        <input type="hidden" name="slug" value="test-article">

        <button type="submit" class="btn btn-primary">Créer l'article</button>
        <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelapp\resources\views/posts/create.blade.php ENDPATH**/ ?>