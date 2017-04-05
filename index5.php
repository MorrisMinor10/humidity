<?php // content="text/plain; charset=utf-8"


$servername = "localhost";
$username = "X";
$password = "X";
$dbname = "temperature";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$link = mysql_connect("localhost", "X", "X");
if (!$link) {
    die("Could not connect: " . mysql_error());
}
if (!mysql_select_db("temperature")) {
    die("Could not select database: " . mysql_error());
}
//$result = mysql_query("SELECT max(klokken), temperatur, fugtighed FROM temperature_tabel WHERE 1");


$result = mysql_query("SELECT DATE_FORMAT(klokken, '%H'),temperatur FROM temperature_tabel_hour_agg order by klokken DESC LIMIT 24");

//$result = mysql_query("SELECT DATE_FORMAT(klokken, '%H'),temperatur FROM temperature_tabel_hour_agg WHERE DATE_FORMAT(klokken, '%Y-%m-%d') = DATE_FORMAT('17-04-05', '%Y-%m-%d')");

if (!$result) {
    die("Could not query: " . mysql_error());
}

$var23_0 = mysql_result($result, 23);
$var23_1 = mysql_result($result, 23, 1);
$var22_0 = mysql_result($result, 22);
$var22_1 = mysql_result($result, 22, 1);
$var21_0 = mysql_result($result, 21);
$var21_1 = mysql_result($result, 21, 1);
$var20_0 = mysql_result($result, 20);
$var20_1 = mysql_result($result, 20, 1);
$var19_0 = mysql_result($result, 19);
$var19_1 = mysql_result($result, 19, 1);
$var18_0 = mysql_result($result, 18);
$var18_1 = mysql_result($result, 18, 1);
$var17_0 = mysql_result($result, 17);
$var17_1 = mysql_result($result, 17, 1);
$var16_0 = mysql_result($result, 16);
$var16_1 = mysql_result($result, 16, 1);
$var15_0 = mysql_result($result, 15);
$var15_1 = mysql_result($result, 15, 1);
$var14_0 = mysql_result($result, 14);
$var14_1 = mysql_result($result, 14, 1);
$var13_0 = mysql_result($result, 13);
$var13_1 = mysql_result($result, 13, 1);
$var12_0 = mysql_result($result, 12);
$var12_1 = mysql_result($result, 12, 1);
$var11_0 = mysql_result($result, 11);
$var11_1 = mysql_result($result, 11, 1);
$var10_0 = mysql_result($result, 10);
$var10_1 = mysql_result($result, 10, 1);
$var9_0 = mysql_result($result, 9);
$var9_1 = mysql_result($result, 9, 1);
$var8_0 = mysql_result($result, 8);
$var8_1 = mysql_result($result, 8, 1);
$var7_0 = mysql_result($result, 7);
$var7_1 = mysql_result($result, 7, 1);
$var6_0 = mysql_result($result, 6);
$var6_1 = mysql_result($result, 6, 1);
$var5_0 = mysql_result($result, 5);
$var5_1 = mysql_result($result, 5, 1);
$var4_0 = mysql_result($result, 4);
$var4_1 = mysql_result($result, 4, 1);
$var3_0 = mysql_result($result, 3);
$var3_1 = mysql_result($result, 3, 1);
$var2_0 = mysql_result($result, 2);
$var2_1 = mysql_result($result, 2, 1);
$var1_0 = mysql_result($result, 1);
$var1_1 = mysql_result($result, 1, 1);
$var0_0 = mysql_result($result, 0);
$var0_1 = mysql_result($result, 0, 1);



//echo "klokken: ".$var0_0. " - Temperatur: ".$var0_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var1_0. " - Temperatur: ".$var1_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var2_0. " - Temperatur: ".$var2_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var3_0. " - Temperatur: ".$var3_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var4_0. " - Temperatur: ".$var4_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var5_0. " - Temperatur: ".$var5_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var6_0. " - Temperatur: ".$var6_1. "<br />"; // "\n" $var0_1;
//echo "klokken: ".$var7_0. " - Temperatur: ".$var7_1. "<br />"; // "\n" $var0_1;

mysql_close($link);


require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

//$datay1 = array($var0_1,$var1_1);
$datay1 = array($var23_1,
        $var22_1,
        $var21_1,
        $var20_1,
        $var19_1,
        $var18_1,
        $var17_1,
        $var16_1,
        $var15_1,
        $var14_1,
        $var13_1,
        $var12_1,
        $var11_1,
        $var10_1,
        $var9_1,
        $var8_1,
        $var7_1,
        $var6_1,
        $var5_1,
        $var4_1,
        $var3_1,
        $var2_1,
        $var1_1,
        $var0_1);
//$datay2 = array(12,9,42,8);
//$datay3 = array(5,17,32,24);

// Setup the graph
$graph = new Graph(500,450);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Temperatur/Luftfugtighed');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
//$graph->xaxis->SetTickLabels(array($var0_0,$var1_0));
$graph->xaxis->SetTickLabels(array($var23_0,
        $var22_0,
        $var21_0,
        $var20_0,
        $var19_0,
        $var18_0,
        $var17_0,
        $var16_0,
        $var15_0,
        $var14_0,
        $var13_0,
        $var12_0,
        $var11_0,
        $var10_0,
        $var9_0,
        $var8_0,
        $var7_0,
        $var6_0,
        $var5_0,
        $var4_0,
        $var3_0,
        $var2_0,
        $var1_0,
        $var0_0));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1');

// Create the second line
//$p2 = new LinePlot($datay2);
//$graph->Add($p2);
//$p2->SetColor("#B22222");
//$p2->SetLegend('Line 2');

// Create the third line
//$p3 = new LinePlot($datay3);
//$graph->Add($p3);
//$p3->SetColor("#FF1493");
//$p3->SetLegend('Line 3');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>
