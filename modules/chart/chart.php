<?php

$module = $Params['Module'];
$parameters=$module->getNamedParameters();
$template=eZTemplate::factory();
$Result=array();

//$file = eZSys::wwwDir().'/'.eZSys::varDirectory();
//$file = $file.'/storage/test_xls.xlsx';

$file = '/Users/kenneth.troye@makingwaves.no/Documents/workspace/wfrp/var/ezflow_site/storage/test_xls.xlsx';


$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($file);


foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
	//echo '- ' . $worksheet->getTitle() . "\r\n";

	foreach ($worksheet->getRowIterator() as $row) {
		//echo '    - Row number: ' . $row->getRowIndex() . "\r\n";

                
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
		foreach ($cellIterator as $cell) {
			if (!is_null($cell)) {
				//echo '        - Cell: ' . $cell->getCoordinate() . ' - ' . $cell->getCalculatedValue() . "\r\n";
                                $subarr[] = $cell->getCalculatedValue();
			}
		}
                $ret[] = $subarr;
                unset ($subarr);
	}
}

$myjson = json_encode($ret);

$template->setVariable('data', $myjson);

//var_dump($myjson);
//die();


$Result['content'] = $template->fetch("design:chart/chart.tpl" );
$Result['path'] = array( array( 'url' => true,
                                'text' => "Chart" ) );


?>