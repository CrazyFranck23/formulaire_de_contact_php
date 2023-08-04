<?php

    $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);

    // $firstname = $name = $email = $phone = $message = "";
    // $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
    // $isSuccess = false;
    $emailTo = "erikfranckeinstein@yahoo.fr";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["firstname"] = verifyInput($_POST["firstname"]);
        $array["name"] = verifyInput($_POST["name"]);
        $array["email"] = verifyInput($_POST["email"]);
        $array["phone"] = verifyInput($_POST["phone"]);
        $array["message"] = verifyInput($_POST["message"]);
        $array["isSuccess"] = true;
        $emailText = "";

        if(empty($array["firstname"]))
        {
            $array["firstnameError"] = "Je veux connaitre ton prenom !";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Firstname: {$array["firstname"]}\n";
            //$emailText = $emailText . "Firstname: $firstname\n"; ?? A verifier..
        }

        if(empty($array["name"]))
        {
            $array["nameError"] = "Et oui je veux tout savoir. Meme ton nom !";
            $array["isSuccess"] = false;
        }
        else 
        {
            $emailText .= "Name: {$array["name"]}\n";
        }

        if(!isEmail($array["email"])) //Je rajoute le "!" pour obtenir la negation, genre si mon email est invalide, donc FALSE, alors < !FALSE > devient < TRUE > et donc le message d'erreur est afficher .. Carreee
        {
            $array["emailError"] = "T'essaies de me rouler ? C'est pas un email ca !";
            $array["isSuccess"] = false;
        }
        else 
        {
            $emailText .= "Email: {$array["email"]}\n";
        }

        /*
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) Eventuellement on aurais pu faire uniquement ca pour le verif d'email, sans cree de fonction < isEmail >, mais c'est moins jolie..
        {
            $emailError = "T'essaies de me rouler ? C'est pas un email ca !";
        } */

        if(!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Que des chiffres et des espaces, stp...";
            $array["isSuccess"] = false;
        }
        else 
        {
            $emailText .= "Phone: {$array["phone"]}\n";
        }

        if(empty($array["message"]))
        {
            $array["messageError"] = "Qu'est-ce que tu veux me dire ?";
            $array["isSuccess"] = false;
        }
        else 
        {
            $emailText .= "Message: {$array["message"]}\n";
        }

        if($array["isSuccess"]) //Ici on va utiliser la fonc. PHP < mail > pour envoyer un email
        {
            $headers = "From: {$array["firstname"]} {$array["name"]} <{$array["email"]}>\r\nReply-To: {$array["email"]}"; //En-tete de l'email
            mail($emailTo, "Un message de votre site", $emailText, $headers);
            // $firstname = $name = $email = $phone = $message = ""; ..plus besoin
        }

        echo json_encode($array);
    }

    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/", $var); //La fonc preg-match va verifier si ma varibale respecte les lois de l'expression regulier, alors elle va renvoyer TRUE sinon elle va renvoyer FALSE.
    }

    function isEmail($var) //Cette foction que je cree va utiliser une foction existant de PHP (filter_var($var, FILTER_VALIDATE_EMAIL)) pour verifier si mon email est valide ou pas. Si l'email est valide, ca va renvoyer TRUE.
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL); //En faite ici, notre $var sera comparer avec la fonction FILTER_VALIDATE_EMAIL qui verifira si c'est un email valide.
    }

    function verifyInput($var) //Cette fonction nettoie tout ce qui sera entrer par l'utilisateur dans le cas ou il cherche a nous faire du mal 
    {
        $var = trim($var); //Le but de la fonction trim() c'est d'enlever tout les espaces supplementaires, les tab et retour a la ligne dans notre formulaire
        $var = stripslashes($var); //Enleve tout les anti-slashs
        $var = htmlspecialchars($var);
        return $var;
    }
?>