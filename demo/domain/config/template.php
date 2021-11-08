<?php
// --------------------------------------------
// | The EP-Dev Whois script        
// |                                           
// | Copyright (c) 2003-2009 EP-Dev.com :           
// | This program is distributed as free       
// | software under the GNU General Public     
// | License as published by the Free Software 
// | Foundation. You may freely redistribute     
// | and/or modify this program.               
// |                                           
// --------------------------------------------


/* ------------------------------------------------------------------ */
//	!!!!!!!!!!! DO NOT EDIT THIS FILE MANUALLY !!!!!!!!!!!!!!!!!!!!!!
//	If you edit this file manually it is likely that the control panel
//	will no longer work.
/* ------------------------------------------------------------------ */


/* ------------------------------------------------------------------ */
//	Templates Class
//  Contains all template data
/* ------------------------------------------------------------------ */

class EP_Dev_Whois_Templates
{
	var $TEMPLATES;

	function EP_Dev_Whois_Templates()
	{
		$this->TEMPLATES['multiple_tlds'] = "[[header]]
<div align=\"center\">Please enter the full domains that you want to check, one per line.</div>
<div align=\"center\"><form name='whois_search' method='POST' action='[[site-url]]whois.php'>
			<input type='hidden' name='page' value='WhoisSearch'>
			<input type='hidden' name='skip_additional' value='1'>
				<table>
					<tr>
					<td>http://www.</td><td><textarea rows='10' cols='40' name='domain'>[[user-domain]]</textarea></td>
					</tr>
				</table>
			<input type='submit' id='Submit' value='Check Availability'> 
</form></div>
[[footer]]";


		$this->TEMPLATES['image_verification'] = "[[header]]
<div align='center'>
	<div style=\"width: 75%;\">In an effort to prevent the abuse of contact information found within whois databases, we enforce image validation to prevent computer-automated data mining machines from abusing this service. Below you will find an image with 5 random letters and numbers that can only be read by humans. Please type those five characters into the box and click \"View Report\".</div>
	<form name='whois_validate' method='POST' action='[[site-url]]whois.php'>
		<div>
			<table>
				<tr>
					<td><img src='[[site-url]]whois.php?page=SecurityImage&amp;code=[[image-code]]'></td>
					<td style=\"padding-left: 20px;\">
						<input type='text' name='vcode'>
						<input type='hidden' name='code' value='[[image-code]]'>
						<input type='hidden' name='domain' value='[[domain]]'>
						<input type='hidden' name='ext' value='[[ext]]'>
						<input type='hidden' name='page' value='WhoisReport'>
					</td>
				</tr>
			</table>
			<br />
			<input type='submit' value='View Report'>
		</div>
	</form>
</div>
[[footer]]";


		$this->TEMPLATES['header'] = "<html>
	<head>
			<title>[[site-title]]</title>
			<style type=\"text/css\">
				TABLE.whoisSearchTable
				{
					
				}

				TABLE.whoisPriceTable
				{
					border: 1px solid black;
				}

				TD.whoisPriceTable_ext
				{
					color: #13719F;
				}

				TD.whoisPriceTable_price
				{
					padding-left: 5px;
					padding-right: 15px;
				}
			</style>
		</head>
		<body>
		<h1>[[site-title]]</h1>
		<div align='center'>[[pricetable]]</div><br>";


		$this->TEMPLATES['footer'] = "</body>
</html>
		";

		$this->TEMPLATES['main'] = "[[header]]
[[searchbar]]
[[footer]]";

		$this->TEMPLATES['report'] = "[[header]]
[[searchbar]]
[[whoisreport]]
[[footer]]
		";

		$this->TEMPLATES['results'] = "[[header]]
[[searchbar]]
[[availabledomains]]
[[unavailabledomains]]
[[footer]]
		";


		$this->TEMPLATES['error'] = "[[header]]
[[searchbar]]
<div style=\"color: red; font-weight: bold;\">There was an error processing your request:</div>
[[error]]
<br><br>
[[footer]]
		";


		$this->TEMPLATES['searchbar'] = "<div align='center'><form name='whois_search' method='POST' action='[[site-url]]whois.php'>
			<input type='hidden' name='page' value='WhoisSearch'>
				<table>
					<tr>
					<td><div style=\"margin-top: 15px;\">http://www.<input type='text' name='domain' value='[[user-domain]]'><div align=\"right\"><small>(<a href=\"[[site-url]]whois.php?page=MultipleWhoisSearch\">Check Multiple Domains</a>)</small></div></div></td>
					<td>[[tld-checkboxes]]</td>
					</tr>
				</table>
			<input type='submit' id='Submit' value='Check Availability'> 
</form></div>
";
		
		$this->TEMPLATES['availabledomains'] = "Available:<br>
[repeat]
<div>
<b>[[domain]].[[ext]]</b> - [[price]] (<a href='external-script-example.php?domain=[[domain]]&ext=[[ext]]'>Order Now</a>)
</div>
[/repeat]";

		$this->TEMPLATES['unavailabledomains'] = "Unavailable:<br>
[repeat]
<div>
<b>[[domain]].[[ext]]</b> - <a href='[[whois-reporturl]]'>View Whois</a>    <a href='http://www.[[domain]].[[ext]]' target='_blank'>View Website</a>
</div>
[/repeat]";
	}
}
