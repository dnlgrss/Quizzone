
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
            <h1>Add A Question</h1>
            <p>
            <?php if(isset($msg)){
                echo $msg;
            } ?>
            </p>
            <form action="<?php echo URLROOT; ?>/quizzone/add" method="POST">
                <p>
                    <label for="question-number">Question Number: </label>
                    <input type="number" name="question-number" value="<?php echo $data['num']; ?>">
                </p>
                <p>
                    <label for="question-text">Question Text: </label>
                    <input type="text" name="question-text">
                </p>
                <p>
                    <label for="choice1">Choice #1: </label>
                    <input type="text" name="choice1">
                </p>
                <p>
                    <label for="choice2">Choice #2: </label>
                    <input type="text" name="choice2">
                </p>
                <p>
                    <label for="choice3">Choice #3: </label>
                    <input type="text" name="choice3">
                </p>
                <p>
                    <label for="choice4">Choice #4: </label>
                    <input type="text" name="choice4">
                </p>
                <p>
                    <label for="choice5">Choice #5: </label>
                    <input type="text" name="choice5">
                </p>
                <p>
                    <label for="correct-choice">Correct Choice Number: </label>
                    <input type="number" name="correct-choice">
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="Submit">
                </p>
            </form>
        </div>
    </main>
    <footer>
        <div class="container-footer">
            Copyright &copy; PHP Quizzer
        </div>
    </footer>
</body>
</html>
