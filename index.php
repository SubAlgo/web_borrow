<?php 
include("config.php");
?>

 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ระบบยืม-คืนอุปกรณ์</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script language="JavaScript" type="text/JavaScript">
function popup(url,name,windowWidth,windowHeight){
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=no, top="+mytop+",left="+myleft;
	window.open(url,name,properties);
}
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<link type="text/css" href="jquery/css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="jquery/css/redmond/jquery.ui.theme.css">
 <script src="js/jquery-1.4.1.min.js"></script>

<script type="text/javascript" src="jquery/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="jquery-image-resize/src/jquery.ae.image.resize.js"></script>

<script type="text/javascript">
$(function(){
	// แทรกโค้ต jquery
   $("#date_start").datepicker({ dateFormat: 'yy-mm-dd'	,changeMonth: true,
      changeYear: true });
	$("#date_end").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
      changeYear: true,
	  numberOfMonths: 2,
      showButtonPanel: true });
 $("#date_select").datepicker({ dateFormat: 'yy-mm-dd'	,changeMonth: true,
      changeYear: true });	// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16สามารถกำหนด เป็น
	//$("#date_start").datepicker({minDate: 0});
	// $("#date_end").datepicker({minDate: 0});
$("#date_select_end").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
      changeYear: true,
	  numberOfMonths: 2,
      showButtonPanel: true });
});


   function IsNumeric(sText,obj)
{
	var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;
   for (i = 0; i < sText.length && IsNumber == true; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) == -1)
         {
         IsNumber = false;
         }
      }
   		if(IsNumber==false){
			alert("ระบุตัวเลขเท่านั้น");
			obj.value=sText.substr(0,sText.length-1);
		}
   }

     $(function() {
      $( ".resize" ).aeImageResize({ height: 70, width: 70 });
    });

function chk_form(){
	$(":input + span.require").remove();
	$(":input").each(function(){
		$(this).each(function(){
			if($(this).val()==""){
				$(this).after("<span class=require>? จำเป็นต้องระบุ</span>");
			}
		});
	});
	if($(":input").next().is(".require")==false){
		return true;
	}else{
		return false;
	}
}
</script>
<style type="text/css">

.ui-datepicker{
	width:210px;
	font-family:tahoma;
	font-size:13px;
	text-align:center;
}
div.bigGallPic{
    position:fixed;
    margin:auto;
    top:10px;
    left:150px;
    padding:3px;
    text-align:center;
    background-color:#FFFFFF;
    border:2px solid #E9A01B;
    display:none;
    cursor:pointer;
}


body {
	/* background-color: #FEF5ED; */
}
div.img-resize img {
	width: 150px;
	height: auto;
}

div.img-resize {
	width: 150px;
	height: 200px;
	overflow: hidden;
	text-align: center;
}
</style>


</head>

<body>
<table width="1024" align="center" bgcolor="#C8E6E4" class="form_caja3">
  <tr>
    <td><div align="center">
    <table width="1024"  border="0" align="center">
  <tr>
    <td><div align="center"><img src="images/top.jpg" width="1024" height="300" /></div></td>
  </tr>
</table>

<table width="1024"  border="0" align="center">
  <tr>
    <td><div align="center">
        <div class="menu">
          <ul>
            <li><a title="หน้าแรก" href="index.php?page=home">หน้าแรก</a></li>
             <li><a title="รายการอุปกรณ์" href="index.php?page=device_report">รายการอุปกรณ์</a></li>
            <li><a title="เข้าสู่ระบบเพื่อจัดการข้อมูล" href="index.php?page=login">เข้าสู่ระบบ</a></li>
          </ul>
        </div>
      </div></td>
  </tr>
</table>
<table width="1024" border="0" align="center">

  <tr>
    <td height="46" valign="top">

	    <!-- Container -->


<div align="center">
<form action="" method="get" name="form2">
            <div align="center">ค้นหารายการ ระหว่างวันที่
              <input name="date_start" type="text" id="date_start" value="" size="10" />
&nbsp;ถึงวันที่ &nbsp;
  <input name="date_end" type="text" id="date_end" value="" size="10" />
  <input name="submit" type="submit" value="ค้นหา" />
  <input name="page" type="hidden" id="page" value="home">
            </div>
</form>
จำนวนทั้งหมด 0 รายการ    <table width="90%" border="0" align="center" cellpadding="1" cellspacing="1" class="form_caja">
  <tr bgcolor="#FDE365">

      <td width="37" bgcolor="#FDE365"><div align="center">ลำดับ</div></td>
      <td width="420" bgcolor="#FDE365"><div align="center">ชื่ออุปกรณ์</div></td>
      <td width="334" bgcolor="#FDE365"><div align="center">ผู้ยืม</div></td>
      <td width="122" bgcolor="#FDE365"><div align="center">วันที่ยืม</div></td>
      <td width="126" bgcolor="#FDE365"><div align="center">วันที่คืน</div></td>
      <td width="11%" bgcolor="#FDE365"><div align="center">status</div></td>
     </tr>
    </table>

</div></td>
  </tr>
  <tr>
    <td><div align="center">

	<!-- Footer -->

	</div></td>
  </tr>
</table></div></td></tr></table>
<table width="1024"  border="0" align="center" class="form_caja2">
  <tr>
    <td height="111"><div align="center"><strong>
     Copyright &copy; 2017 กมลชนก สังข์ไขย์ All Rights Reserved. <br>

    </strong></div></td>
  </tr>
</table>

</body>
</html>
