<?php
Class Personne{

        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $news_letter;

        private $pdo; // object en php qui permet de se connecter à la base de données

        public function __construct($id=null)
        {
            $this-> pdo = new PDO('mysql:dbname='.BASE_NAME.';host='.SQL_HOST,
                                        SQL_USER,
                                        SQL_PASSWORD,
                                        array(
                                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                                        )
            );
            if($id){
                $this-> set_id($id);
                $this-> init();
            }
            /**
             * Initialisation de l'objet (l'id doit être setté)
             * return boolean
             */
        }

        public function init()
        {


            try {
                $query = "SELECT * FROM t_personnes WHERE id_per=:id_per";
                $stmt = $this-> pdo->prepare($query);

                $args = array();
                $args[':id_per']= $this->get_id();

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

            }catch(Exception $e){
                echo 'Exception reçue : ', $e-> getMessage(), "\n";
            }


    }

        //genere un hash et le stock dans l'instance
    public function gen_password($password){
            $this-> set_password(password_hash($password,PASSWORD_DEFAULT));
        }

    public function __toString(){
            /*.=est un opérateur de concaténation prend la string comme elle est et ajoute ce qui ce trouve après le.=*/
            $str = "<pre>";
            $str .= "\nnid = ".$this-> get_id();
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
     * il faut cliquer avec bouton droit generate getteer ans setter
     * pour faire les getter et setter de manière automatique
     */

    /**
     * @return mixed
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function set_id($id)
    {
        $this->id = $id;
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