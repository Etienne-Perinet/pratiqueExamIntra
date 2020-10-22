<?php

    require_once(PATH_CORE."/controller.php");
    require_once(PATH_MODELS."/studentModel.php");
    require_once(PATH_MODELS."/evaluationModel.php");
    require_once(PATH_DTO."/evaluationResultDTO.php");

    session_start();
    
    class OptionsController extends Controller{
        
        const SHOW_OPTIONS_TITLE = "Vos options";

        public function __construct(){
            
        }

        public function show(){
            //question 4
            $view = new View("optionsView.php");
            
            if (isset($_SESSION['optionValue'])&& $_SESSION['optionValue']==='active'){
                $optionValue= "active";
            }
            else if((isset($_SESSION['optionValue'])&& $_SESSION['optionValue']==='desactivée'))
            {
                $optionValue= 'desactivée' ;
            }
            else{
                $optionValue= "desactive(par defaut)";
            }
            
            $data = array("optionValue"=>$optionValue);
            $content = $view->render($data);
            echo $this->render_template_with_content(self::SHOW_OPTIONS_TITLE, $content);
        }

        public function activate(){
            //question 4
            $_SESSION['optionValue'] = "active";
        }

        public function deactivate(){
            //question 4
            $_SESSION['optionValue'] = "desactivée";
        }

        public function clear(){
            //question 4
            //unset($_SESSION['optionValue']);

            // Détruit toutes les variables de session
            $_SESSION = array();

            // Si vous voulez détruire complètement la session, effacez également
            // le cookie de session.
            // Note : cela détruira la session et pas seulement les données de session !
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalement, on détruit la session.
            session_destroy();
        }


      
    }
?>