<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf15 extends MY_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf15');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(5, 30, 5);
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
    $pdf->SetFont('times', '', '11', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '
			 <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">/BMB - RKM /I/2015  </th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="16">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Perihal</th> 
					<th colspan="3">:</th> 
					<th colspan="16">Permohonan Pembuatan Perjanjian Penempatan </th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="16">Yth. Kepala Dinas Tenaga Kerja Jl. Imam Bonjol</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="16">No. 07 Kab.Blitar</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="16">Di</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="16">Tempat</th> 
				</tr>
											
			 </table><br><br>
			 <table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Dengan ini kami mengajukan permohonan kepada Bapak untuk diterbitkan </th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > permohonan Perjanjian Penempatan Calon TKI sebanyak 1 orang (satu) orang untuk Negara tujuan:</th> 
				</tr>	
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Hongkong</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" > </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Malaysia</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" > </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Singapura</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" > </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Taiwan</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" > </th> 
					<th colspan="8" > orang</th> 
				</tr>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" ></th> 
					<th colspan="2" ></th>
					<th colspan="8" >----------------------------</th> 
					<th colspan="8" > </th> 
				</tr>			
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th align="right" colspan="10" >JUMLAH</th> 
					<th colspan="2" >:</th>
					<th colspan="8" > </th> 
					<th colspan="8" > orang</th> 
				</tr>				
				<br>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" >Daftar nominasi terlampir.</th>
				</tr>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" >Demikian atas bantuan Bapak, kami sampaikan terima kasih</th>
				</tr>							
			 </table>
			 <br><br><br><br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="14"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="16">      Kediri, 12 Januari 2015</th> 
				</tr><br><br><br><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th align="center" colspan="10"> Anik Winarsih Direktur Utama </th> 
				</tr>
				
											
			 </table><br><br>
			 
			
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}