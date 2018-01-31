<?php

    /** A MODIFIER
     *Le héros attaqué encaisse les dégats !
     *
     * @param [int] $indexCible
     * @param [int] $indexAttaquant
     * @return void
     */
    public function subir($indexCible, $indexAttaquant) {//ID héros ou Numéro de carte choisie par le heros attaquant
    // vérifier si l'index transmis est un id de heros ou un index de carte dans l'algo principal (si GET indique ?herosid=  ou ?carteid???)
        if (substr( $indexCible, 0, 5) ) == 'heros' && substr($indexCible,6,1) == $this->id)){//Si l'index transmis commence par heros et si le chiffre correspond à l'id du heros
            $this->setPv( $this->getPv() - $this->getHeros_adverse()->cartes['combat'][$indexAttaquant]->getDegat());//on met à jour les points de vie du heros ciblé en enlevant les degats de la carte attaquante
            $this->getHeros_adverse()->cartes['attente'][] = $this->getHeros_adverse()->cartes['combat'][$indexAttaquant];//On la remet  dans la zone "attente" du héros attaquant
            unset($this->getHeros_adverse()->cartes['combat'][$indexAttaquant]);//On l'enleve de la zone "combat" du héros attaquant
            // test de la fin de vie du heros
            // if ($this->getPv() < 0 ) {
            //FIN DE PARTIE
            //}
        } elseif(substr( $indexCible, 0, 5) ) == 'carte')) {//Si l'index transmis commence par carte
            $indexCible=substr($indexCible,5,2);//on convertit l'index en chiffre
            $this->cartes['combat'][$indexCible]->setPv($this->cartes['combat'][$indexCible]->getPv() - $this->getHeros_adverse()->getCartes()['combat'][$indexAttaquant]>getDegat());//on met à jour les points de vie de la carte ciblée en enlevant les degats de la carte attaquante
            $this->getHeros_adverse()->getCartes()['combat'][$indexAttaquant]->setPv($this->getHeros_adverse()->getCartes()['combat'][$indexAttaquant]->getPv()- $this->cartes['combat'][$indexCible]->getDegat());//on met à jour les points de vie de la carte attaquante en enlevant les degats de la carte ciblée
            $this->testDeLaMortCarte($indexCible);//on teste si la carte ciblee est morte
            $this->getHeros_adverse()->testDeLaMortCarte($indexAttaquant);//on teste si la carte attaquante est morte
            if( isset($this->getHeros_adverse()->getCartes()['combat'][$indexAttaquant])) {//si la carte attaquante n'est pas morte
           $this->getHeros_adverse()->getCartes()['attente'][] = $this->getHeros_adverse()->getCartes()['combat'][$indexAttaquant];//On la remet  dans la zone "attente" du héros attaquant 
            unset($this->getHeros_adverse()->getCartes()['combat'][$indexAttaquant]);////On l'enleve de la zone "combat" du héros attaquant
        }
        }

    }