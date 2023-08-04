<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" action="" method="post" role="form">
                    <!-- la fonction : htmlspecialchars() permet de resoudre le probleme de securite d'injection de code/script javascript dans le PHP_SELF .. appeler : Faille XSS -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">Prenom<span class="blue"> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prenom" value="">
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Nom<span class="blue"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="">
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="">
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-6">
                                <label for="phone">Telephone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre telephone" value="">
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea name="message" id="message" class="form-control" placeholder="Votre message" rows="4"></textarea>
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises</strong></p>
                            </div>

                            <div class="col-md-12">
                               <input type="submit" class="button1" value="Envoyer">
                            </div>
                        </div>

                        <!-- <p class="thank-you" style="display:none">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p> -->
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>