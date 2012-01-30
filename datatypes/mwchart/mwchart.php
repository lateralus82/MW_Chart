<?php


class mwChartObject{
    
    private $type;
    private $title;
    private $file;
    
    public function __construct($file, $title, $type) 
    {
        $this->file = $file;
        $this->title = $title;
        $this->type = $type;
    }
    
    private function getType(){
        return $this->type;
    }
    
    private function getFile(){
        return $this->file;
    }

    private function getTitle(){
        return $this->title;
    }

    
    private function getJSON(){

        //check file extension and switch to correct reader type
        $objReader = PHPExcel_IOFactory::createReaderForFile($this->file->filePath());
        $objPHPExcel = $objReader->load($this->file->filePath());

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                foreach ($worksheet->getRowIterator() as $row) {
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                        foreach ($cellIterator as $cell) {
                                if (!is_null($cell)) {
                                        $subarr[] = $cell->getCalculatedValue();
                                }
                        }
                        $ret[] = $subarr;
                        unset ($subarr);
                }
        }    
        
        return json_encode($ret);
        
    }
    
      function attributes()
    {
        return array('type',
                     'title',
                     'file',
                     'json'
                      );
    }
    
    function hasAttribute( $name )
    {
        return in_array( $name, $this->attributes() );
    }
    
    function attribute( $name )
    {
        switch ( $name )
        {
            case 'file' :
            {
                return $this->getFile();
            } break;

            
            case 'title' :
            {
                return $this->getTitle();
            } break;

            case 'type' :
            {
                return $this->getType();
            } break;
            case 'json' :
            {
                return $this->getJSON();
            } break;
            default:
            {
                eZDebug::writeError( "Attribute '$name' does not exist", "SemanticLinkObj::attribute" );
                return null;
            } break;
        }
    }
    

    

}


?>
