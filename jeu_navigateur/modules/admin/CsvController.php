<?php
class CsvController {

    /**
     *-----------------------------------------------------
     *  METHODES
     *-----------------------------------------------------
    **/

    /**
     * showAction - Build the database illustration management page
    **/
    public function showAction() {
        require_once( 'modules/admin/CsvFormulaireView.php' );
    }

    /**
     * exportAction - generate a csv file and send it via download
     * 
    **/
    public function exportAction( $post, $get ) {
        $csv = $this->generateCsv( $post );
        $f = fopen( 'download/coucou.csv', 'w' );
        foreach( $csv as $key => $line ) {
            fputcsv( $f, $line );
        }
        fclose( $f );
        header( 'Location: download/coucou.csv' );
    }

    /**
     * generateCsv - generate the csv file for carteModele
     * 
    **/
    public function generateCsv( $post ) {
        $carteManager = new CarteModeleManager;
        $cartes = $carteManager->selectWhere();
        $csv = [];
        $cpt = 0;
        foreach( $cartes as $key => $carte ) {
            $carte->setIllustrationPath( '@' . $carte->getIllustrationPath() );
            $csv[$cpt] = array_merge( $carte->getAttributeTable(), $post );
            if( $carte->getTypeId() == 3 ) {
                $csv[$cpt]['pictovie'] = '';
            }
            $cpt ++;
        }
        return $csv;
        
    }
    
    
}
