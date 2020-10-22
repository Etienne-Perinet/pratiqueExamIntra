<?php
    class EvaluationResultDTO{

        private $id_evaluation_result;
        private $name;
        private $score;
        private $id_student;

        public function get_id(){
            return $this->id_evaluation_result;
        }

        public function get_name(){
            return $this->name;
        }

        public function get_score(){
            return $this->score;
        }

        public function get_id_student(){
            return $this->id_student;
        }

        public function set_from_post(){
            foreach ($_POST as $key => $value){
                $this->$key = $value;
            }
        }
      
    }
?>