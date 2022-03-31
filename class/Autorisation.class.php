<?php
class Autorisation
{
    Private $id_aut;
    Private $nom_aut;
    Private $code_aut;

    Private $desc_aut;

    public function __construct($id=null)
    {
        parent::__construct();

        if($id){
            $this-> set_id_aut($id);
            $this-> init();
        }
    }



    public function init()
    {


        try {
            $query = "SELECT * FROM t_autorisations WHERE id_aut=:id_aut";
            $stmt = $this-> pdo->prepare($query);

            $args = array();
            $args[':id_aut']= $this->get_id_aut();

            $stmt->execute($args);

            //fetch => tableau a une ligne , fetch all => tableau a plusieurs dimensions

            $tab = $stmt-> fetch();
            $this->set_nom_aut($tab['nom_aut']);
            $this->set_code_aut($tab['code_aut']);
            $this->set_desc_aut($tab['desc_aut']);


            return true;

        } catch (Exception $e){
            return false;
        }
    }



    public function add($tab)
    {

        $args = array();
        $args['nom_aut'] = $tab['nom_aut'];
        $args['code_aut'] = $tab['code_aut'];
        $args['desc_aut'] = $tab['desc_aut'];


        try{
            $query = "INSERT INTO t_autorisations SET 
                                            nom_aut = :nom_aut,
                                            code_aut = :code_aut,
                                            desc_aut = :desc_aut";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);

            return $this->pdo->LastInsertId();

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e-> getMessage(), "\n";
            return false;
        }


    }

    // check si le code passé en argument existe deja dans la base

    public function  check_code($code){
        try {
            $query = "SELECT * FROM t_autorisations WHERE code_aut= :code_aut LIMIT 1";
            $stmt = $this-> pdo->prepare($query);
            $args = array();
            $args[':code_aut']= $code;
            $stmt->execute($args);


            if($stmt-> rowCount()){
                return true;
            }else{
                return false;
            }


        } catch (Exception $e){
            return false;
        }
    }


    /**
     * ToString
     */
    public function __toString(){
        $str = "\n<pre>\n";
        foreach($this AS $key => $val){
            if($key != "pdo"){
                $str .= "\t".$key;
                $lengh_key = strlen($key);
                for($i=$lengh_key;$i<20;$i++){
                    $str .= "&nbsp;";
                }
                $str .= "=>&nbsp;&nbsp;&nbsp;".$val."\n";
            }
        }
        $str .= "\n</pre>";
        return $str;
    }


    /**
     * @return mixed
     */
    public function get_id_aut()
    {
        return $this->id_aut;
    }

    /**
     * @param mixed $id_aut
     */
    public function set_id_aut($id_aut)
    {
        $this->id_aut = $id_aut;
    }

    /**
     * @return mixed
     */
    public function get_nom_aut()
    {
        return $this->nom_aut;
    }

    /**
     * @param mixed $nom_aut
     */
    public function set_nom_aut($nom_aut)
    {
        $this->nom_aut = $nom_aut;
    }

    /**
     * @return mixed
     */
    public function get_code_aut()
    {
        return $this->code_aut;
    }

    /**
     * @param mixed $code_aut
     */
    public function set_code_aut($code_aut)
    {
        $this->code_aut = $code_aut;
    }

    /**
     * @return mixed
     */
    public function get_desc_aut()
    {
        return $this->desc_aut;
    }

    /**
     * @param mixed $desc_aut
     */
    public function set_desc_aut($desc_aut)
    {
        $this->desc_aut = $desc_aut;
    }





}