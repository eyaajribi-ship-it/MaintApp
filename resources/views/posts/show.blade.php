<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url('/') }}" class="btn btn-secondary mb-3">← Retour à la liste</a>
            
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <p class="text-muted">
                        Par <strong>{{ $post->author?->firstName }} {{ $post->author?->lastName }}</strong> 
                        le {{ $post->publishedAt }}
                    </p>
                    <hr>
                    <div class="card-text" style="line-height: 1.6;">
                        {{ $post->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>