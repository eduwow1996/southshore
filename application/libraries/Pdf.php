<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{

	public function __construct(){
		parent::__construct();
	}

    public function render_pdf($html,$name,$download = false,$paper = 'A4',$orientation = 'portrait'){
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper,$orientation);
        $dompdf->render();
        $pdf = $dompdf->output();
		if($download){
			$dompdf->stream($name.'.pdf', array("Attachment"=>1));
		} else {
			$dompdf->stream($name.'.pdf', array("Attachment"=>0));
		}
    }
}

?>
