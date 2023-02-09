<?php

class Quizes extends DBModel
{
    public function getAllQuizes()
    {
        $this->db->query("SELECT * FROM quizes_w_authors;");
        $quizes = $this->db->resultSet();

        foreach ($quizes as $quiz) {
            $quiz->question_count = $this->getQuizQuestionCount($quiz->sname);
            $quiz->tags = $this->getQuizTags($quiz->sname);
        }
        return $quizes;
    }

    public function getQuizesByCategory($category)
    {
        $this->db->query("
            select * from quizes_w_authors
            inner join (
                select quiz_id from quiz_tags 
                where tag_id = (select tag_id from tags where name = :category)
            ) sub on sub.quiz_id = quizes_w_authors.quiz_id;
        ");
        $this->db->bind(":category", $category);
        $quizes = $this->db->resultSet();

        foreach ($quizes as $quiz) {
            $quiz->question_count = $this->getQuizQuestionCount($quiz->sname);
            $quiz->tags = $this->getQuizTags($quiz->sname);
        }
        return $quizes;
    }

    public function getQuizSummary($sname)
    {
        $this->db->query("select * from quizes_w_authors where sname = :sname");
        $this->db->bind(":sname", $sname);
        $quiz_data = $this->db->single();

        $quiz_data->question_count = $this->getQuizQuestionCount($quiz_data->sname);
        $quiz_data->tags = $this->getQuizTags($quiz_data->sname);
        return $quiz_data;
    }

    public function getQuizQuestionCount($sname)
    {
        $this->db->query("SELECT count(*) as count FROM quiz_questions WHERE quiz_id = (select quiz_id from quizes where sname = :sname)");
        $this->db->bind(":sname", $sname);
        return $this->db->single()->count;
    }

    public function getQuizQuestions($sname)
    {
        $this->db->query("SELECT * FROM quiz_questions WHERE quiz_id = (select quiz_id from quizes where sname = :sname) ORDER BY pos");
        $this->db->bind(":sname", $sname);
        return $this->db->resultSet();
    }

    public function addQuiz(string $sname, string $author_name, string $title, string $description, string $thumbnail = null)
    {
        # Add quiz description to quizes table
        $this->db->query("call add_quiz(:sname, :author_name, :title, :thumbnail, :description)");
        $this->db->bind(":sname", $sname);
        $this->db->bind(":author_name", $author_name);
        $this->db->bind(":title", $title);
        $this->db->bind(":thumbnail", $thumbnail);
        $this->db->bind(":description", $description);
        return $this->db->execute();
    }

    public function addQuestion(string $sname, int $pos, int $type, float $ans_value = 1.0, string $question, ?string $image)
    {
        # Add quiz description to quizes table
        $this->db->query("call add_question(:sname, :pos, :type, :ans_value, :question, :image)");
        $this->db->bind(":sname", $sname);
        $this->db->bind(":pos", $pos);
        $this->db->bind(":type", $type);
        $this->db->bind(":ans_value", $ans_value);
        $this->db->bind(":question", $question);
        $this->db->bind(":image", $image);
        return $this->db->execute();
    }

    public function addQuizTag(string $quiz_sname, string $tag_name)
    {
        $this->db->query("call add_quiz_tag(:sname, :tag_name)");
        $this->db->bind(":sname", $quiz_sname);
        $this->db->bind(":tag_name", $tag_name);
        return $this->db->execute();
    }

    public function purgeQuizes()
    {
        $this->db->query("delete from quizes");
        $this->db->execute();
    }

    public function purgeQuestions()
    {
        $this->db->query("delete from quiz_questions");
        $this->db->execute();
    }

    public function purgeQuizTags()
    {
        $this->db->query("delete from quiz_tags");
        $this->db->execute();
    }

    private function getQuizTags($sname): array
    {
        $this->db->query("
        select tags.name from tags
        inner join quiz_tags on tags.tag_id = quiz_tags.tag_id
        inner join quizes on quiz_tags.quiz_id = quizes.quiz_id
        where quizes.sname = :sname;
        ");
        $this->db->bind(":sname", $sname);
        $result_tags = $this->db->resultSet();
        $out = [];
        foreach ($result_tags as $lp => $tag) {
            array_push($out, $tag->name);
        }
        return $out;
    }
}
