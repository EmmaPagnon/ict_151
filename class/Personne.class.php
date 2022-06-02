<?php
Class Personne EXTENDS Projet{

        private $id_per;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $news_letter;

        //private $pdo; // object en php qui permet de se connecter à la base de données

        public function __construct($id=null)
        {
            parent::__construct();

           if($id){
                $this-> set_id_per($id);
                $this-> init();
            }
        }

        public function init()
        {


            try {
                $query = "SELECT * FROM t_personnes WHERE id_per=:id_per";
                $stmt = $this-> pdo->prepare($query);

                $args = array();
                $args[':id_per']= $this->get_id_per();

                $stmt->execute($args);

                //fetch => tableau a une ligne , fetch all => tableau a plusieurs dimensions

                $tab = $stmt-> fetch();
                $this->set_nom($tab['nom_per']);
                $this->set_prenom($tab['prenom_per']);
                $this->set_email($tab['email_per']);
                $this->set_password($tab['password_per']);
                $this->set_news_letter($tab['news_letter_per']);
                return true;

            } catch (Exception $e){
                return false;
            }
        }

        // contrôle si l'email passé en argument existe dans la base de données
        public function  check_email($email){
            try {
                $query = "SELECT * FROM t_personnes WHERE email_per= :email LIMIT 1";
                $stmt = $this-> pdo->prepare($query);
                $args = array();
                $args[':email']= $email;
                $stmt->execute($args);

                //fetch => tableau a une ligne , fetch all => tableau a plusieurs dimensions

                if($stmt-> rowCount()){
                    return true;
                }else{
                    return false;
                }
                /*$tab = $stmt-> fetch();
                if($tab ['email_per'] == $email){
                    return  true;
                }else{
                    return false;  }*/

            } catch (Exception $e){
                return false;
            }


        }

        public function check_login($email,$password)
        {
            try {
                $query = "SELECT * FROM t_personnes WHERE email_per= :email LIMIT 1";
                $stmt = $this-> pdo->prepare($query);

                $args = array();
                $args[':email']= $email;

                $stmt->execute($args);

                if($stmt-> rowCount()){
                    $tab = $stmt->fetch();
                    if(password_verify($password,$tab['password_per'])){
                        $_SESSION['id'] = $tab['id_per'];
                        $_user_brother_id = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
                        $_SESSION['login_string'] = password_hash($tab['password_per'].$_user_brother_id, PASSWORD_DEFAULT);
                        $_SESSION['email']=$tab['email_per'];
                        return true;
                    }else{
                        return false;
                    }

                }else{
                    return false;
                }
            } catch (Exception $e){
                return false;
            }
        }

// va controler s'y l'on a bien mis en session ce qu'il fallait
// controle la pérénité du login
        public function check_connect()
        {
            if(isset($_SESSION['id'],$_SESSION['email'],$_SESSION['login_string']))
            {
                $_user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
                if(password_verify($this->get_password().$_user_browser_ip,$_SESSION['login_string'])){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }


    public function add($tab)
    {
        // avant d'insérer une personne on génère un password(public function gen($password){})
            $this->gen_password($tab['password']);

            $args = array();
            $args['nom_per'] = $tab['nom_per'];
            $args['prenom_per'] = $tab['prenom_per'];
            $args['email_per'] = $tab['email_per'];
            $args['news_letter_per'] = $tab['news_letter_per'];
            $args['password_per'] = $this->get_password();

            try{
                $query = "INSERT INTO t_personnes SET 
                                            nom_per = :nom_per,
                                            prenom_per = :prenom_per,
                                            email_per = :email_per,
                                            password_per = :password_per,
                                            news_letter_per = :news_letter_per";

                $stmt = $this->pdo->prepare($query);
                $stmt->execute($args);

                return $this->pdo->LastInsertId();

            }catch(Exception $e){
                //echo 'Exception reçue : ', $e-> getMessage(), "\n";
                return false;
            }


    }

        //genere un hash et le stock dans l'instance
    public function gen_password($password){
            $this-> set_password(password_hash($password,PASSWORD_DEFAULT));
        }


    public function get_all($order= "nom_per, prenom_per"){
        try{
            $query = "Select * From t_personnes ORDER BY ".$order;

            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e-> getMessage(), "\n";
            return false;
        }

    }



    public function add_fnc($id_fnc){
        try{
            $query = "Insert into t_fnc_per SET id_per=:id_per, id_fnc=:id_fnc";

            $args = array();
            $args['id_per'] = $this->get_id_per();
            $args['id_fnc'] = $id_fnc;


            $stmt = $this->pdo->prepare($query);
            return $stmt->execute($args);

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e-> getMessage(), "\n";
            return false;
        }
    }




    public function del_fnc($id_fnc){
        try{
            $query = "Delete from t_fnc_per Where id_per=:id_per AND id_fnc=:id_fnc";

            $args = array();
            $args['id_per'] = $this->get_id_per();
            $args['id_fnc'] = $id_fnc;


            $stmt = $this->pdo->prepare($query);
            return $stmt->execute($args);

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e-> getMessage(), "\n";
            return false;
        }



    }




    public function __toString(){
            /*.=est un opérateur de concaténation prend la string comme elle est et ajoute ce qui ce trouve après le.=*/
            $str = "<pre>";
            $str .= "\nid = ".$this-> get_id_per();
            $str .= "\nnom = ".$this-> get_nom();
            $str .= "\nprenom = ".$this-> get_prenom();
            $str .= "\nemail = ".$this-> get_email();
            $str .= "\npassword = ".$this-> get_password();
            $str .= "\nnews_letter = ".$this-> get_news_letter();
            $str .= "</pre>";
            return $str;

        }



    /**
     * set la propriété nom de la classe
     * @param $nom
     */
    public function set_nom($nom){
        $this-> nom = $nom;
    }
    public function get_nom(){
        return $this-> nom;
    }


    /**
     * il faut cliquer avec bouton droit generate getter ans setter
     * pour faire les getter et setter de manière automatique
     */

    /**
     * @return mixed
     */
    public function get_id_per()
    {
        return $this->id_per;
    }

    /**
     * @param mixed $id
     */
    public function set_id_per($id)
    {
        $this->id_per = $id;
    }

    /**
     * @return mixed
     */
    public function get_prenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function set_prenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function get_email()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function set_email($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function get_password()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function set_password($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function get_news_letter()
    {
        return $this->news_letter;
    }

    /**
     * @param mixed $news_letter
     */
    public function set_news_letter($news_letter)
    {
        $this->news_letter = $news_letter;
    }





}


?>