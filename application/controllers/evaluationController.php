<?php

    require_once(PATH_CORE."/controller.php");
    require_once(PATH_MODELS."/studentModel.php");
    require_once(PATH_MODELS."/evaluationModel.php");
    require_once(PATH_DTO."/evaluationResultDTO.php");
    require_once(PATH_PARSER."/evaluationResultParser.php");

    class EvaluationController extends Controller{
        
        const ADD_EVALUATION_TITLE = "Ajout d'une évaluation";
        const SHOW_EVALUATION_RESULT_FOR_STUDENT_TITLE = "Résultat d'un étudiant";
        private $student_model;
        private $evaluation_model;
        public function __construct(){
            $this->student_model =  new StudentModel();
            $this->evaluation_model = new EvaluationModel();
        }

        public function show(){
            $view = new View("accueilView.php");
            $data = array();
            $content = $view->render($data);
            echo $this->render_template_with_content(self::ADD_EVALUATION_TITLE, $content);
        }

        public function addResult(){
            //Question 1 (GET) 
            
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $this->show_add_evaluation_result();  
            }
            elseif($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $this->save_evaluation_result();
            }
            //Question 2 (POST)  $this->save_evaluation_result();
         
           
        }

        private function show_add_evaluation_result(){
            //Question 1

            $view = new View("addEvaluationResultView.php");

            $students = $this->student_model->get_all_students();           
            $data = array("students"=>$students);

            $content = $view->render($data);
            echo $this->render_template_with_content(self::ADD_EVALUATION_TITLE, $content);
        }

        private function save_evaluation_result(){
            //Question 2
            $evaluation_result = EvaluationResultParser::parse_post_form();//???
            $this->evaluation_model->add_evaluation_result($evaluation_result);
        }
        public function showResultForStudent($id_student){
            //Question 3
            $view = new View("evaluationResultForStudent.php");

            $results = $this->evaluation_model->get_evaluation_result_for_student($id_student);           
            $data = array("results"=>$results);

            $content = $view->render($data);
            echo $this->render_template_with_content(self::SHOW_EVALUATION_RESULT_FOR_STUDENT_TITLE, $content);
        }
    }
?>