
$(document).ready(function() {
    $.dobPicker({
        daySelector: '#dobday',
        /* Required */
        monthSelector: '#dobmonth',
        /* Required */
        yearSelector: '#dobyear',
        /* Required */
        dayDefault: 'Ngày',
        /* Optional */
        monthDefault: 'Tháng',
        /* Optional */
        yearDefault: 'Năm',
        /* Optional */
        minimumAge: 6,
        /* Optional */
        maximumAge: 80 /* Optional */
    });
    
    setActiveMenu();
});

function setActiveMenu() {
    $(".menu_user_info").removeClass('active')
    if (!methodName) {
        methodName = 'userinfo';
    }
    $("."+methodName).addClass('active');
}

function setDobUser() {

    if (!dob){
        return false;
    }
    array = dob.split("-");
    $("#dobday").val(array['2']);
    $("#dobmonth").val(array['1']);
    $("#dobyear").val(array['0']);
    
}
function changeAvatar() {
    //$('#fileAvatar').trigger('click');
    document.getElementById('fileAvatar').click();
    
}


function chooseFile(item) {
    document.getElementById(item).click();
}
function chooseImg(item, file, formReset,)
{   
    img = certificatesFirst;
    if (file == 'certificatesLast') {
          img = certificatesLast;
    }
    rewriteImg(item, file, formReset, img);
}
function chooseAvatar() {
    rewriteImg("#avatar", 'fileAvatar', 'formAvatar', urlAvatar);
}

function rewriteImg (item, file, formReset, defaultImg)
{   
    files = document.getElementById(file).files;
    if (!files) {
        $(item).attr('src', defaultImg);
        document.getElementById(formReset).reset();
        return false;
    }
    if(this.files[0].type.indexOf("image")==-1){
        
        alert('Bạn chỉ được up ảnh');
        document.getElementById(formReset).reset();
        $(item).attr('src', defaultImg);
        return false;
    }
    
    url = window.URL.createObjectURL(files[0]);
    $(item).attr('src', url);
}

function updateProfile()
{   
    email = $("#email").val();
    phone = $("#telephone").val();
    fullName = $("#full_name").val();
    dobday = $("#dobday").val();
    dobmonth = $("#dobmonth").val();
    dobyear = $("#dobyear").val();
    address = $("#address").val();
    sex = $("input[name='gender']:checked").val()
    files = document.getElementById('fileAvatar').files;
    if (!email || !phone || !fullName || !dobday || !dobmonth || !dobyear || !address) {
        $(".error-supmit").html("Bạn không được bỏ trông các mục có *");
        return false;
    }
    
    var formData = new FormData();
    birthday = dobyear+"-"+dobmonth+"-"+dobday; //2018-09-19
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('fullName', fullName);
    formData.append('birthday', birthday);
    formData.append('address', address);
    formData.append('sex', sex);
    formData.append('file', files[0]);
    
    $(".loading").fadeIn(1);
    var http = new XMLHttpRequest();
    http.open('POST', serverName+'profile/profile/updateprofile', true);
    http.send(formData);
    http.onreadystatechange = function (event) {
        $(".loading").fadeOut(1);
        if (http.readyState == 4 && http.status == 200) {
            var job = parseJson(http.responseText);
            if (job.status != 200) {
                $(".error-supmit").html(job.message);
                return false;
            }
             $(".error-supmit").html(job.message);
            
        }

    }
}

function updateAdvanced() {

    certificates = $("#certificates").val();
    dateRange = $("#dateRange").val();
    issuedBy = $("#issuedBy").val();
    keyReferrers = $("#keyReferrers").val();
    linkReferrers = $("#linkReferrers").val();
    nameReferrers = $("#nameReferrers").val();
    
    certificatesLast = document.getElementById('certificatesLast').files;
    certificatesFirst = document.getElementById('certificatesFirst').files;
   
    if (!certificates || !dateRange || !issuedBy) {
        $(".error-supmit").html("Bạn không được bỏ trông các mục có *");
        return false;
    }
    
    var formData = new FormData();
    formData.append('certificates', certificates);
    formData.append('dateRange', dateRange);
    formData.append('issuedBy', issuedBy);
    formData.append('keyReferrers', keyReferrers);
    formData.append('linkReferrers', linkReferrers);
    formData.append('nameReferrers', nameReferrers);
    formData.append('certificatesLast', certificatesLast[0]);
    formData.append('certificatesFirst', certificatesFirst[0]);
    
    $(".loading").fadeIn(1);
    var http = new XMLHttpRequest();
    http.open('POST', serverName+'profile/profile/saveadvanced', true);
    http.send(formData);
    http.onreadystatechange = function (event) {

        $(".loading").fadeOut(1);
        if (http.readyState == 4 && http.status == 200) {
            var job = parseJson(http.responseText);
            if (job.status != 200) {
                $(".error-supmit").html(job.message);
                return false;
            }
            $(".error-supmit").html(job.message);
            
        }

    }
}


function coppyUrl() {
    var range = window.getSelection().getRangeAt(0);
    range.selectNode(document.getElementById('linkReferrers'));
    document.execCommand("copy")

}

function updateBank() {
    
    bankNumber = $("#bankNumber").val();
    bankName = $("#bankName").val();
    bankBranch = $("#bankBranch").val();
    
    if (!bankNumber || !bankName || !bankBranch) {
        $(".error-supmit").html("Bạn không được bỏ trông các mục có *");
        return false;
    }
     $(".loading").fadeIn(10);
    $.ajax({
        url: serverName + 'profile/profile/savebank',
        type: "post",
        dateType: "json",
        data: {
            bankNumber: bankNumber,
            bankName: bankName,
            bankBranch: bankBranch
        },
        success: function (result) {
             $(".loading").fadeOut(1);
            obj = parseJson(result);
            if (obj.status != 200) {
               // $(".error-supmit").html(obj.message);
				$('form#reused_form').hide();
				$('#success_message').show();
				$('#error_message').hide();
            }
            $(".error-supmit").html(obj.message);
        }
    });
}

function setBank()
{
    if (!bank) {
        return false;
    }
    $("#bankName").val(bank);
}

function payment()
{
    numberMoney = parseFloat($("#numberMony").val());
    
    if (!censorship) {
        $(".error-supmit").html("Tài khoản của bạn chưa được xác thực");
        return false;
    }
    
    if (!numberMoney || numberMoney < 300) {
        $(".error-supmit").html("Bạn chưa nhập số tiền, sô tiền phải nhỏ nhất 300.000 VNĐ ");
        return false;
    }
  
    
    if (numberMoney > zocoin) {
        $(".error-supmit").html("Bạn không được rút tiền quá số zocoin hiện có");
        return false;
    }
     $(".loading").fadeIn(1);
    $.ajax({
        url: serverName + 'profile/profile/payment',
        type: "post",
        dateType: "json",
        data: {
            numberMoney: numberMoney,
        },
        success: function (result) {
             $(".loading").fadeOut(1);
            obj = parseJson(result);
            if (obj.status != 200) {
                $(".error-supmit").html(obj.message);
                return false;
            }
            $("#numberMony").val('');
            $(".error-supmit").html(obj.message);
            zocoin = obj.data.zocoin;
            $("#zocoin").val(zocoin);
             setTimeout(function(){
                location.reload();
            }, 5000);
        }
    });
}

function showFormPayment() {
    $("#listPayment").slideUp(1);
    $("#creatPayment").slideDown(2);
}

function cancelPament() {  

    $("#creatPayment").slideUp(1);
    $("#listPayment").slideDown(2);
    $("#numberMony").val('');
}
//