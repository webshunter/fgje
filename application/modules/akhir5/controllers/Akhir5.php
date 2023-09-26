<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Akhir5 extends MY_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_akhir5');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('LAPORAN PENERBANGAN');
    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins(3, 4, 3);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('simsun', '', '11', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<table align="CENTER" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="62" >DAFTAR PENERBANGAN</th>  
				</tr>
				<tr>
					<th colspan="62" >PER DESEMBER 2014</th>  
				</tr>
							
			 </table>
			 <br><br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="4" rowspan="2"> TERBANG 入境</th>  
					<th colspan="8" rowspan="1"> TKI 外老  </th>	
					<th colspan="5" rowspan="1"> NO.PASSPORT  </th>	
					<th colspan="11" rowspan="1"> 雇主 </th>	
					<th colspan="4" rowspan="1"> AGENT  </th>	
					<th colspan="2" rowspan="2"> GRUP AGENT  </th>	
					<th colspan="8" rowspan="1"> BANK 銀行  </th>	
					<th colspan="8" rowspan="1"> KEADAAN SETELAH TERBANG  </th>			
				</tr>
				<tr> 
					<th colspan="4" rowspan="1"> ID 編號  </th>	
					<th colspan="4" rowspan="1"> NAMA 姓名  </th>	
					<th colspan="5" rowspan="1"> 護照號碼 </th>	
					<th colspan="4" rowspan="1"> NAMA 姓名  </th>		
					<th colspan="4" rowspan="1"> ALAMAT 地址  </th>	
					<th colspan="3" rowspan="1"> TEL 電話  </th>	
					<th colspan="4" rowspan="1"> 中介 </th>	
					<th colspan="4" rowspan="1"> NAMA 姓名 </th>	
					<th colspan="4" rowspan="1"> JENIS CICILAN 貸款 </th>	
					<th colspan="4" rowspan="1"> TGL </th>	
					<th colspan="4" rowspan="1"> KETERANGAN </th>			
				</tr>
				
			 </table>
			
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}