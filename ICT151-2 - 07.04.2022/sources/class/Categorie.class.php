<?php
Class Categorie{
   
   
   private $id_cat;
   private $nom;
   
  
    public function __construct($id = null){
        $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST, SQL_USER, SQL_PASSWORD, 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));

        if($id){
            $this->set_id_cat($id);
            $this->init();
        }
    }
   
   /**
     * Initialisation de l'objet (l'id doit �tre sett�)
     * @return boolean
     */
    public function init() {
       $query = "SELECT * FROM t_categories WHERE id_cat=:id_cat";
       try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_cat'] = $this->get_id_cat();
            $stmt->execute($args);
            $tab = $stmt->fetch();
            
            $this->set_nom($tab['nom_cat']);
            
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
   
   

  
   public function add($tab){
       
      
      // Tableau d'arguments
        $args[':nom_cat'] = $tab['nom_cat'];
        
       $query = "INSERT INTO t_categories SET "
                . "nom_cat = :nom_cat";
         try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            
        } catch (Exception $e) {
           //echo $e;
            return false;
        }
        return $this->pdo->lastInsertId();
       
   }
   
   function get_all(){
        $query = "SELECT * FROM t_categories order by nom_cat ASC";
       
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $tab = $stmt->fetchAll();
            return $tab;
        } catch (Exception $e) {
            return false;
        }
   }
   
   
    
   
   function get_id_cat() {
       return $this->id_cat;
   }

   
   function set_id_cat($id_cat) {
       $this->id_cat = $id_cat;
   }

   function get_nom() {
       return $this->nom;
   }

   function set_nom($nom) {
       $this->nom = $nom;
   }
  
}
?>