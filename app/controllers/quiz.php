<?php
require_once MODEL . "quizes.php";
require_once MODEL . "tags.php";

require_once VIEW . "quiz/browse.php";
require_once VIEW . "quiz/results.php";
require_once VIEW . "quiz/show.php";

class Quiz extends Controller
{
    public Quizes $quiz_model;
    public Tags $tag_model;
    public string $url_destination;

    public function __construct()
    {
        $this->quiz_model = new Quizes();
        $this->tag_model = new Tags();
        $this->url_destination = "quiz/browse/";
    }

    public function index()
    {
        $this->browse(null);
    }

    public function browse($category = null)
    {
        if ($category == null) {
            $page_title = "Embark on a journey of self discovery with our quizes";
            $quizes = $this->quiz_model->getAllQuizes();
        } else {
            $page_title = "Discover yourself in " . $category . " quizes";
            $quizes = $this->quiz_model->getQuizesByCategory($category);
        }

        $view = new QuizBrowseView(
            $category,
            $quizes,
            new OGPdata(
                $page_title,
                "Embark on a journey of self discovery with our quizes! We offer a wide selection of categories to choose from! Just give us a try!"
            ),
            $this->tag_model->getAllQuizTags(),
            $this->url_destination
        );
        $view->render();
    }

    public function show($sname)
    {
        $quiz_summary = $this->quiz_model->getQuizSummary($sname);
        $questions = $this->quiz_model->getQuizQuestions($sname);

        $importance_sum = 0;
        foreach ($questions as $question) {
            $importance_sum += abs(floatval($question->importance));
        }

        $view = new QuizShowView(
            $quiz_summary,
            $questions,
            $importance_sum,
            new OGPdata($quiz_summary->title, $quiz_summary->description, $quiz_summary->thumbnail),
            $this->tag_model->getAllQuizTags(),
            $this->url_destination
        );
        $view->render();
    }

    public function results()
    {
        if (!(isset($_POST["identifier"]) && isset($_POST["importance_sum"]))) {
            die("This site can only be accessed after finishing a quiz!");
        }

        $identifier = $_POST["identifier"];
        $importance_sum = $_POST["importance_sum"];

        $quiz_summary = $this->quiz_model->getQuizSummary($identifier);

        $anwsers_sum = 0;
        for ($i = 1; $i <= $quiz_summary->question_count; $i++) {
            if (isset($_POST["Q" . $i])) $anwsers_sum += $_POST["Q" . $i];
        }

        $percentage = round(min(100, max(0, ($anwsers_sum * EXTREMIST_COEFFICIENT + $importance_sum) / ($importance_sum * 2) * 100)), 1);

        $view = new QuizResultsView(
            $quiz_summary,
            $percentage,
            new OGPdata(
                "Your results in " . $quiz_summary->title . " are in!",
                "Congratulations! You got " . $percentage . "%!",
                $quiz_summary->image
            ),
            $this->tag_model->getAllQuizTags(),
            $this->url_destination
        );
        $view->render();
    }
}
