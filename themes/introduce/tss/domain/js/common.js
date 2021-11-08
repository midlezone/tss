/*
 * DOHOAVN.INFO
 * http://dohoavn.info/
 *
 * Copyright (c) 2009 DOHOAVN.INFO
 * Powered by HT ( YM: phan_huutam )
 */
function template(num,dm,ex,price){
	if(num==2){
		return '<div id="'+replacedot((dm+ex))+'"><label>Domain <strong>'+dm+'.'+ex+'</strong> is checking...<img src="'+theme_url+'/img/loading2.gif" /></label></div>';
	}
	if(num==3){
		return '<div><label id="registered"><span>'+dm+'.'+ex+'</span> | <img src="'+theme_url+'/img/notavailable.gif" /> | <a href="javascript:ht_whois(\''+dm+'\',\''+ex+'\')">Xem thông tin</a></label></div>';
	}
	if(num==4){
		return '<div><label id="available"><strong><font color="green">'+dm+'.'+ex+'</font></strong> | <img src="'+theme_url+'/img/OK.gif" /> | Chưa có ai đăng ký | Phí cài đặt : <strong><font color="red">Miễn phí </font></strong></label></div>';
	}
	if(num==5){
		return '<div><label id="available"><strong><font color="green">'+dm+'.'+ex+'</font></strong> | <img src="'+theme_url+'/img/OK.gif" /> | Chưa có ai đăng ký | Phí cài đặt : <strong><font color="red">'+price+' đ </font></strong></label></div>';
	}
}

function busy(e)
{
    if (e) {
        $('body').css('cursor', 'wait');    
    } else $('body').css('cursor', 'auto');        
    
    if (e) {
        $("body").before("<div class=\"preloader\"></div>");
        // $('body').html('<div class=\"preloader\" style="text-align:center;margin-top:200px"><img src="'+theme_url+'/img/loading1.gif" /></div>');
    } else $(".preloader").remove();
}

function replacedot(str){
	return str.replace(/[.]/gi,'');
}

$(function(){	
	$('#check').click(function(){
		// busy(true);
		$('#rowResult').html('');
		var domain = $('#domainId').val();
		var ext = $('input[class=ext-item]');
		var errlogs = '';
		
		if(domain.length < 2){
			errlogs += '+ Tên miền quá ngắn \n';			
		}
		if(!validateDomain(domain)){
			errlogs += '+ Tên miền chỉ bao gồm các ký tự A-Z, 0-9 và dấu (-) \n';			
		}
		if(domain.indexOf('--') != -1){
			errlogs += '+ Tên miền không thể bao gồm ký tự: -- \n';
		}
		if(domain.indexOf('-')==0 || domain.lastIndexOf('-')==domain.length-1){
			errlogs += '+ Tên miền không thể bắt đầu với: - \n';
		}
		if(errlogs != ''){
			alert(errlogs);
			return false;
		}
		else {
			var hasChecked = false;
			ext.each(function(){
				if(this.checked){
					hasChecked=true;
				}
			});
			if(!hasChecked){
				alert("Vui lòng chọn ít nhất 1 đuôi mở rộng để kiểm tra.");
				return false;
			}else{
				busy(true);
				ext.each(function(){
					if(this.checked){
						var url = "site/site/processCheckDomain";
						var ext=$(this).val();
					    $.post( url, { domain: domain, ext:ext })
					        .done(function( data ) {
					            var js = $.parseJSON(data);
					            if (js.success) {
				            		$(js.tr).appendTo('#rowResult');
					            }
					        });
					}
				});
				
			}
		}
		busy(false);
		return false;
	});			
	$('#chkall').click(function(){
		var checked_status = this.checked;
		$('input[name=ext]').each(function(){
			this.checked = checked_status;
		});
	});
});

$(document).ready(function(){
	var domainName=$('#domainId').val();
	if (domainName.length>0) {
		$('#check').trigger('click');
	};
});

function ht_whois(domain,ext){
	$('#resultInfo').dialog('open');
	$('#resultInfo').dialog({	
		width: 600,
		height: 500,
		modal:true
	});
	$('#resultInfo').dialog('option', 'title', 'whois'+' '+domain+'.'+ext);
	$('#resultInfo').html('<div style="text-align:center;margin-top:200px"><img src="'+theme_url+'/img/loading1.gif" /></div>');
	var url = "site/site/processGetInfoDomain";
    $.post( url, { domain: domain, ext: ext })
        .done(function( data ) {
            var js = $.parseJSON(data);
            if (js.success) {
            	$('#resultInfo').html(js.message);
            }
        });
     return false;
}
function validateDomain(elementValue){    
   var domainPattern = /^[a-zA-Z0-9-]+$/ ;
   return domainPattern.test(elementValue); 
}