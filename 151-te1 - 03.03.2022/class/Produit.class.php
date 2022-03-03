<?php

Class Produit
{

    private $id;// id
    private $nom; //nom_prod
    private $categorie; // cat_prod
    private $description; // description_prod
    private $prix; // prix_prod
    private $url; // url_prod
    private $stock; // stock_prod
    private $pdo;


    public function add($tab){
        $args['nom_prod'] = $tab['nom_prod'];
        $args['cat_prod'] = $tab['cat_prod'];
        $args['description_prod'] = $tab['description_prod'];
        $args['prix_prod'] = $tab['prix_prod'];
        $args['url_prod'] = $tab['url_prod'];
        $args['stock_prod'] = $tab['stock_prod'];

        $query ="INSERT INTO magasin SET "
            . "nom_prod = :nom_prod, "
            . "cat_prod = :cat_prod, "
            . "description_prod = :description_prod, "
            . "prix_prod = :prix_prod, "
            . "url_prod = :url_prod, "
            . "stock_prod = :stock_prod, ";


        try {
            $stmt=$this->pdo->prepare($query);
            $stmt->execute($args);
            return $this->pdo->lastInsertId();
        }catch (Exception $e){
            echo $e;
            return false;
        }

    }


    public function __construct($id=null){
        $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host='.SQL_HOST,
                            SQL_USER,
                            SQL_PASSWORD,
                             array(
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                                    )
        );
        if($id) {
            $this->set_id($id);
            $this->init();
        }

    }
    public function init(){

        $query = "SELECT  FROM magasin WHERE id=:id";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':id'] =$this->get_id();
            $stmt->execute($args);
            $tab=$stmt->fetch();

            $this->set_nom($tab['nom_prod']);
            $this->set_categorie($tab['categorie_prod']);
            $this->set_description($tab['description_prod']);
            $this->set_prix($tab['prix_prod']);
            $this->set_url($tab['url_prod']);
            $this->set_stock($tab['stock_prod']);
            return true;

        }catch(Exception $e){
            return  false;
        }


    }

    public function __toString()
    {
        $str = "<pre>";
        $str .= "\nnom = " . $this->get_nom();
        $str .= "\ncategorie = " . $this->get_categorie();
        $str .= "\ndescription = " . $this->get_description();
        $str .= "\nprix = " . $this->get_prix();
        $str .= "\nurl = " . $this->get_url();
        $str .= "\nstock = " . $this->get_stock();
        return $str;
    }


    public function check_nom($nom){
        $query="SELECT * FROM magasin WHERE nom_prod =:nom LIMIT 1";
        try{
            $stmt=$this->pdo->prepare($query);
            $args[':nom']=$nom;
            $stmt->execute($args);
            $tab=$stmt->fetch();
            if($tab['nom_prod'] == $nom){
                return true;
            }else{
                return false;
            }

        }catch (Exception $e){
            return false;
        }

    }

    public function check_categorie($categorie){
        $query="SELECT * FROM magasin WHERE categorie_prod =:categorie LIMIT 1";
        try{
            $stmt=$this->pdo->prepare($query);
            $args[':categorie']=$categorie;
            $stmt->execute($args);
            $tab=$stmt->fetch();
            if($tab['categorie_prod'] == $categorie){
                return true;
            }else{
                return false;
            }

        }catch (Exception $e){
            return false;
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

}


?>