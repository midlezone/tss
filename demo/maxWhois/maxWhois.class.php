<?php
/*************************************************
 * Max's Whois
 *
 * Version: 1.0
 * Date: 2007-11-28
 *
 ****************************************************/

class maxWhois{

    var $serverList;
    var $tr = 0;
    
function maxWhois(){   
    $this->serverList[0]['top']      = 'com';
	$this->serverList[0]['server']   = 'whois.crsnic.net';
	$this->serverList[0]['response'] = 'No match for';
	$this->serverList[0]['check']    = true;
	
	$this->serverList[1]['top']      = 'net';
	$this->serverList[1]['server']   = 'whois.crsnic.net';
	$this->serverList[1]['response'] = 'No match for';
	$this->serverList[1]['check']    = false;

	$this->serverList[2]['top']      = 'org';
	$this->serverList[2]['server']   = 'whois.publicinterestregistry.net';
	$this->serverList[2]['response'] = 'NOT FOUND';
	$this->serverList[2]['check']    = false;
	
	$this->serverList[3]['top']      = 'info';
	$this->serverList[3]['server']   = 'whois.afilias.net';
	$this->serverList[3]['response'] = 'NOT FOUND';
	$this->serverList[3]['check']    = false;
	
	$this->serverList[4]['top']      = 'name';
	$this->serverList[4]['server']   = 'whois.nic.name';
	$this->serverList[4]['response'] = 'No match';
	$this->serverList[4]['check']    = false;
	
	$this->serverList[5]['top']      = 'us';
	$this->serverList[5]['server']   = 'whois.nic.us';
	$this->serverList[5]['response'] = 'Not found:';
	$this->serverList[5]['check']    = false;

	$this->serverList[6]['top']      = 'biz';
	$this->serverList[6]['server']   = 'whois.nic.biz';
	$this->serverList[6]['response'] = 'Not found';
	$this->serverList[6]['check']    = false;
	
	$this->serverList[7]['top']      = 'ca';
	$this->serverList[7]['server']   = 'whois.cira.ca';
	$this->serverList[7]['response'] = 'AVAIL';
	$this->serverList[7]['check']    = false;

	$this->serverList[8]['top']      = 'tv';
	$this->serverList[8]['server']   = 'whois.internic.net';
	$this->serverList[8]['response'] = 'No match for';
	$this->serverList[8]['check']    = false;
}

function showHeader(){
?>
    <div id="container">
        <div id="header"><div id="header_left"></div>
        <div id="header_main">Max's Whois</div><div id="header_right"></div></div>
        <div id="content">
<?php
}

function showWhoisForm(){
?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
				<table class="dtable2">
                <tr><th colspan="5">Enter a domain name:</th></tr>
				<tr><td colspan="5"><center>www.<input name="domain" type="text" size="35" /></center></td></tr>
                <tr><th colspan="5">Select an extension:</th></tr>
				<tr>
            <?php
            	$i = 0;
                foreach ($this->serverList as $value) {
                    if ($value['check'] == true) $checked=" checked ";
            		else $checked = " ";
            		
            		echo '<td><input type="checkbox" name="top_'.$value['top'].'"'.$checked.'/>.'.$value['top'].'</td>';
                    $i++;            		
            		if ($i > 4) {
            		    $i = 0;
            		    echo '</tr><tr>';
            		}
            	}
            	
            ?>				
				</tr>
				</table>
				<center><input type="submit" name="submitBtn" class="sbtn" value="Check" /></center>
            </form>
<?php
}

function showFooter(){
?>
        </div>
        <div id="footer"><a href="http://www.phpf1.com" target="_blank">Powered by PHP F1</a></div>
    </div>

<?php
}

function processWhois(){
    $this->showHeader();

    if (!isset($_POST['submitBtn'])){
        $this->showWhoisForm();
    } else {

        $domainName = (isset($_POST['domain'])) ? $_POST['domain'] : '';
        
       	for ($i = 0; $i < sizeof($this->serverList); $i++) {
       		$actTop = "top_".$this->serverList[$i]['top'];
       		$this->serverList[$i]['check'] = isset($_POST[$actTop]) ? true : false;
       	}

        // Check domains only if the base name is big enough
        if (strlen($domainName)>2){
            echo '<table class="dtable">';
            echo '<tr><th colspan="2">Result</th></tr>';
		
           	for ($i = 0; $i < sizeof($this->serverList); $i++) {
	       		if ($this->serverList[$i]['check']){
			     	$this->showDomainResult($domainName.".".$this->serverList[$i]['top'],
			     	                        $this->serverList[$i]['server'],
			     	                        $this->serverList[$i]['response']);
			    }
		    }
        
		    echo '</table>';
        }
        $this->showWhoisForm();
        
    }
    $this->showFooter();

}

function showDomainResult($domain,$server,$findText){
   if ($this->tr == 0){
       $this->tr = 1;
       $class = " class='tr2'";
   } else {
       $this->tr = 0;
       $class = "";
   }
   if ($this->checkDomain($domain,$server,$findText)){
      echo "<tr $class><td>$domain</td><td class='ava'>AVAILABLE</td></tr>";
   }
   else echo "<tr $class><td>$domain</td><td class='tak'>TAKEN</td></tr>";
}

function checkDomain($domain,$server,$findText){
    $con = fsockopen($server, 43);
    if (!$con) return false;
        
    // Send the requested doman name
    fputs($con, $domain."\r\n");
        
    // Read and store the server response
    $response = ' :';
    while(!feof($con)) {
        $response .= fgets($con,128); 
    }
        
    // Close the connection
    fclose($con);
        
    // Check the response stream whether the domain is available
    if (strpos($response, $findText)){
        return true;
    }
    else {
        return false;   
    }
}

}
?>