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
     * generateCsv - generate the csv file for carteCollection
     * 
    **/
    public function generateCsv( $post ) {
        $carteManager = new CarteCollectionManager;
        $cartes = $carteManager->selectWhere();
        $csv[0]= [ 'nom', 'pv', 'degat', 'prix', 'type', '@illustration', 'description', '@bordure', '@pictovie', '@pictoprix', '@pictodegat' ];
        $cpt = 1;
        foreach( $cartes as $key => $carte ) {
            $carte->setIllustrationPath( '@' . $post['path'] . str_replace( ' ', '_', strtolower($carte->getNom() ) ) . '.psd' );
            $csv[$cpt] = array_merge( $carte->getAttributeTable( [ 'nom', 'pv', 'degat', 'prix', 'typeNom', 'illustrationPath', 'description' ] ), $post );
            if( $carte->getTypeNom() == 'sort' ) {
                $csv[$cpt]['pictovie'] = '';
            }
            $cpt ++;
        }
        return $csv;
        
    }
    
    
}
