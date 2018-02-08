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
        if( !isset( $carteCollectionManager ) ) {
            $carteCollectionManager = new CarteCollectionManager;
        }
        $illustrationManager = new IllustrationManager;
        $illustrationList = $illustrationManager->selectWhere();
        $cartes = $carteCollectionManager->selectWhere();
        $herosCollectionList = $carteCollectionManager->getHerosCollectionList();
        $typeList = $carteCollectionManager->getTypeList();

        include( 'modules/admin/CarteFormulaireView.php');
    }

    /**
     * updateAction - update a card model in database then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function updateAction( array $post = [], array $get = [] ) {
        if( !isset( $carteCollectionManager ) ) {
            $carteCollectionManager = new CarteCollectionManager;
        }
        $carte = new Carte( $post );
        $carteCollectionManager->update( $carte );
        $this->showAction();
    }
    
    /**
     * createAction - create a card model in database then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function createAction( array $post = [], array $get = [] ) {
        if( !isset( $carteCollectionManager ) ) {
            $carteCollectionManager = new CarteCollectionManager;
        }
        $post['illustrationPath'] = 'assets/images/' . $post['nom'] . 'svg';
        $carte = new Carte( $post );
        $carteCollectionManager->insert( $carte );
        $this->showAction();
    }

    /**
     * deleteAction - delete a card model in database then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function deleteAction( array $post = [], array $get = [] ) {
        if( !isset( $carteCollectionManager ) ) {
            $carteCollectionManager = new CarteCollectionManager;
        }
        $carteCollectionManager->delete( 'WHERE `id` = ' . $post['id'] .';' );
        $this->showAction();
    }

}

