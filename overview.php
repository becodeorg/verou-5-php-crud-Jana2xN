<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Collection</title>
</head>
<body>

<h1>Book Collection</h1>

<ul>
    <?php foreach ($books as $book) : ?>
        <li>
            <strong><?= $book['title'] ?></strong> by <?= $book['author'] ?>,
            <?= $book['publication_year'] ?>, <?= $book['genre'] ?>,
            Condition: <?= $book['condition'] ?>, Price: $<?= $book['price'] ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
