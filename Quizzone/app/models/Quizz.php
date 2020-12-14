<?php

class Quizz{
    private $db;

    public function __construct(){
        $this->db = new Database;

    }

    public function getQuestionsNum(){
        $this->db->query("SELECT COUNT(*) AS totalNum FROM questions_quizzone");

        $number = $this->db->single();

        $num = $number->totalNum;

        return $num;
    }

    public function getScorers(){
        $this->db->query('SELECT * FROM scorers_quizzone
                            ORDER BY score DESC
                            limit 5');

        $result = $this->db->resultSet();

        return $result;
    }

    public function getQuestion($id){
        $this->db->query('SELECT * FROM questions_quizzone
                            WHERE questionNumber = :questionNumber');

        $this->db->bind(':questionNumber', $id);

        $question = $this->db->single();

        return $question;
    }

    public function getChoices($id){
        $this->db->query('SELECT * FROM choices_quizzone
                            WHERE questionNumber = :questionNumber');

        $this->db->bind(':questionNumber', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCorrectChoice($id){
        $this->db->query('SELECT * FROM choices_quizzone
                            WHERE questionNumber = :questionNumber AND isCorrect = 1');

        $this->db->bind(':questionNumber', $id);

        $correct = $this->db->single();

        return $correct;
    }

    public function addQuestion($questionNum, $questionText){
        $this->db->query('INSERT INTO questions_quizzone(questionNumber, text)
                            VALUES (:questionNum, :questionText)');

        $this->db->bind(':questionNum', $questionNum);
        $this->db->bind(':questionText', $questionText);

        $this->db->execute();

        return true;
    }

    public function addChoices($questionNum, $isCorrect, $choiceText){
        $this->db->query('INSERT INTO choices_quizzone(questionNumber, isCorrect, text)
                            VALUES (:questionNum, :isCorrect, :text)');

        $this->db->bind(':questionNum', $questionNum);
        $this->db->bind(':isCorrect', $isCorrect);
        $this->db->bind(':text', $choiceText);

        $this->db->execute();

        return true;
    }

    public function addScorer(){
        $this->db->query('INSERT INTO scorers_quizzone(name, score)
                            VALUES (:name, :score)');

        $this->db->bind(':name', $_SESSION["name"]);
        $this->db->bind(':score', $_SESSION["score"]);

        $this->db->execute();

        return true;
    }
}

?>
