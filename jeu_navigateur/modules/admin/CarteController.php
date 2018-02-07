<?php
class CarteController {
    /**
     *-----------------------------------------------------
     *  METHODES
     *-----------------------------------------------------
    **/

    /**
     * showAction - Build the database card management page 
     * 
     * @param   array $post
     *          array $get
    **/
    public function showAction( array $post = [], array $get = [] ) {
        if( !isset( $carteModeleManager ) ) {
            $carteModeleManager = new CarteModeleManager;
        }
        $illustrationManager = new IllustrationManager;
        $illustrationList = $illustrationManager->selectWhere();
        $cartes = $carteModeleManager->selectWhere();
        $herosModeleList = $carteModeleManager->getHerosModeleList();
        $typeList = $carteModeleManager->getTypeList();

        include( 'modules/admin/CarteFormulaireView.php');
    }

    /**
     * updateAction - update a card model in database then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function updateAction( array $post = [], array $get = [] ) {
        if( !isset( $carteModeleManager ) ) {
            $carteModeleManager = new CarteModeleManager;
        }
        $carte = new Carte( $post );
        $carteModeleManager->update( $carte );
        $this->showAction();
    }
    
    /**
     * createAction - create a card model in database then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function createAction( array $post = [], array $get = [] ) {
        if( !isset( $carteModeleManager ) ) {
            $carteModeleManager = new CarteModeleManager;
        }
        $carte = new Carte( $post );
        $carteModeleManager->insert( $carte );
        $this->showAction();
    }

    /**
     * deleteAction - delete a card model in database then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function deleteAction( array $post = [], array $get = [] ) {
        if( !isset( $carteModeleManager ) ) {
            $carteModeleManager = new CarteModeleManager;
        }
        $carteModeleManager->delete( 'WHERE `id` = ' . $post['id'] .';' );
        $this->showAction();
    }

}

