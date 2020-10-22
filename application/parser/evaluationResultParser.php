<?php
    require_once(PATH_DTO."/evaluationResultDTO.php");
    class EvaluationResultParser {

        public Static function parse_post_form(){
           

            if(isset($_POST["name"])){
                //Error validation
            }
            if(isset($_POST["score"])){
               //Error validation
            }
            if(isset($_POST["id_student"])){
               //Error validation
            }
            
            $evaluation_result_DTO = new EvaluationResultDTO();
            $evaluation_result_DTO->set_from_post($_POST);
            return $evaluation_result_DTO;
        }
  
    }

?>