<?php if (!defined('SITE_NAME')) die();

/*
 * Please dont change anything here and DONT REMOVE THE CODE COMMENTS.
 * If you want to use these functions read the code commentaries and follow the examples.
*/
require 'PhpSpreadsheet/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Lib_Export{
	function csv($data = array()){
        if ( $data == array() ){
            return;
        }

        if ( !isset($data['filename']) ){
            return;
        }

        $label = implode(';', @$data['label']);
        $csv  = array();

        if ( is_array($data['data']) ){
            foreach( @$data['data'] as $row ){
                $csv[] = implode(';', $row);
            }
            $rows = implode(PHP_EOL, $csv);
        } else {
            $rows = $data['data'];
        }

        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=".strtolower(@$data['filename']).".csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        print $label.PHP_EOL.$rows;
        return;
    }

    function spreadsheet($data = array()){
        if ( count($data) == 0 ){
            return false;
        }

        require_once(dirname(__FILE__).'/PhpSpreadsheet/autoload.php');

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach ( $data['label'] as $key => $label ) {
            $sheet->setCellValueByColumnAndRow($key + 1, 1, $data['label'][$key]);
        }

        foreach ( $data['data'] as $keyRow => $row ){
            $background = false;
            if ( isset($row['background']) ){
                $background = $row['background'];
            }

            foreach ( $data['label'] as $keyLabel => $labelColumn ){
                $sheet->setCellValueByColumnAndRow($keyLabel+1, $keyRow+2, $row[$keyLabel]);
                if ( $background != false ){
                    $sheet->getStyleByColumnAndRow($keyLabel+1, $keyRow+2)
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB($background);
                }
            }
        }

        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $data['filename'].'.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $writer->save('php://output');
        die();
    }
}