<?php

include("dbscripts/db.php");
include("dbscripts/experts_sql_queries.php");

function html($string) {
  return htmlspecialchars($string, ENT_QUOTES);
}
echo "<form id='form' action='../dbscripts/experts_interest_to_db.php' method='post' enctype='multipart/form-data'>";

echo "<div>";
echo "<label for='givname'>First name *:</label>";
echo "<input type='text' name='givname' required />";
echo "</div>";

echo "<div>";
echo "<label for='famname'>Surname *:</label>";
echo "<input type='text' name='famname' required />";
echo "</div>";

echo "<div>";
echo "<label for='title'>Title:</label>";
echo "<input type='text' name='title' />";
echo "</div>";

echo "<div>";
echo "<label for='org'>Organization *:</label>";
echo "<input type='text' name='org' required />";
echo "</div>";

echo "<div>";
echo "<label for='email'>Email:</label>";
echo "<input type='email' name='email' />";
echo "</div>";

echo "<div>";
echo "<label for='phone'>Phone:</label>";
echo "<input type='text' name='phone' />";
echo "</div>";

$interest_types = mysqli_fetch_all(mysqli_query($db, $get_interest_types_sql), MYSQLI_ASSOC);

echo "<br><b>Please select area of your interest (required):</b><br>";  
  $i_t_arr = array();
  foreach ($interest_types as $i_t) {
    $i_t_arr[$i_t['id']] = $i_t['interest'];
  }
  $i=1;
  foreach ($i_t_arr as $id => $type) {
  	echo "<input type='checkbox' id='interest$i' name='interest$i' value='". $id ."'>";
  	echo "<lable for='". $id ."'><b> $type </b></lable><br>";
  	$i=$i+1;
  }

echo " <br><b>Here you can specify your interest (optional):</b><br>
<textarea rows='4' cols='50' name='interest_text' maxlength='1000'></textarea>";

echo"<br><br><b>Professional and personal links like CVs, past and current activities (It is important that these links are permanent so that they will not disappear and do not need to update)(optional):</b><br>";
  for ($i=1; $i<=3 ; $i++)
  {
     echo "<lable for='link".$i."_text'><b>What is url ".$i.":</b>&nbsp;</lable>";
     echo "<input type='text' id='link".$i."_text' name='link".$i."_text' style='width: 300px;'>";
     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<lable for='link".$i."'><b>Url ".$i.":</b>&nbsp;</lable>";
     echo "<input type='text' id='link".$i."' name='link".$i."' style='width: 300px;'><br><br>";
  }

echo " <br><b>Please write your short bio here (required):</b><br>
<textarea rows='4' cols='50' name='bio_text' maxlength='1000' required></textarea>
";

echo"<br>
      <b>Photo (optional):</b>
      <input type=file name=uploadfile><br><br>

      <p style='color: #FF0000; font-weight: bold;'>
      <input type='checkbox' id='termsChkbx' required />
      I confirm that all data given here correct and can be available and visible publicly at the NordicSnowNet project webpage</p>
      <p>
         <u><a href='https://en.ilmatieteenlaitos.fi/data-protection' target='_blank'>Application of data protection in the Finnish Meteorological Institute</a></u>
      </p>
      <p>
            <input type='submit' name='submit' value=' Submit ' id='sub1'  />
      </p>
";