<h1>articles</h1>
<?php foreach ($params['posts'] as $post) : ?>

    <div class="card-body">
        <h2><?= $post->title ?></h2>
        <p><?= $post->content ?></p>
        <small><?= $post->created_at ?></small>
        <a href="/posts/<?= $post->id ?>" class="btn btn-primary">Lire plus</a>
    </div>
<?php endforeach;