<?php
class Quizes
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllQuizes()
    {
        $this->db->query("SELECT id, identifier, title, description, image, category FROM quizes");
        $quizes = $this->db->resultSet();

        foreach ($quizes as $quiz) {
            $quiz->question_count = $this->getQuizQuestionCount($quiz->id);
        }
        return $quizes;
    }

    public function getQuizesByCategory($category)
    {
        $this->db->query("SELECT id, identifier, title, description, image, category FROM quizes WHERE category=:category");
        $this->db->bind(":category", $category);
        $quizes = $this->db->resultSet();

        foreach ($quizes as $quiz) {
            $quiz->question_count = $this->getQuizQuestionCount($quiz->id);
        }
        return $quizes;
    }

    public function getAllCategories()
    {
        $this->db->query("SELECT category, count(*) as quiz_number FROM quizes GROUP BY category ORDER BY category");
        $result = $this->db->resultSet();
        $out = [];
        foreach ($result as $category) {
            $out[$category->category] = $category->quiz_number;
        }
        return $out;
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

    public function addQuiz($identifier, $title, $image, $description, $category)
    {
        # Add quiz description to quizes table
        $this->db->query("INSERT INTO quizes (`identifier`, `title`, `image`, `description`, `category`) VALUES (:identifier, :title, :image, :description, :category)");
        $this->db->bind(":identifier", $identifier);
        $this->db->bind(":title", $title);
        $this->db->bind(":image", $image);
        $this->db->bind(":description", $description);
        $this->db->bind(":category", $category);
        $ret = $this->db->execute();
        if ($ret === false) throw new Exception("Failed to add quiz");
    }

    public function removeQuizByIdentifier($identifier)
    {
        $quiz_id = $this->getQuizIDbyIdentifier($identifier);
        $this->db->query("DELETE FROM quizes WHERE identifier=:identifier");
        $this->db->bind(":identifier", $identifier);
        $this->db->execute();

        $this->db->query("DELETE FROM questions WHERE quiz_id=:id");
        $this->db->bind(":id", $quiz_id);
        $this->db->execute();
    }

    public function addQuestion($quiz_id, $content, $type, $importance)
    {
        # Add quiz description to quizes table
        $this->db->query("INSERT INTO questions (`quiz_id`, `content`, `type`, `importance`) VALUES (:quiz_id, :content, :type, :importance)");
        $this->db->bind(":quiz_id", $quiz_id);
        $this->db->bind(":content", $content);
        $this->db->bind(":type", $type);
        $this->db->bind(":importance", $importance);
        $ret = $this->db->execute();
        if ($ret === false) throw new Exception("Failed to add question");
    }
}
