<?php
	session_start();
	include "fpdf/fpdf.php";
	include "koneksi.php";
	
	class PDF extends FPDF{
		function Title($title){
			//Select Arial Bold 15
			$this->SetFont('Arial','B',15);
			//Move to the right
			$this->Cell(80);
			//Framed Title
			$this->Cell(30,10,$title,0,0,'C');
			//Line break
			$this->Ln(20);
		}
		
		function FancyTable($header,$data){
			//Header
			//Colors, Line width and Bold Font
			$this->SetFillColor(13,13,13); //hijau
			$this->SetTextColor(255);
			$this->SetLineWidth(.3);
			$this->SetFont('Arial','B',6);
			$w=array(5,50,30,30,20,20,20);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			//Body
			//Color and Font Restoration
			$this->SetFillColor(163,163,152);
			$this->SetTextColor(0);
			$this->SetFont('Arial','',6);
			//Data
			$fill=false;
			for($i=0;$i<count($data);$i++){
				for($j=0;$j<count($data[$i]);$j++){
					$this->Cell($w[$j],6,$data[$i][$j],'LR',0,'L',$fill);
				}
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(array_sum($w),0,'','T');
		}
	}
		
		if(isset($_SESSION["username"])){
			//membuat object
			$pdf = new PDF();
			
			$header=array('No','Nama Perusahaan','Jenis Contoh','Alamat','Tanggal Masuk','Tanggal Selesai','Standar Pelayanan');
			$data=array();
			
			$tgl_masuk1=1;
			$tgl_selesai1=31;
				$kata1 = $_POST["nama_perusahaan"];
				$kata2 = $_POST["nama_database"];
				$kata3=$_POST["tahun_masuk"].'-'.$_POST['bln_masuk'].'-'.$tgl_masuk1;
				$kata4=$_POST["tahun_selesai"].'-'.$_POST['bln_selesai'].'-'.$tgl_selesai1;
			$i=0;
			$num=1;
			$query=mysql_query("SELECT * FROM daftar_permohonan WHERE  nama_perusahaan LIKE '%".$kata1."%' and nama_database LIKE '%".$kata2."%' and tgl_masuk >= '$kata3' and tgl_masuk <= '$kata4' ") or die (mysql_error());
			while($fetch = mysql_fetch_array($query)){
				$data[$i][0]=$num;
				$data[$i][1]=$fetch["nama_perusahaan"];
				$data[$i][2]=$fetch["jenis_contoh"];
				$data[$i][3]=$fetch["alamat"];
				$data[$i][4]=$fetch["tgl_masuk"];
				$data[$i][5]=$fetch["tgl_selesai"];
				$data[$i][6]=$fetch["std_pelayanan"];
				$i++;
				$num++;
			}
			
			$pdf->SetFont('Arial','',10);
			$pdf->AddPage();
			$pdf->SetMargins(18,30);
			$pdf->Title("Data Daftar Permohonan Pengujian Udara");
			$pdf->FancyTable($header,$data);
			$pdf->Output("Data Daftar Permohonan Pengujian Udara","I");
		}
		else{
			?>
				<script language="javascript">
					alert("Anda Belum Login !");
					document.location.href="login.php";
				</script>
			<?php
		}
?>
				