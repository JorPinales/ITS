<?php
    //verificar usuario valido
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
        echo "Debe autentificarse";
        exit();
    }

    //agregar codigo común
    include_once './fpdf/class.ezpdf.php';
    include_once './fpdf/fpdf.php';    

    //clase para construir el documento PDF      
    class PDF extends FPDF
    {
        //carga datos desde la bd al arreglo data
        function LoadData(){    	
            include '../bd/conexion.php';
            //$strQry   = "SELECT * FROM especialidad ORDER BY nombre";  
            $strQry = $_SESSION['strQry'];       
            $tablaBD  = mysqli_query($link, $strQry);

            while ($registro = mysqli_fetch_array($tablaBD)) {
                $data[] = array($registro['clave'],$registro['nombre'],$registro['instructor'],$registro['hora'],$registro['dias'],$registro['lugar']);                 
            } 
			return $data;                                                                              
    	}

        function Header(){           
            // Logos
            //image(file,x.y,w,h)
            $this->Image('../img/tecnm.png',25 ,5, 40,22);  
            $this->Image('../img/coahuila.png',137 ,5, 30,22);  
            $this->Image('../img/its.png',160 ,5, 22,22); 
           
            //SetFont(family,style,size)                                  
            $this->SetFont('Arial','B',10);                        
            
            // Titulo
            //Cell(X width, Y width, text, border, current position, align,fill,link)
            $this->Cell(0,60,'REPORTE DE CURSOS',0,0,'C');                                    
        }

        function Footer(){            
            // Position at 1.5 cm from bottom
            //SetY move to current abscissa
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','',6);
            // Page number            
            $this->Cell(0,6,'Pagina '.$this->PageNo()."/{nb}",0,0,'C');            
        }

        function FancyTable($header, $data){    
            //cuerpo del reporte
            //define absissa (x) and ordinate (y)
            $this->SetXY(5,50);
            $this->SetFont('Arial','B',10);
                                                           
            
            // Header
            $this->SetFillColor(230,230,230);
            $w = array(17, 44,44,25, 44, 25);
            for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
            $this->Ln();           
            // Color and font restoration
            //setFillColor(fill collor operation)
            
            //SetTextColor define color text
            $this->SetTextColor(0);
            $this->SetFont('');
            $fill = false;             
            
            $noLinea    = 1;            
            $c          = 1;
            //data
            $this->SetXY(5,56);

            foreach($data as $row)
            {                   
                $this->Cell($w[0],4,$row[0],1,0,'C',false);
                $this->Cell($w[1],4,$row[1],1,0,'C',false);
                $this->Cell($w[2],4,$row[2],1,0,'C',false);
                $this->Cell($w[3],4,$row[3],1,0,'C',false);  
                $this->Cell($w[4],4,$row[4],1,0,'C',false);
                $this->Cell($w[5],4,$row[5],1,0,'C',false);                                                                
                $this->Ln(4);
                $this->SetX(5);
                
                $fill = !$fill;                
                
                    if ($c>=37){                        
                        $this->setAutoPagebreak(true,'40'); 
                        $this->Cell(array_sum($w),0,'','T');
                        
                        // Header
                        $this->SetXY(50,50);
                        $w = array(10, 80);
                        for($i=0;$i<count($header);$i++)
                            $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
                        $this->Ln();
                        $c = 1;
                    }
            }   
        }


	}

$pdf = new PDF(); 
$data = $pdf->LoadData();
$pdf->AddPage();
$pdf->SetTitle('REPORTE CURSOS');
// Column headings
$header  = array('Clave','Nombre','instructor','Hora','Dias','Lugar');    
$pdf->AliasNbPages();
$pdf->FancyTable($header,$data);
$pdf->SetAutoPageBreak(true,20);
$pdf->Output();  
?>