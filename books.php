<?php
//Ideally this function suppose to fetch data from database
//But for simplicity, we are going to use a simple json file
function getBooksData() {
    $json = file_get_contents('data.json');
    return json_decode($json);
}

$books = getBooksData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>List of Books</title>
</head>
<body class="container" style="background: lightskyblue">
<div class="header mt-5 mb-5">
    <h1 class="h1">100 Books of All Time</h1>
    <p>
        This page to see the 100 best classical books of all time.
    </p>
</div>

<div class="content">
    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card">
                    <img class="card-img-top" height="160px" style="object-fit: cover; object-position: center"
                         src="https://raw.githubusercontent.com/benoitvallon/100-best-books/master/static/<?php echo $book->imageLink ?>"
                         alt="<?php echo $book->title ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book->title ?></h5>
                        <p class="card-text">
                            By <?php echo $book->author ?>
                            from <?php echo $book->country ?>,
                            written in <?php echo $book->language ?> language
                            with <?php echo $book->pages ?> number of pages.<br/>
                            Published on <?php echo $book->year ?>
                        </p>
                        <a target="_blank" href="<?php echo $book->link ?>" class="btn btn-primary">Open</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

</body>
</html>