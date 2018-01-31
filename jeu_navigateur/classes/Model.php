<?php

abstract class Model

{
    private $pdo;

    public function __construct()
    {
        try
        {
            $this->pdo = new PDO( 'mysql:host=' .HOST. ';dbname=' .DBNAME. ';charset=utf8', LOGIN, PWD );
        }
        catch( PDOException $e )
        {
            die( $e->getMessage() );
        }
    }

        /**
     * Effectue une requete SQL
     * @param  string $sql    Votre requete
     * @param  array $params Un tableau associatif de la forme ['placeholder' => valeur]
     * @return PDOStatement         le retour de votre requete
     */
    public function makeStatement($sql, $params = [])
    {

        if(empty($params))
        {
            if (($statement=$this->pdo->query($sql))!==false)
            return $statement;
        }
        else
        {
            if ( ( $statement = $this->pdo->prepare($sql))!==false) {
                foreach ($params as $key => $value)
                {
                    $statement->bindValue($key, $value);
                }
                $statement->execute();

                return $statement;
            }
        }
    }


    public function makeSelect($sql, $params = [], $fetchStyle = PDO::FETCH_ASSOC, $fetchArg = null)
    {
        $statement = $this->makeStatement($sql, $params);

        if(is_null($fetchArg))
        {
            $result = $statement->fetchAll($fetchStyle);
        }
        else
        {
            $result = $statement->fetchAll($fetchStyle, $fetchArg);
        }
        $statement->closeCursor();

        return $result;
    }


    /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */ 
    public function setPdo($pdo)
    {
        if(is_objet($pdo) && get_class($pdo)==PDO)
        $this->pdo = $pdo;

        return $this;
    }
}