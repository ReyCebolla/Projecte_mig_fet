<?php
/*
class adminModel {
    private $db;

    public function __construct() {
        // Dades de configuració
        $host = "localhost";
        $dbname = "webbooks";
        $user = "bookadmin";
        $pass = "1111";

        try {
            // Creem la connexió PDO (DSN: Data Source Name)
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            
            // Configurem PDO perquè llanci excepcions en cas d'error
            // Això ens ajuda molt a detectar fallades de sintaxi o connexió
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            // Si hi ha un error de connexió, el capturem aquí
            die("Error de connexió: " . $e->getMessage());
        }
    }

    //Llista els clients
    public function llistaClients() {
        try {
            // 1. Preparem la sentència. 
            // Fem servir "paràmetres amb nom" (:usu i :pas), que és més clar que els "?"
            $sql = "SELECT * FROM client";
            $stmt = $this->db->prepare($sql);

            // 2. Executem passant un array amb les dades.
            // PDO s'encarrega automàticament de netejar les dades (Seguretat SQL Injection)
            $stmt->execute();

            // Retornem un array associatiu amb tots els resultats
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
    


}
*/



class adminModel {
    private $db;

    public function __construct() {
        // Dades de configuració
        $host = "localhost";
        $dbname = "webbooks";
        $user = "bookadmin";
        $pass = "1111";

        $this->db = mysqli_connect("localhost", $user, $pass, $dbname);
    }

    //Llista els clients
    public function llistaClients() {
 
        $sql = "SELECT * FROM client";
        $stmt = mysqli_prepare($this->db, $sql);
        
        mysqli_stmt_execute($stmt);
        
        $resultat = mysqli_stmt_get_result($stmt);
        
        // Creem un array per guardar totes les files
        $dades = [];
        while ($fila = mysqli_fetch_assoc($resultat)) {
            $dades[] = $fila;
        }
        
        
        return $dades;
    }

        //Llista els clients
    public function esborraClients() {
 
        $sql = "SELECT * FROM client";
        $stmt = mysqli_prepare($this->db, $sql);
        
        mysqli_stmt_execute($stmt);
        
        $resultat = mysqli_stmt_get_result($stmt);
        
        // Creem un array per guardar totes les files
        $dades = [];
        while ($fila = mysqli_fetch_assoc($resultat)) {
            $dades[] = $fila;
        }
        
        
        return $dades;
    }


}





?>