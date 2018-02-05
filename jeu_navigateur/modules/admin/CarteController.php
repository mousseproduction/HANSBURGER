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
    **/
    public function showAction() {
        $carteModelManager = new CarteModeleManager;
        $cartes = $carteModelManager->selectWhere();
        $illustrationList = $carteModelManager->getIllustrationList();
        $herosModeleList = $carteModelManager->getHerosModeleList();
        $typeList = $carteModelManager->getTypeList();

        include( 'modules/admin/CarteFormulaireView.php');
    }
}

