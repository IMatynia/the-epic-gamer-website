<?php
class Quizes
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllQuizes()
    {
        $this->db->query("SELECT identifier, title, description, image, category FROM quizes");
        $quizes = $this->db->resultSet();

        foreach ($quizes as $quiz) {
            $quiz->question_count = $this->getQuizQuestionCount($quiz->id);
        }
        return $quizes;
    }

    public function getQuizSummary($identifier)
    {
        $this->db->query("SELECT id, identifier, title, description, image, category FROM quizes WHERE identifier=:identifier");
        $this->db->bind(":identifier", $identifier);
        $quiz_data = $this->db->single();
        if ($quiz_data === false) {
            throw new Exception("Quiz not found");
        }

        $question_count = $this->getQuizQuestionCount($quiz_data->id);

        $quiz_data->question_count = $question_count;
        return $quiz_data;
    }

    public function getQuizQuestionCount($id)
    {
        $this->db->query("SELECT count(*) as count FROM questions WHERE quiz_id = :quiz_id");
        $this->db->bind(":quiz_id", $id);
        return $this->db->single()->count;
    }

    public function getQuizIDbyIdentifier($identifier)
    {
        $this->db->query("SELECT id FROM quizes WHERE identifier = :identifier");
        $this->db->bind(":identifier", $identifier);
        $thing = $this->db->single();
        if ($thing === false) {
            throw new Exception("No quiz with this identifier is present!");
        } else {
            return $thing->id;
        }
    }

    public function getQuizQuestions($quiz_id)
    {
        $this->db->query("SELECT id, content, type, importance FROM questions WHERE quiz_id = :quiz_id ORDER BY id");
        $this->db->bind(":quiz_id", $quiz_id);
        return $this->db->resultSet();
    }
}
