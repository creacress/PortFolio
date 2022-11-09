<?php
    $serveur = "127.0.0.1:3306";
    $dbname = "PortFolio";
    $user = "al3xis";
    $pass = "Enilorac57#";

    $full_name = $_POST["full_name"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $telephone_number= $_POST["telephone_number"];

   

    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
       

        $sth = $dbco->prepare("
                            INSERT INTO `users_id`(full_name, name, email, telephone number)
            `VALUES`(:full_name, :name, :email, :telephone_number)");
            
            $sth->bindParam(':full_name',$full_name);
            $sth->bindParam(':name',$name);
        $sth->bindParam(':email',$email);
        $sth->bindParam(':telephone_number',$telephone_number);
       
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Confirmation_rdv.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>