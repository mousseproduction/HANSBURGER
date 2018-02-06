<?php
class IllustrationController {

    /**
     *-----------------------------------------------------
     *  METHODES
     *-----------------------------------------------------
    **/

    /**
     * showAction - Build the database illustration management page
    **/
    public function showAction() {
        if( !isset( $illustrationManager ) ) {
            $illustrationManager = new IllustrationManager;
        }
        $illustrations = $illustrationManager->selectWhere();
        require_once( 'modules/admin/IllustrationFormulaireView.php' );
    }
    
    /**
     * createAction - Create a new illustration in the database, then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function createAction( array $post = [], array $get = [] ) {
        if( !isset( $illustrationManager ) ) {
            $illustrationManager = new IllustrationManager;
        }
        $illustrationManager->insert( $post );
        $this->showAction();
    }
    
    /**
     * updateAction - Delete an illustration in the database, then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function deleteAction( array $post = [], array $get = [] ) {
        if( !isset( $illustrationManager ) ) {
            $illustrationManager = new IllustrationManager;
        }
        $illustrationManager->delete( $post );
        $this->showAction();
    }

    /**
     * updateAction - update an illustration in the database, then show the page
     * 
     * @param   array $post
     *          array $get
    **/
    public function updateAction( array $post = [], array $get = [] ) {
        if( !isset( $illustrationManager ) ) {
            $illustrationManager = new IllustrationManager;
        }
        $illustrationManager->update( $post );
        $this->showAction();
    }
}
            
