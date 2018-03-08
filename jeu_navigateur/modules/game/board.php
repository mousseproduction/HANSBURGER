<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <title>Plateau de jeu HANSBURGER</title>
        <meta name="description" content="Plateau de jeu HANSBURGER">
        <link rel="stylesheet" href="web/Bootstrap/css/bootstrap.css">
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic|Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic');
            @import url('web/plateaustyle.css');
        </style>
    </head>

    <body>
        <div class="container-fluid row">
            <aside class="col-lg-2 hidden-xs" role="asidegauche">

                <div class="deco">DECO</div>
                <div class="historique"> 
                    <h1>HISTORIQUE</h1>
                </div>
                <div class="deco">DECO</div>
            </aside>

            <main class="col-lg-8" role="main">
                <section role="hero1" id="hero1">
                        <div class="row deckhero1">
                            <div class="col-lg-6 mainhero1">
                                <div class="deco">DECO</div>
                                <div class="text-center">
                                    <?php
                                    if( isset($this->getGame()->getHerosActif()->getCartes()['Main'] ) ) {
                                        foreach( $this->getGame()->getHerosActif()->getCartes()['Main'] as $key => $card ) {
                                            $card->display();
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 hero1"> HEROS
                                <h1 class="pictocout">5</h1>
                                <h1 class="pictovie">10</h1>
                            </div>
                            <div class="col-lg-3 piochehero1">PIOCHE
                                <div class="deco">DECO</div>
                                <img src="images/HANSBURGER-dos.png" alt="" class="carte">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 attentehero1">
                                <p>ATTENTE HERO1</p>
                                <?php
                                if( isset($this->getGame()->getHerosActif()->getCartes()['Attente']) ) {
                                    foreach( $this->getGame()->getHerosActif()->getCartes()['Attente'] as $key => $card ) {
                                        $card->display();
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 combathero1">
                                <p>COMBAT HERO1</p>
                                <?php
                                if( isset( $this->getGame()->getHerosActif()->getCartes()['Combat'] ) ) {
                                    foreach( $this->getGame()->getHerosActif()->getCartes()['Combat'] as $key => $card ) {
                                        $card->display();
                                    }
                                }
                                ?>
                            </div>
                    </div>
                </section>

                <section class="hero2" role="hero2">
                        <div class="row">
                            <div class="col-lg-6 combathero2">
                                <p>COMBAT HERO2</p>
                                <?php
                                if( isset( $this->getGame()->getHerosActif()->getCartes()['Combat'] ) ) {
                                    foreach( $this->getGame()->getHerosActif()->getCartes()['Combat'] as $key => $card ) {
                                        $card->display();
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 attentehero2">
                                <p>ATTENTE HERO2</p>
                                <?php
                                if( isset( $this->getGame()->getHerosActif()->getCartes()['Attente'] ) ) {
                                    foreach( $this->getGame()->getHerosActif()->getCartes()['Attente'] as $key => $card ) {
                                        $card->display();
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class=" row deckhero2">
                            <div class="col-lg-7 mainhero2 align-middle">
                                    <div>
                                        <?php
                                        if( isset( $this->getGame()->getHerosActif()->getCartes()['Main'] ) ) {
                                            foreach( $this->getGame()->getHerosActif()->getCartes()['Main'] as $key => $card ) {
                                                $card->display();
                                            }
                                        }
                                        ?>
                                    </div>
                            </div>
                            <div class="col-lg-3 hero2">HEROS
                                <img src="images/HANS-Heros.png" alt="" class="hero">
                            </div>
                            <div class="col-lg-2 piochehero2">PIOCHE
                                <img src="images/HANSBURGER-dos.png" alt="" class="carte">
                            </div>
                </section>
            </main>

            <aside class="col-md-2" role="asidedroite">
                <h1>COTE DROIT</h1>
            </aside>
        </div>
    </body>
</html>
