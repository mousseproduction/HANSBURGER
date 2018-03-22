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
            
            @import url('plateaustylegrid.css');
/*            @import url('plateaustyleresponsive.css');*/

        </style>
    </head>

    <body>
        <div class="grid-container">
        <!-- Column1 -->
            <!-- Row1 -->

            <div class="menu">
            <a href="?m=game&c=game&a=abandon"><img src="images/menu.png" style="height:30px;"></a>
            </div>
            
            <!-- Row2 -->
            <div class="historique">
            <a href="www.google.fr"><img src="images/historique.png" style="height:100px;"></a>
            </div>
            <!-- Row3+4+5 -->
            
            <div class="<?php echo ($this->getGame()->getHerosActif()->getNom()=='hans')? "hansHerosActif":"burgerHerosActif"; ?>">
                <h1 class="pictoVieHerosActif"><?php echo $this->getGame()->getHerosActif()->getPv()?></h1>
            </div>
    <!-- Column2 -->
            <!-- Row1+2 -->
            <div class="visuelHerosInactif">
                <h1 class="pictoVieHerosInactif">20</h1> -->
            </div>
            <!-- Row3 -->
            <div class="deckHerosInactif">
                <div class="carteAttente">
                    <a href=?m=game&c=game&a=??? ><img src="images/burger/jpg-72-rvb/miss_meuf_in.jpg" alt="" class="carteAttente"></a>
                    <div class="pictocout">5</div>
                    <div class="pictoattaque">6</div>
                    <div class="pictovie">8</div>
                </div>
        
                <div class="carteCombat">
                    <a href=?m=game&c=game&a=attack><img src="images/burger/jpg-72-rvb/miss_meuf_in.jpg" alt="" class="carteCombat"></a>
                    <div class="pictocout">5</div>
                    <div class="pictoattaque">6</div>
                    <div class="pictovie">8</div>
                </div>
            </div>
            <!-- Row4 -->
            <div class="deckHerosActif">
                <div class="carteAttente">
                    <img src="images/hans/jpg-72-rvb/badman.jpg" alt="" class="carteAttente">
                    <div class="pictocout">5</div>
                    <div class="pictoattaque">6</div>
                    <div class="pictovie">8</div>
                </div>

                <div class="carteCombat">
                    <a href=?m=game&c=game&a=attack><img src="images/hans/jpg-72-rvb/badman.jpg" alt="" class="carteCombat"></a>
                    <div class="pictocout">5</div>
                    <div class="pictoattaque">6</div>
                    <div class="pictovie">8</div>
                </div>  
            </div>
            <!-- Row5 -->
            <div class="mainHerosActif">
                <div class="carteMain">
                    <a href=?m=game&c=game&a=invoke></a><img src="images/hans/jpg-72-rvb/badman.jpg" alt="" class="carteMain"></a>
                    <div class="pictocoutmain">1</div>
                    <div class="pictoattaquemain">1</div>
                    <div class="pictoviemain">1</div>
                </div>
                 <div class="carteMain">
                    <a href=?m=game&c=game&a=invoke></a><img src="images/hans/jpg-72-rvb/badman.jpg" alt="" class="carteMain"></a>
                    <div class="pictocoutmain">2</div>
                    <div class="pictoattaquemain">2</div>
                    <div class="pictoviemain">2</div>
                </div>
               
            </div>
        <!-- Column3 -->
            <!-- Row1+2+3 -->
            <div class="finTour">
                <a href="?m=game&c=game&a=pass">
                    <img src="images/fintour.png" style="height:200px;">
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