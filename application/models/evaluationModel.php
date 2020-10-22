<?php
    require_once(PATH_CORE."/dbModel.php");
    require_once(PATH_DTO."/evaluationResultDTO.php");
    class EvaluationModel extends DBModel{
        const ADD_EVALUATION_RESULT_PROC_NAME = "add_evaluation_result";
        const GET_EVALUATION_RESULT__FOR_STUDENT_PROC_NAME = "get_evaluation_result_for_student";

        public function add_evaluation_result($evaluation_result){
            //question 2
            $pdo =$this->get_pdo_instance();
            $statementHandle = $pdo->prepare("CALL ".self::ADD_EVALUATION_RESULT_PROC_NAME. "(:name,:score,:id_student)");
            try{
            $statementHandle->execute([
                "name"=>$evaluation_result->get_name(), 
                "score"=>$evaluation_result->get_score(), 
                "id_student"=>$evaluation_result->get_id_student(), 
                ]);
            } catch(PDOException $e){
                throw $e;
               /*echo $e->getMessage();
               die();*/
            }

        }

        public function get_evaluation_result_for_student($id_student){
            //question 3
            $pdo =$this->get_pdo_instance();
            $statementHandle = $pdo->prepare("CALL ".self::GET_EVALUATION_RESULT__FOR_STUDENT_PROC_NAME. '(:id_student)');
            try{

                $statementHandle->execute([ 
                    "id_student"=>$id_student,
                    ]);
                $results = $statementHandle->fetchAll(PDO::FETCH_CLASS, 'EvaluationResultDTO');

                /*if($results === false)   Non recommandé
                {
                    throw new Exception("Aucun resultat trouve");
                }*/

                return $results;

            } catch(PDOException $e){
                throw $e;              
            }
        }
        
    }


?>