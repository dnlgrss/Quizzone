
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZER</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style_quizzone.css">
</head>
<body>
    <header>
        <div class="container-header">
            <h1>Quizzone</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Test Your Knowledge</h2>
            <p>This is a multiple choice quiz to test your overall knowledge</p>
            <div class="qst-details">
                <ul>
                    <li><strong>Number of Question: </strong><?php echo $data['questionsNum']; ?></li>
                    <li><strong>Type: </strong>Multiple choice</li>
                    <li><strong>Estimated Time: </strong><?php echo $data['questionsNum'] * 0.5; ?> Minutes</li>
                </ul>
                <form action="<?php echo URLROOT; ?>/quizzone/question/1" method="POST">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name">
                    <span class="error-name"><?php echo $data['err_name']; ?></span>
                    <input type="submit" name="submit" value="Start" class="start-btn"></input>
                </form>
            </div>
            <div class="container-ranking">
                <h2>Top 5 scorer:</h2>
                <ol>
                    <?php foreach($data['scorers'] as $scorer): ?>
                        <li><?php echo $scorer->name; ?><strong>Score &rArr; <?php echo $scorer->score; ?></strong></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </main>
    <footer>
        <div class="container-footer">
            Copyright &copy; Quizzone
        </div>
    </footer>
</body>
</html>
