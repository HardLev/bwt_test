<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML>
	<HEAD>
	<meta charset="utf-860">
	<title> Новини </title>
	<link href="\css\style.css" rel="stylesheet" type="text/css"/>
	</HEAD>
<BODY>
 <table cellpadding="0" cellspacing="0" width="860" align="center">
   <tr>
     <td colspan="3" class="header">  </td>
   </tr>
   <tr>
     <td class="left_col">
       <?php
	     include("menu1.php")
		?> 
     </td>
	 <td class="center_col">
	 <div class="center_col">
        <?php
$id=mysql_connect('localhost','root') or die ("Неможливо підключитись до серверу");
mysql_select_db('daidb') or die("БД не вибрана");
mysql_query("SET NAMES 'cp1251_general_c';");
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");  
$result=mysql_query("SELECT DATE_FORMAT(date, '%d.%m.%Y'), id, name, img FROM news ORDER BY date DESC");
	while($row = mysql_fetch_row($result)) {
	echo "<div class='center_col'>";
	echo "<div class='Center_col'>";
	echo "<p>";
	echo "$row[0]";
	echo "</p>";
	echo "</div>";
	echo "<div class='image'>";
	echo '<a href = "\news.php?id='.$row['1'].'">'; echo "<img src='$row[3]'>";      echo '</a>';
	echo "</div>";
	echo "<div class='name'>";
	echo "<p>";
	echo '<a href = "\news.php?id='.$row['1'].'">'.$row['2'].'</a>';
	echo "</p>";
	echo "</div>";
	echo "</div>";
	}
    mysql_close($id);
       ?>	
	  </td>
	  </div>
    </tr>
    <tr>
      <td colspan="3" class="footer"> © ТЦ 2015 </td>
   </table>
  </BODY>
</HTML>