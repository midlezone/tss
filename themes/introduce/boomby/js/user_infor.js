var menuUser = 0;
var serverName = '';
$(document).ready(function(){
    serverName = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '/');
    $("body").mouseup(function(e)
    {
        var subject = $("#accountInfor"); 

        if(e.target.id != subject.attr('id'))
        {   
            menuUser = 0;
           $(".userInfor").fadeOut(1);
        }
        
    });
});
function showMenuUser() { 
    //$(".userInfor").toggle(1); 
    if (menuUser > 0) {
       return false;
    }
     menuUser = 1;
     $(".userInfor").fadeIn(1);
    
}

function showMenu()
{   
    $(".box-quanly").toggle(1)
}
function parseJson(result) {

    data = (typeof  result === "object") ? result : JSON.parse(result);
    return data;
}
