<?php

class UnitQuestionView extends View
{
    public stdClass $question;
    public int $q_number;

    public function __construct(int $q_number, stdClass $question)
    {
        $this->question = $question;
        $this->q_number = $q_number;
    }

    public function render(): void
    {

        ?>
        <div class="question">
            <div class="question_content"><?php echo $this->q_number . ". " . $this->question->content; ?></div>
            <div class="all_anwsers">
                <?php
                switch ($this->question->type) {
                    case 0:
                        ?>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-Y" ?>">Yes</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-Y" ?>"
                                   value="<?php echo 1 * $this->question->importance; ?>"/>
                        </div>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-N" ?>">No</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-N" ?>"
                                   value="<?php echo -1 * $this->question->importance; ?>"/>
                        </div>
                        <?php
                        break;

                    case 1:
                        ?>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-SD" ?>">Strongly disagree</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-SD" ?>"
                                   value="<?php echo -1 * $this->question->importance; ?>"/>
                        </div>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-D" ?>">Disagree</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-D" ?>"
                                   value="<?php echo -0.5 * $this->question->importance; ?>"/>
                        </div>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-N" ?>">No opinion</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-N" ?>" value="0"/>
                        </div>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-A" ?>">Agree</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-A" ?>"
                                   value="<?php echo 0.5 * $this->question->importance; ?>"/>
                        </div>
                        <div class="anwser">
                            <label for="<?php echo $this->q_number . "Ans-SA" ?>">Strongly agree</label>
                            <input type="radio" name="<?php echo "Q" . $this->q_number; ?>"
                                   id="<?php echo $this->q_number . "Ans-SA" ?>"
                                   value="<?php echo 1 * $this->question->importance; ?>"/>
                        </div>
                        <?php
                        break;

                    default:
                        throw new Exception("Invalid question type!");
                }
                ?>
            </div>
        </div>

        <?php
    }
}