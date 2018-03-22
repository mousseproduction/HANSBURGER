<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <title>Plateau de jeu HANSBURGER</title>
        <meta name="description" content="Plateau de jeu HANSBURGER">
        
        <style type="text/css">
            <!--
            @import url('https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic|Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic');
            
            @import url('web/plateaustylegrid.css');
/*            @import url('plateaustyleresponsive.css');*/

        </style>
    </head>

    <body>
        <div class="grid-container">
        <!-- Column1 -->
            <!-- Row1 -->

            <div class="menu">
            <a href="?m=game&c=game&a=abandon"><img src="web/images/menu.png" style="height:30px;"></a>
            </div>
            
            <!-- row2 -->
            <div class="historique">
            <a href="www.google.fr"><img src="web/images/historique.png" style="height:100px;"></a>
            </div>
            <!-- row3+4+5 -->
            
            <div class="<?php echo ($this->getgame()->getherosactif()->getnom()=='hans')? "hansherosactif":"burgerherosactif"; ?>">
                <h1 class="pictovieherosactif"><?php echo $this->getgame()->getherosactif()->getpv()?></h1>
            </div>
    <!-- column2 -->
            <!-- row1+2 -->
            <div class="visuelherosinactif">
                <h1 class="pictovieherosinactif">20</h1> -->
            </div>
            <!-- row3 -->
            <div class="deckherosinactif">
                <?php
                if( isset( $this->getGame()->getHerosInactif()->getCartes()['Attente'] ) ) {
                    foreach( $this->getGame()->getHerosInactif()->getCartes()['Attente'] as $key => $card ) {
                        $card->display();
                    }
                }
                ?>
                <?php
                if( isset( $this->getGame()->getHerosInactif()->getCartes()['Combat'] ) ) {
                    foreach( $this->getGame()->getHerosInactif()->getCartes()['Combat'] as $key => $card ) {
                        $card->display();
                    }
                }
                ?>
            </div>
            <!-- Row4 -->
            <div class="deckHerosActif">
                <?php
                if( isset($this->getGame()->getHerosActif()->getCartes()['Attente']) ) {
                    foreach( $this->getGame()->getHerosActif()->getCartes()['Attente'] as $key => $card ) {
                        $card->display();
                    }
                }
                ?>
                <?php
                if( isset( $this->getGame()->getHerosActif()->getCartes()['Combat'] ) ) {
                    foreach( $this->getGame()->getHerosActif()->getCartes()['Combat'] as $key => $card ) {
                        $card->display();
                    }
                }
                ?>
            </div>
            <!-- Row5 -->
            <div class="mainHerosActif">
                <?php
                if( isset($this->getGame()->getHerosActif()->getCartes()['Main'] ) ) {
                    foreach( $this->getGame()->getHerosActif()->getCartes()['Main'] as $key => $card ) {
                        $card->display();
                    }
                }
                ?>
            </div>
        <!-- Column3 -->
            <!-- Row1+2+3 -->
            <div class="finTour">
                <a href="?m=game&c=game&a=pass">
                    <img src="web/images/fintour.png" style="height:200px;">
                </a>
            </div>
            <!-- Row4+5 -->
            <div class="cagnotte">
                <div class="pictocagnotte">10</div>
                <div class="pictonbtour">10</div>
            </div>
        <!-- Column4 -->
            <!-- Row1+2+3 -->
            <div class="piocheHerosActif">
            
            </div>
            <!-- Row4+5 -->
            <div class="piocheHerosInactif">
            
            </div>

        </div>
    </body>
</html>
