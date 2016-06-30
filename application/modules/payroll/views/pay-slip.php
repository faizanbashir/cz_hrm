<html>
<HEAD>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<TITLE>Pay Slip</TITLE>
<STYLE>
   H2{page-break-before: always}
</STYLE>
<STYLE>
	.f10	{font-size:9; font-family: Arial;}
	.f8	{font-size:9; font-family: Arial;}
	.bc	{font-size:9; font-family: Arial;background-color : #a9a098; nowrap="true"}
	th	{font-family: Arial}
	.F11Bold	{font-size:11; font-family: Arial;font-weight: bold;}
	.F11Normal	{font-size:11; font-family: Arial;}
	.F11BoldAL	{font-size:11; font-family: Arial;font-weight: bold; ALIGN:LEFT}
	.F11NormalAL	{font-size:11; font-family: Arial; ALIGN:LEFT}
	.F11BoldAR	{font-size:11; font-family: Arial;font-weight: bold; ALIGN:RIGHT}
	.F11NormalAR	{font-size:11; font-family: Arial; ALIGN:RIGHT}
	.F11NormalBTBNone   {font-size:11; font-family: Arial;BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;}
</STYLE>
</HEAD>
<body> 

 <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 align=center width=90% style="border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;border-bottom: 1px solid;">
 <TR>
 <TD  WIDTH=70%>
		 <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 align=center width=100%>
		 <TR>
			<TD ALIGN=LEFT><IMG SRC="http://insights.website/insight-sign/images/insights-logo.png"></TD>
		 </TR>
			 </TABLE>
			 </TD>
		 <TD>
		 <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 align=center width=100%>
		 <TR>
			<TD ALIGN=LEFT nowrap style="font-size:12; font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Insights Marketing & Communication,</b></TD>
		 </TR>
		 <TR>
			<TD ALIGN=LEFT  nowrap style="font-size:12; font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>UAE, Dubai</b></TD>
		 </TR>
		 <TR>
			 <TD ALIGN=LEFT  nowrap style="font-size:12; font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Payslip for the month of <?php echo $date; ?></b></TD>
		 </TR>
		 </TABLE>
	 </TD>
 </TR>
 </TABLE>

 <BR> 

<TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 align=center width=90% style="border-collapse: collapse">
 <TR>
<TD>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 align=center width=100%>
 <TR>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style ="font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;Emp. No</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style ="font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style="font-size:11; font-family: Arial;"><?php echo $employee_id; ?>&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style ="font-weight: bold; font-size:11; font-family: Arial;" nowrap>&nbsp;&nbsp;Dt.of Joining</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $employee['doj']; ?>&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style ="font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;<B>Bank Name.</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style ="font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $salary['bank_name']; ?>&nbsp</TD>
 </TR>
 <TR>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;Name</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $employee['first_name']." ".$employee['last_name']; ?>&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;Designation</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $employee['designation']; ?>&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;" nowrap>&nbsp;&nbsp;Bank Ac/no</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $salary['bank_ac_no']; ?>&nbsp</TD>
 </TR>
 <TR>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;" nowrap >&nbsp;&nbsp;Standard days</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $std_working_days;?>&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;Department</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $employee['department']; ?>&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;PF No.</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $salary['pf_no']; ?>&nbsp</TD>
 </TR>
 <TR>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;Days worked</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;">31.00&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;Location</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;">Jammu & Kashmir&nbsp</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 11% style = "font-weight: bold; font-size:11; font-family: Arial;">&nbsp;&nbsp;UAN Number</TD>
 <TD align=Center HEIGHT=10px WIDTH = 2% style = "font-size:11; font-family: Arial;">:</TD>
 <TD ALIGN=LEFT HEIGHT=10px WIDTH = 20% style = "font-size:11; font-family: Arial;"><?php echo $salary['uan_no']; ?>&nbsp</TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 </TABLE>
 <BR>

<TABLE BORDER = 0 CELLPADDING=0 CELLSPACING=0 align=center width=90% style="border-collapse: collapse">
 <tr>
 	<td WIDTH=65% VALIGN=TOP  style="BORDER-TOP-STYLE: none;">
 		<table BORDER=1 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=100% VALIGN=TOP style="BORDER-RIGHT-STYLE: none; BORDER-COLLAPSE: collapse">
 			<tr>
 				<td ALIGN=LEFT  CLASS="F11Bold" VALIGN=BOTTOM HEIGHT=10px WIDTH = 40% style="BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none;">&nbsp;&nbsp;<u>Particulars</u></td>
 				<td ALIGN=RIGHT CLASS="F11Bold" VALIGN=BOTTOM HEIGHT=10px WIDTH = 15% style="BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;">&nbsp;&nbsp;<u>Monthly Rate</u></td>
 				<td ALIGN=RIGHT CLASS="F11Bold" VALIGN=BOTTOM HEIGHT=10px  WIDTH = 15%  style="BORDER-TOP-STYLE: none;">&nbsp;&nbsp;<u>Earnings</u></td>
 			</tr>
 			<tr>
 				<td ALIGN=LEFT  HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 40% style="BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;Basic Salary&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15% style="BORDER-LEFT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['basic_salary']; ?>&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15%>&nbsp;&nbsp;<?php echo $salary['basic_salary']; ?>&nbsp</td>
 			</tr>
 			<tr>
 				<td ALIGN=LEFT  HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 40% style="BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;House rent allowance(HRA)&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15% style="BORDER-LEFT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['hra']; ?>&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15%>&nbsp;&nbsp;<?php echo $earnings['hra']; ?>&nbsp</td>
 			</tr>
 			<tr>
 				<td ALIGN=LEFT  HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 40% style="BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;Dearness allowance(DA)&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15% style="BORDER-LEFT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['da']; ?>&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15%>&nbsp;&nbsp;<?php echo $earnings['da']; ?>&nbsp</td>
 			</tr>
 			<tr>
 				<td ALIGN=LEFT  HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 40% style="BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;Special Allowance&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15% style="BORDER-LEFT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['special_allowance']; ?>&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15%>&nbsp;&nbsp;<?php echo $earnings['special_allowance']; ?>&nbsp</td>
 			</tr>
 			<tr>
 				<td ALIGN=LEFT  HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 40% style="BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;Medical Allowance&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15% style="BORDER-LEFT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['medical_allowance']; ?>&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15%>&nbsp;&nbsp;<?php echo $earnings['medical_allowance']; ?>&nbsp</td>
 			</tr>
 			<tr>
 				<td ALIGN=LEFT  HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 40% style="BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;Performance Incentives&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15% style="BORDER-LEFT-STYLE: none">&nbsp;&nbsp;&nbsp</td>
 				<td ALIGN=RIGHT HEIGHT=10px  CLASS="F11NormalBTBNone"  WIDTH = 15%>&nbsp;&nbsp;<?php echo $earnings['performance']; ?>&nbsp</td>
 			</tr>

 		</table>
 	</td>

	<td WIDTH=35% VALIGN=TOP style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;BORDER-RIGHT-STYLE: none;">
 		<TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=100% VALIGN=TOP style="border-collapse: collapse">
 			<TR>
 				<TD ALIGN=LEFT VALIGN=BOTTOM HEIGHT=10px WIDTH = 75% CLASS="F11Bold">&nbsp;<BR>&nbsp;&nbsp;<u>Deductions</u></TD>
 				<TD ALIGN=RIGHT VALIGN=BOTTOM HEIGHT=10px WIDTH = 25% CLASS="F11Bold">&nbsp;&nbsp;<u>Total</u>&nbsp;&nbsp;&nbsp;</TD>
 			</TR>
 			<TR>
 				<TD ALIGN=LEFT HEIGHT=10px CLASS="F11Normal" WIDTH = 75% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none">&nbsp;&nbsp;Provident fund&nbsp;</TD>
 				<TD ALIGN=RIGHT HEIGHT=10px CLASS="F11Normal" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['provident_fund']; ?>&nbsp;&nbsp;&nbsp;</TD>
 			</TR>
 			<TR>
 				<TD ALIGN=LEFT HEIGHT=10px CLASS="F11Normal" WIDTH = 75% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none">&nbsp;&nbsp;Income Tax&nbsp;</TD>
 				<TD ALIGN=RIGHT HEIGHT=10px CLASS="F11Normal" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;<?php echo $salary['income_tax']; ?>&nbsp;&nbsp;&nbsp;</TD>
 			</TR>
 			<TR>
 				<TD ALIGN=LEFT HEIGHT=10px  CLASS="F11Normal" WIDTH = 75% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none">&nbsp;&nbsp;</TD>
 				<TD ALIGN=RIGHT HEIGHT=10px CLASS="F11Normal" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;</TD>
 			</TR>
 			<TR>
 				<TD ALIGN=LEFT HEIGHT=10px  CLASS="F11Normal" WIDTH = 75% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none">&nbsp;&nbsp;</TD>
 				<TD ALIGN=RIGHT HEIGHT=10px CLASS="F11Normal" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;</TD>
 			</TR>
 			<TR>
 				<TD ALIGN=LEFT HEIGHT=10px  CLASS="F11Normal" WIDTH = 75% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none">&nbsp;&nbsp;</TD>
 				<TD ALIGN=RIGHT HEIGHT=10px CLASS="F11Normal" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;</TD>
 			</TR>
 			<TR>
 				<TD ALIGN=LEFT HEIGHT=10px  CLASS="F11Normal" WIDTH = 75% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none">&nbsp;&nbsp;</TD>
 				<TD ALIGN=RIGHT HEIGHT=10px CLASS="F11Normal" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none">&nbsp;&nbsp;</TD>
 			</TR>
 		</TABLE>
	</TD>
 </TR>
 <TR>
 <TD WIDTH=65% VALIGN=MIDDLE>
 <TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=100% VALIGN=TOP style="border-collapse: collapse;BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-RIGHT-STYLE: none;">
 <TR>
 <TD ALIGN=LEFT style="font-weight: bold; font-size:11; font-family:Arial;" WIDTH = 60% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;BORDER-RIGHT-STYLE: none;">&nbsp;&nbsp;<b>Total</b></TD>
 <TD ALIGN=RIGHT style="font-weight: bold; font-size:11; font-family:Arial;" WIDTH = 25% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;">Earnings</TD>
 <TD ALIGN=RIGHT style = "font-size:11; font-family: Arial;" WIDTH = 15% style="BORDER-BOTTOM-STYLE: none;BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;BORDER-RIGHT-STYLE: none;"><?php echo $total_earnings; ?>&nbsp;&nbsp;&nbsp;</TD>
 </TR>
 </TABLE>
 </TD> <TD WIDTH=35% VALIGN=MIDDLE>
 <TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=100% VALIGN=TOP style="border-collapse: collapse;BORDER-TOP-STYLE: none;BORDER-BOTTOM-STYLE: none;">
 <TR>
 <TD ALIGN=RIGHT style = "font-weight: bold; font-size:11; font-family: Arial;" WIDTH = 75% style="BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;BORDER-BOTTOM-STYLE: none;">Deductions</TD>
 <TD ALIGN=RIGHT style = "font-size:11; font-family: Arial;" WIDTH = 25% style="BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;BORDER-RIGHT-STYLE: none;BORDER-BOTTOM-STYLE: none;"><?php $total_deductions = $salary['provident_fund'] + $salary['income_tax']; echo $total_deductions; ?>&nbsp;&nbsp;&nbsp;</TD>
 </TR>
 </TABLE>
 </TD> </TR>
 <TR>
 <TD WIDTH=50% VALIGN=MIDDLE>
 <TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=100% VALIGN=TOP style="border-collapse: collapse;BORDER-RIGHT-STYLE: none;">
 <TR>
 <TD ALIGN=LEFT  style="font-weight: bold; font-size:11; font-family:Arial;"  WIDTH = 100% style="BORDER-RIGHT-STYLE: none;">&nbsp;&nbsp;Net Salary Payable</TD>
 </TR>
 </TABLE>
 </TD> <TD WIDTH=50% VALIGN=MIDDLE>
 <TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=100% VALIGN=TOP style="border-collapse: collapse;BORDER-LEFT-STYLE: none;">
 <TR>
 <TD ALIGN=RIGHT style="font-weight: bold; font-size:11; font-family:Arial;" WIDTH = 100% style="BORDER-TOP-STYLE: none;BORDER-LEFT-STYLE: none;"><?php echo ($total_earnings - $total_deductions); ?>&nbsp;&nbsp;&nbsp;</TD>
 </TR>
 </TABLE>
 </TD> </TR>
 </TABLE>