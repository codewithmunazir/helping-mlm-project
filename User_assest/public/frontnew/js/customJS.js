// JavaScript Document

$(function () {
    $(".DateCalendar").datepicker({ dateFormat: 'dd/mm/yy' });
});

$(function () {
    $(".DOBCalendar").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,
        yearRange: "-80:-0"
    });
});

function RefershTuring() { 
    var date = new Date();
    $("#turing").attr('src', 'Turing.html?v=' + date.getTime());
}

function IsAffiliateExists(obj) {
    $("#dvMail").find("img").remove();
    $("#ajexresult").append("<img src='images/Loader.gif' />");
    $.ajax({
        url: 'AjaxHelper/forajax.aspx/CheckPromoterId',
        type: 'POST',
        data: '{"PromoterId":"' + $(obj).val() + '"}',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        cache: false,
        success: function (msg) {
            if (msg.d.charAt(0) == "!") {
                $("#ajexresult").find("img").remove();
                $("#ajexresult").append("<img src='images/Error.png' />");
                return false;
            }
            if (msg.d.charAt(0) == "0") {
                $("#ajexresult").find("img").remove();
                $("#ajexresult").append("<img src='images/available.png' />");
                return true;
            }
            else {
                $("#ajexresult").find("img").remove();
                $("#ajexresult").append("<img src='images/availableNo.png' />");
                $(obj).focus();
                return false;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //alert(XMLHttpRequest.responseText);
        },
        failure: function (msg) {
            //alert(msg);
        }

    });

}

function GetAffiliateName(obj) { 
    if ($(obj).val() == "") return false;
    $("#ajexresult_reffer").val("");  
    $.ajax({
        url: 'AjaxHelper/forajax.aspx/GetPromoterName',
        type: 'POST',
        data: '{"PromoterId":"' + $(obj).val() + '"}',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        cache: false,
        success: function (msg) {
            //alert(msg.d);
            if (msg.d.charAt(0) == "!") { 
                $("#ajexresult_reffer").val("Promoter not exists");
                return false;
            }
            else { 
                $("#ajexresult_reffer").val(msg.d);
                return true;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //alert(XMLHttpRequest.responseText);
        },
        failure: function (msg) {
            //alert(msg);
        }

    });

}

function IsUserExists(obj) {
    $("#dvMail").find("img").remove();
    $("#ajexresult").append("<img src='images/Loader.gif' />");
    $.ajax({
        url: 'AjaxHelper/forajax.aspx/CheckPromoterId',
        type: 'POST',
        data: '{"PromoterId":"' + $(obj).val() + '"}',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        cache: false,
        success: function (msg) {
            if (msg.d.charAt(0) == "!") {
                $("#ajexresult").find("img").remove();
                $("#ajexresult").append("<img src='images/Error.png' />");
                return false;
            }
            if (msg.d.charAt(0) == "0") {
                $("#ajexresult").find("img").remove();
                $("#ajexresult").append("<img src='images/available.png' />");
                return true;
            }
            else {
                $("#ajexresult").find("img").remove();
                $("#ajexresult").append("<img src='images/availableNo.png' />");
                $(obj).focus();
                return false;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //alert(XMLHttpRequest.responseText);
        },
        failure: function (msg) {
            //alert(msg);
        }

    });

}



function CheckPlacementID() {
    if ($("#txtParentID").val() == "" || $("#ddlSide").val() == "") {
        return false;
    }
    $("#ajexresult_parent").html("");
    $("#ajexresult_parent").find("img").remove();
    $("#ajexresult_parent").append("<img src='images/Loader.gif' height='17' />");
    $.ajax({
        url: 'AjaxHelper/forajax.aspx/CheckParentID',
        type: 'POST',
        data: "{ 'ParentID': '" + $("#txtParentID").val() + "', 'Side': '" + $("#ddlSide").val() + "' }",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        cache: false,
        success: function (msg) {
            //alert(msg.d);
            if (msg.d.charAt(0) == "~") {
                $("#ajexresult_parent").find("img").remove();
                $("#ajexresult_parent").html("Placement ID not exists");
                $("#txtParentID").val("");
                $("#txtParentID").focus();
                return true;
            }
            else if (msg.d.charAt(0) == "^") {
                $("#ajexresult_parent").find("img").remove();
                $("#ajexresult_parent").html("Placement Occupied");
                $("#txtParentID").val("");
                return false;
            }
            else {
                $("#ajexresult_parent").find("img").remove();
                $("#ajexresult_parent").html(msg.d);
                return true;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //alert(XMLHttpRequest.responseText);
        },
        failure: function (msg) {
            //alert(msg);
        }
    });
}



function GetStock(obj) {
    if ($(obj).val() == "") {
        $("#txtAvailableQty").val("");
        return false;
    }
    $("#txtAvailableQty").val("");
    $.ajax({
        url: 'AjaxHelper/forajax.aspx/FindStock',
        type: 'POST',
        data: '{"prodID":"' + $(obj).val() + '"}',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        cache: false,
        success: function (msg) {
            $("#txtAvailableQty").val(msg.d);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //alert(XMLHttpRequest.responseText);
        },
        failure: function (msg) {
            //alert(msg);
        }

    });

}