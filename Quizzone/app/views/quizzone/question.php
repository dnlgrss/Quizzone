
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
        </div>
    </header>
    <main>
        <div class="container">
            <div class="current">
                Question <?php echo $data['question']->questionNumber; ?> of <?php echo $data['questionsNum']; ?>
            </div>
            <p class="question"><?php ini_set('display_errors', 1);  echo $data['question']->text; ?></p>
            <form action="<?php echo URLROOT; ?>/quizzone/process/<?php echo $data['question']->questionNumber; ?>" method="POST">
                <ul class="choices">
                    <?php foreach($data['choices'] as $choice): ?>
                    <li><input type="radio" name="choice" id="choice" value="<?php echo $choice->id; ?>"><?php echo $choice->text; ?></li>
                    <?php endforeach; ?>
                </ul>
                <input type="submit" value="Next" id="submit">
                <input type="hidden" value="<?php echo $data['question']->questionNumber; ?>" name="number">
            </form>
        </div>
    </main>
    <footer>
        <div class="container-footer">
            Copyright &copy; Quizzone
        </div>
    </footer>
</body>
</html>
