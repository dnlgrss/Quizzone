<?php


class Quizzone extends Controller{
    public function __construct(){
        // Load model Post.php in models and put it into a property(variables in object)/handler 'postModel'
        $this->quizzoneModel = $this->model('Quizz');
    }

    public function index(){
        $questionsNum = $this->quizzoneModel->getQuestionsNum();
        $scorers = $this->quizzoneModel->getScorers();

        $data = [
            'questionsNum' => (int) $questionsNum,
            'scorers' => $scorers,
            'err_name' => ''
        ];

        $this->view('quizzone/index', $data);
    }

    public function question($id){
        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitaze POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if name has been inserted
            if(!empty($_POST["name"])){
                $_SESSION["name"] = $_POST["name"];
                $questionsNum = $this->quizzoneModel->getQuestionsNum();
                $choices = $this->quizzoneModel->getChoices($id);
                $question = $this->quizzoneModel->getQuestion($id);

                $data = [
                    'question' => $question,
                    'questionsNum' => $questionsNum,
                    'choices' => $choices
                ];

                $this->view('quizzone/question', $data);


            }else{

                if(isset($_SESSION["score"])){
                    $questionsNum = $this->quizzoneModel->getQuestionsNum();
                    $scorers = $this->quizzoneModel->getScorers();

                    $data = [
                        'questionsNum' => $questionsNum,
                        'scorers' => $scorers,
                        'err_name' => 'Name is required'
                    ];

                    $this->view('quizzone/index', $data);
                }else{

                    redirect('quizzone/index');
                }
            }
        }else{

            $questionsNum = $this->quizzoneModel->getQuestionsNum();
            $choices = $this->quizzoneModel->getChoices($id);
            $question = $this->quizzoneModel->getQuestion($id);

            $data = [
                'question' => $question,
                'questionsNum' => $questionsNum,
                'choices' => $choices
            ];

            $this->view('quizzone/question', $data);

        }
    }

    public function process($id){

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Check to see if score is set
            if(!isset($_SESSION['score'])){
                $_SESSION['score']= 0;
            }

            $questionNum = $_POST['number'];
            $selectedChoice = $_POST['choice'];
            $next = $questionNum + 1;

            $questionsNum = $this->quizzoneModel->getQuestionsNum();
            $result = $this->quizzoneModel->getCorrectChoice($id);
            $correctChoiceID = $result->id;

            // Compare
            if($correctChoiceID == $selectedChoice){
                // Answer is correct
                $_SESSION['score']++;
            }


            // Check if last queston or next one
            if($questionNum == $questionsNum){
                redirect('quizzone/final');
            }else{
                redirect('quizzone/question/'.$next.'');
            }

        }
    }

    public function final(){

        $this->quizzoneModel->addScorer();

        $this->view('quizzone/final');

        unset($_SESSION["name"]);
        unset($_SESSION["score"]);
        session_destroy();

    }

    public function add(){

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST['submit'])){
                // Get the post variables
                $questionNum = $_POST['question-number'];
                $questionText = $_POST['question-text'];
                $correctChoice = $_POST['correct-choice'];

                // Create array of choices
                $choices = array();
                $choices[1] = $_POST['choice1'];
                $choices[2] = $_POST['choice2'];
                $choices[3] = $_POST['choice3'];
                $choices[4] = $_POST['choice4'];
                $choices[5] = $_POST['choice5'];

                // Validate insert
                // Question query
                if($this->quizzoneModel->addQuestion($questionNum, $questionText)){
                    foreach($choices as $choice => $value){
                        if($value != ''){
                            if($correctChoice == $choice){
                                $isCorrect = 1;
                            }else{
                                $isCorrect = 0;
                            }
                            // Validate insert
                            // Choice query
                            if($this->quizzoneModel->addChoices($questionNum, $isCorrect, $value)){
                                continue;
                            }else{
                                die();
                            }
                        }
                    }

                    $msg = 'Question has been added';
                }

                $num = $this->quizzoneModel->getQuestionsNum();
                $next = $num +1;

                $data = [
                    'num' => $next,
                    'msg' => $msg
                ];

                $this->view('quizzone/add', $data);
            }

        }else{
            $this->view('quizzone/add');
        }

    }

}


?>
