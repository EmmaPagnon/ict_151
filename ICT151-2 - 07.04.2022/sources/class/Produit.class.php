<?php
Class Produit{


    private $id_prd;
    private $nom;
    private $description;
    private $prix;
    private $url;
    private $stock;
    private $pdo;


    public function __construct($id = null){
        $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST, SQL_USER, SQL_PASSWORD,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));

        if($id){
            $this->set_id_prd($id);
            $this->init();
        }
    }

    public function add_cat($id_cat){

        $query="INSERT INTO t_cat_prd SET id_cat=:id_cat,id_prd=:id_prd";
        try {
            $stmt= $this->pdo->prepare($query);

            $args[':id_prd']= $this-> get_id_prd();
            $args[':id_cat']= $id_cat;
            return $stmt->execute($args);





        }catch (Exception $e){
            return false;
        }
    }



    /**
     * Initialisation de l'objet (l'id doit �tre sett�)
     * @return boolean
     */
    public function init() {
        $query = "SELECT * FROM t_produits WHERE id_prd=:id_prd";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_prd'] = $this->get_id_prd();
            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_prd']);
            $this->set_description($tab['description_prd']);
            $this->set_prix($tab['prix_prd']);
            $this->set_url($tab['url_prd']);
            $this->set_stock($tab['stock_prd']);

        } catch (Exception $e) {
            return false;
        }
        return true;
    }



    public function __toString(){
        $str = "\n<pre>\n";
        foreach($this AS $key => $val){
            if($key != "pdo"){
                $str .= "\t".$key;
                $lengh_key = strlen($key);
                for($i=strlen($key);$i<20;$i++){
                    $str .= "&nbsp;";
                }
                $str .= "=>&nbsp;&nbsp;&nbsp;".$val."\n";
            }
        }
        $str .= "\n</pre>";
        return $str;
    }



    /**
     * Ajoute un PRODUIT dans la base de donn�es
     * @param array tableau avec les propri�t�s du produit
     * @return int id du produit ajout�
     */
    public function add($tab){


        // Tableau d'arguments
        $args[':nom_prd'] = $tab['nom_prd'];
        $args[':description_prd'] = $tab['description_prd'];
        $args[':prix_prd'] = $tab['prix_prd'];
        $args[':url_prd'] = $tab['url_prd'];
        $args[':stock_prd'] = $tab['stock_prd'];

        $query = "INSERT INTO t_produits SET "
            . "nom_prd = :nom_prd, "
            . "description_prd = :description_prd, "
            . "prix_prd = :prix_prd, "
            . "url_prd = :url_prd, "
            . "stock_prd = :stock_prd";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);

        } catch (Exception $e) {
            //echo $e;
            return false;
        }
        return $this->pdo->lastInsertId();

    }




    public function check_unique($nom){

        $query = "SELECT * FROM t_produits WHERE  nom_prd=:nom";

        $args[':nom'] = $nom;


        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $tab = $stmt->fetch();
            if($tab['nom_prd'] == $nom){
                return false;
            }else{
                return true;
            }

        } catch (Exception $e) {
            //echo $e;
            return false;
        }

    }


    function get_all(){
        $query = "SELECT * FROM t_produits order by nom_prd ASC";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $tab = $stmt->fetchAll();
            return $tab;
        } catch (Exception $e) {
            return false;
        }
    }


    function get_all_with_cat(){
        $query = "SELECT PRD.*, GROUP_CONCAT(`nom_cat` SEPARATOR ';') AS categories "
            . "FROM t_produits PRD "
            . "LEFT JOIN t_cat_prd CAP ON (CAP.id_prd = PRD.id_prd) "
            . "LEFT JOIN t_categories CAT ON (CAP.id_cat = CAT.id_cat) "
            . "GROUP BY PRD.id_prd "
            . "order by nom_prd ASC ";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $tab = $stmt->fetchAll();
            return $tab;
        } catch (Exception $e) {
            return false;
        }
    }

    function get_id_prd() {
        return $this->id_prd;
    }

    function get_prix() {
        return $this->prix;
    }

    function get_url() {
        return $this->url;
    }

    function get_stock() {
        return $this->stock;
    }

    function set_id_prd($id_prd) {
        $this->id_prd = $id_prd;
    }

    function set_prix($prix) {
        $this->prix = $prix;
    }

    function set_url($url) {
        $this->url = $url;
    }

    function set_stock($stock) {
        $this->stock = $stock;
    }


    function get_description() {
        return $this->description;
    }

    function set_description($description) {
        $this->description = $description;
    }

    function get_nom() {
        return $this->nom;
    }

    function set_nom($nom) {
        $this->nom = $nom;
    }
}
?>