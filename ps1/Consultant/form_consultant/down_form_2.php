<?php include '../connect.php';

$cnslt_id = $_SESSION['cnslt_id'];

require_once __DIR__ . '../../../mPDF/vendor/autoload.php';

$sql = "select * from cnslt_bnk where cnslt_id = $cnslt_id";

if($result = mysqli_query($conn, $sql))
	if(mysqli_num_rows($result) > 0)
		$row = mysqli_fetch_array($result);

$row_f = array();
$row_a = array();
$row_p = array();

$sql = "select * from f_exp where cnslt_id = $cnslt_id";

if($result = mysqli_query($conn, $sql))
	if(mysqli_num_rows($result) > 0)
	{
		$i = 0;
		while ($row_t = mysqli_fetch_array($result))
		{
			$row_f[$i] = $row_t;
			$i++;
		}
	}

$sql = "select * from prof_q where cnslt_id = $cnslt_id";

if($result = mysqli_query($conn, $sql))
	if(mysqli_num_rows($result) > 0)
	{
		$i = 0;
		while ($row_t = mysqli_fetch_array($result))
		{
			$row_p[$i] = $row_t;
			$i++;
		}
	}

$sql = "select * from sp_assgn where cnslt_id = $cnslt_id";

if($result = mysqli_query($conn, $sql))
	if(mysqli_num_rows($result) > 0)
	{
		$i = 0;
		while ($row_t = mysqli_fetch_array($result))
		{
			$row_a[$i] = $row_t;
			$i++;
		}
	}


$mpdf = new mPDF('A4-L');
include 'form_2.php';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>