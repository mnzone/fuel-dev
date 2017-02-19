function onsubmits() {
    var reg = new RegExp("^[0-9]*$");
    var regs = new RegExp("^[\\u4E00-\\u9FA5]+$", "g");
    var trueName = $("#txtName");
    var card = $("#txtCard");
    if ($.trim(trueName.val()) == "" || reg.test(trueName.val())) {
        trueName.focus();
        alert("请输入真实姓名，否则会影响您的参保权益");
        return false;
    }
    else if (!regs.test(trueName.val())) {
        trueName.focus();
        alert("姓名只能是中文，请重新输入");
        return false;
    }
    else if (card.val() == "") {
        card.focus();
        alert("请输入身份证号");
        return false;
    }
    else if (!IdentityCodeValid(card.val())) {
        card.focus();
        alert("请输入正确有效身份证号");
        return false;
    }
    else if ($("#hidbodyCode").val() == card.val()) {
        location.href = '/service/SocialSecurityNew?t=' + getQueryString('t')+'&type='+getQueryString('type');
    } else {
        $.get("/service/CheckIdentityCode?ts=" + new Date().getTime(), { t: "upbodyname", IdCard: card.val(), Name: trueName.val() }, function (data) {
            if (data == "nlg") {
                location.href = "/login.aspx";
            } else if (data == "sfzcz") {
                alert("身份证已存在，请您再换一个吧");
            } else if (data == "ok") {
                location.href = 'SocialSecurityNew.aspx?t=' + getQueryString('t')+'&type='+getQueryString('type');
            } else {
                alert("发生错误，请稍候再试");
            }
        });
    }
}