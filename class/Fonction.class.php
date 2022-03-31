<?php
class Fonction
{
    Private $id_fnc;
    Private $nom_fnc;
    Private $abr_fnc;
    Private $desc_fnc;

    public function __construct($id=null)
    {
        parent::__construct();

        if($id){
            $this-> set_id_fnc($id);
            $this-> init();
        }
    }


    public function init()
    {


        try {
            $query = "SELECT * FROM t_fonctions WHERE id_fnc=:id_fnc";
            $stmt = $this-> pdo->prepare($query);

            $args = array();
            $args[':id_fnc']= $this->get_id_fnc();

            $stmt->execute($args);

            //fetch => tableau a une ligne , fetch all => tableau a plusieurs dimensions

            $tab = $stmt-> fetch();
            $this->set_nom_fnc($tab['nom_fnc']);
            $this->set_abr_fnc($tab['abr_fnc']);
            $this->set_desc_fnc($tab['desc_fnc']);

            return true;

        } catch (Exception $e){
            return false;
        }
    }



    public function add($tab)
    {

        $args = array();
        $args['nom_fnc'] = $tab['nom_fnc'];
        $args['desc_fnc'] = $tab['desc_fnc'];
        $args['abr_fnc'] = $tab['abr_fnc'];


        try{
            $query = "INSERT INTO t_fonctions SET 
                                            nom_fnc = :nom_fnc,
                                            abr_fnc = :abr_fnc,
                                            desc_fnc = :desc_fnc";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);

            return $this->pdo->LastInsertId();

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e-> getMessage(), "\n";
            return false;
        }


    }

    // check si l'abbréviation passé en argument existe deja dans la base

    public function  check_abr($abr){
        try {
            $query = "SELECT * FROM t_fonctions WHERE abr_fnc= :abr_fnc LIMIT 1";
            $stmt = $this-> pdo->prepare($query);
            $args = array();
            $args[':abr_fnc']= $abr;
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
    public function get_id_fnc()
    {
        return $this->id_fnc;
    }

    /**
     * @param mixed $id_fnc
     */
    public function set_id_fnc($id_fnc)
    {
        $this->id_fnc = $id_fnc;
    }

    /**
     * @return mixed
     */
    public function get_nom_fnc()
    {
        return $this->nom_fnc;
    }

    /**
     * @param mixed $nom_fnc
     */
    public function set_nom_fnc($nom_fnc)
    {
        $this->nom_fnc = $nom_fnc;
    }

    /**
     * @return mixed
     */
    public function get_abr_fnc()
    {
        return $this->abr_fnc;
    }

    /**
     * @param mixed $abr_fnc
     */
    public function set_abr_fnc($abr_fnc)
    {
        $this->abr_fnc = $abr_fnc;
    }

    /**
     * @return mixed
     */
    public function get_desc_fnc()
    {
        return $this->desc_fnc;
    }

    /**
     * @param mixed $desc_fnc
     */
    public function set_desc_fnc($desc_fnc)
    {
        $this->desc_fnc = $desc_fnc;
    }


}