
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZONE</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style_quizzone.css">
</head>
<body>
    <header>
        <div class="container-header">
            <h1>Quizzone</h1>
            <a href="<?php echo URLROOT; ?>/quizzone" class="back-home">Back to Start</a>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>You're Done</h2>
            <p>Congrats <strong><?php echo $_SESSION["name"] ?></strong> you have complete the test</p>
            <p>Final Score: <?php echo $_SESSION['score']; ?> </p>
            <a href="<?php echo URLROOT; ?>/quizzone/add" class="add-question">Add a question..</a>
        </div>
    </main>
    <footer>
        <div class="container-footer">
            Copyright &copy; Quizzone
        </div>
    </footer>
</body>
</html>
