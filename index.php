<?php require('calculate.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Scrabble Word Score Calculator</title>
        <link rel="stylesheet" href="css/scrabble.css" type="text/css">
    </head>
    <body>
        <div id="container">
            <h1>Scrabble Word Score Calculator</h1>
            <img src="scrabble.jpg" width="250" height="250" alt="scrabble scorecard">
            <form method="get" action="">

                <div class="inputBlock">
                <div class="col1">
                    <p>Your word<p>
                    <p class="required">&#42;Required</p>
                </div>
                <div class="col2">
                    <label for="word"></label>
                    <input type="text" name="word" id="word" value="<?=$form->prefill('word'); ?>" autofocus="autofocus" maxlength="20">
                </div>
                </div>

                <div class="inputBlock">
                <div class="col1">
                    <p>Bonus points<p>
                </div>
                <div class="col2">
                    <input type="radio" name="bonusPoints" id="bonusPointsNone" value="none" <?php if($bonus == '' || $bonus == 'none') echo 'checked'; ?>><label for="bonusPointsNone">None</label><br>
                    <input type="radio" name="bonusPoints" id="bonusPointsDouble" value="double" <?php if($bonus == 'double') echo 'checked'; ?>><label for="bonusPointsDouble">Double word score</label><br>
                    <input type="radio" name="bonusPoints" id="bonusPointsTriple" value="triple" <?php if($bonus == 'triple') echo 'checked'; ?>><label for="bonusPointsTriple">Triple word score</label>
                </div>
                </div>

                <div class="inputBlock">
                <div class="col1">
                    <p>Include 50 point "bingo"?<p>
                    <p class="comment">(word that uses all 7 tiles)</p>
                </div>
                <div class="col2">
                <input type="checkbox" name="bingo" id="bingo" <?php if($form->isChosen('bingo')) echo 'CHECKED' ?>>
                <label for="bingo">Yes</label>
                </div>
                </div>

                <input type="submit" value="Calculate">

                <?php if($errors): ?>
                    <div class="result error">
                        <?php echo str_replace('word', '"Your word"', $errors[0]); ?>
                    </div>
                <?php elseif($score): ?>
                    <div class="result ok">
                        <?php echo "Your word is worth ".$score." points"; ?>
                    </div>
                <?php endif; ?>


            </form>
        </div>
    </body>
</html>
