<div class="question">
    <div class="question_content"><?php echo $it . ". " . $question->content; ?></div>
    <div class="all_anwsers">
        <?php
        switch ($question->type) {
            case 0:
        ?>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-Y" ?>">Yes</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-Y" ?>" value="<?php echo 1 * $question->importance; ?>" />
                </div>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-N" ?>">No</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-N" ?>" value="<?php echo -1 * $question->importance; ?>" />
                </div>
            <?php
                break;

            case 1:
            ?>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-SD" ?>">Strongly disagree</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-SD" ?>" value="<?php echo -1 * $question->importance; ?>" />
                </div>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-D" ?>">Disagree</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-D" ?>" value="<?php echo -0.5 * $question->importance; ?>" />
                </div>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-N" ?>">No opinion</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-N" ?>" value="0" />
                </div>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-A" ?>">Agree</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-A" ?>" value="<?php echo 0.5 * $question->importance; ?>" />
                </div>
                <div class="anwser">
                    <label for="<?php echo $it . "Ans-SA" ?>">Strongly agree</label>
                    <input type="radio" name="<?php echo "Q" . $it; ?>" id="<?php echo $it . "Ans-SA" ?>" value="<?php echo 1 * $question->importance; ?>" />
                </div>
        <?php
                break;

            default:
                throw new Exception("Invalid question type!");
        }
        ?>
    </div>
</div>