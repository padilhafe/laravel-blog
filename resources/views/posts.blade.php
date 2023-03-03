<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>My Blog</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
                <a href="/posts/<?= $post->slug ?>">
                    {{ $post->title }}
                </a>
                
            </h1>

            <div>
                <p><?= $post->excerpt; ?></p>
            </div>

        </article>
    <?php endforeach; ?>
</body>

</html>
