<?php
class Quiz extends Controller
{
    public function __construct()
    {
        $this->quiz_model = $this->model("Quizes");
        define("EXTREMIST_COEFFICIENT", 1.2);
    }

    public function index()
    {
        $this->browse(null);
    }

    public function browse($category = null)
    {
        echo "browsing quiz category " . $category;
    }

    public function show($identifier)
    {
        $quiz_id = $this->quiz_model->getQuizIDbyIdentifier($identifier);
        $quiz_summary = $this->quiz_model->getQuizSummary($identifier);
        $questions = $this->quiz_model->getQuizQuestions($quiz_id);

        $importance_sum = 0;
        foreach ($questions as $question) {
            $importance_sum += abs(floatval($question->importance));
        }

        $data = [
            "ogp_data" => new OGPdata($quiz_summary->title, $quiz_summary->description, $quiz_summary->image),
            "quiz_summary" => $quiz_summary,
            "quiz_questions" => $questions,
            "importance_sum" => $importance_sum
        ];

        $this->view("quiz/show", $data);
    }

    public function results()
    {
        $identifier = $_POST["identifier"];
        $importance_sum = $_POST["importance_sum"];

        $quiz_summary = $this->quiz_model->getQuizSummary($identifier);

        $anwsers_sum = 0;
        for ($i = 1; $i <= $quiz_summary->question_count; $i++) {
            if(isset($_POST["Q" . $i])) $anwsers_sum += $_POST["Q" . $i];
        }

        $percentage = round(min(100, max(0, ($anwsers_sum * EXTREMIST_COEFFICIENT + $importance_sum) / ($importance_sum * 2) * 100)), 1);

        $data = [
            "page_title" => "The results are in!",
            "quiz_summary" => $quiz_summary,
            "result" => $percentage
        ];

        $this->view("quiz/results", $data);
    }
}
