<!DOCTYPE>

<html>
	<head>
    <style >h2 {text-align: center;}</style>
		<title>PHP FILE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
<?php
$Temp=$_POST["keywords"];
$Keywords = explode(" ", $Temp);
$j = count($Keywords);
 

if(isset($Keywords[0])&&!empty($Keywords[0]))
 {

?>

   <caption><h2>Result</h2></caption>
   <table class="table table-hover">
    
    <tr>
      <th>Id</th>      
      <th>Title</th>     
      <th>Blurb</th>     
      <th>Url</th>
      <th>Keywords</th>         

    </tr>



<?php 




$Connection=mysqli_connect('localhost','root','');
$Selected= mysqli_select_db($Connection,'query_string');


  unset($ViewQuery);
 unset($Execute);
 unset($DataRows);

  $Variable =  $Keywords[0];

$ViewQuery="SELECT * 
            FROM search_engine
            Where keywords LIKE '%{$Variable}%' " ;

$Execute=$Connection->query($ViewQuery);



if (mysqli_fetch_array($Execute)) {




$ViewQuery1="SELECT * 
            FROM search_engine
            Where keywords LIKE '%{$Variable}%' " ;

$Execute1=$Connection->query($ViewQuery1);


while($DataRows=mysqli_fetch_array($Execute1)){
  $Id=$DataRows['id'];
  $Title=$DataRows['title'];
  $Blurb=$DataRows['blurb'];
  $Url=$DataRows['url'];
  $Keywords=$DataRows['keywords'];

 ?>
 <tr>
<td><?php echo $Id ;?></td>
<td><?php echo $Title; ?></td>
<td><?php echo $Blurb; ?></td>
<td><?php echo $Url; ?></td>
<td><?php echo $Keywords; ?></td>

<?php  
 
 ?>



</tr>



<?php }
}
else
{
  $Keywords_array = array('bing','youtube','google');
  $k =  count($Keywords_array) ;
  $i = 0;
  $Keywords1 =  $Keywords[0];

  while ($i<$k) {
     $string1 = $Keywords_array[$i]; 
     $string2 = $Keywords[0] ;
 similar_text( $string1, $string2, $percent);
  if ($percent>40) {
    $Keywords1 = $string1;
  

  
  }
  $i = $i + 1;
  
  }


 $Variable =  $Keywords1;

$ViewQuery1="SELECT * 
            FROM search_engine
            Where keywords LIKE '%{$Variable}%' " ;

$Execute1=$Connection->query($ViewQuery1);


while($DataRows=mysqli_fetch_array($Execute1)){
  $Id=$DataRows['id'];
  $Title=$DataRows['title'];
  $Blurb=$DataRows['blurb'];
  $Url=$DataRows['url'];
  $Keywords=$DataRows['keywords'];
?>
 <tr>
<td><?php echo $Id ;?></td>
<td><?php echo $Title; ?></td>
<td><?php echo $Blurb; ?></td>
<td><?php echo $Url; ?></td>
<td><?php echo $Keywords; ?></td>



</tr>



<?php }
}



?>






  </table>


  
<?php
 }
 ?>


	    
</body>
</html>
