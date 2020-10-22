<?php
    require_once(PATH_CORE."/dbModel.php");
    require_once(PATH_DTO."/studentDTO.php");
    require_once(PATH_EXCEPTION."/noStudentFoundException.php");

    class StudentModel extends dbModel{
        const GET_ALL_STUDENTS_PROC_NAME = "get_all_students";

        public function get_all_students():array{
            //question 1
            $pdo = $this->get_pdo_instance();
            $statementHandle = $pdo->prepare("CALL ".self::GET_ALL_STUDENTS_PROC_NAME. "()");
            $statementHandle->execute();
            $students = $statementHandle->fetchAll(PDO::FETCH_CLASS, 'studentDTO');
            if ($students === false){
                throw new noUserFoundException();
            }

            return $students;
        }
    }


?>