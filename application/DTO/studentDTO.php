<?php
    class StudentDTO{

        private $id_student;
        private $first_name;
        private $last_name;
        

        public function get_id(){
            return $this->id_student;
        }

        public function get_first_name(){
            return $this->first_name;
        }

        public function get_last_name(){
            return $this->last_name;
        }
        
    }
?>