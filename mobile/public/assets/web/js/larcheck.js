$(function () {
    $("input").keyup(function () {
        showMsg("span_msg", "", true);
    });
    $(".yw_dd_quand").click(function () {
        if ($(this).attr("class") == "yw_dd_quand yw_dd_quan1") {
            $(this).removeClass("yw_dd_quan1");
        } else {
            $(this).addClass("yw_dd_quan1");
        }
    })
})
//登陆验证
function checklogin() {
    if ($("#username").val() == "") {
        showMsg("span_msg", "用户名不能为空！", false);
        $("#username").focus();
        return false;
    } else if ($("#userpwd").val() == "") {
        showMsg("span_msg", "密码不能为空！", false);
        $("#userpwd").focus();
        return false;
        //} else if ($("#vcode").val() == "") {
        //    showMsg("span_msg", "验证码不能为空！", false);
        //    $("#vcode").focus();
        //    return false;
    } else {
        t = Math.random() * 100
        $.post("/ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "u": $("#username").val(),
            "p": $("#userpwd").val(),
            //"c": $("#vcode").val(),
            "OpId": $.trim($("#OpenId").text()),
            "t": "login"
        }, function (data) {
            if (data == "2") {
                var url = getQueryString("ul");
                if (url == "" || url == null) {
                    url = "/u/PersonalCenter.aspx";
                }
                location.href = url;
            } else if (data == "3") {
                showMsg("span_msg", "您的账号已停用，请与客服联系！", false);
            } else if (data == "1") {
                location.href = "/u/UpdatePass.aspx";
            } else {
                showMsg("span_msg", data, false);
                changeImage();
            }
        })
    }
}

/////////////////////////第一次验证 New 11.20 TAM//////////////////////////////////
function nextAction() {
    var reg = /^[a-zA-Z0-9][a-zA-Z0-9_-]{3,20}$/;
    if ($("#username").val() == "") {
        showMsg("span_msg", "用户名不能为空", false);
        $("#username").focus();
        return false
    } else if (/^[0-9]*$/.test($("#username").val())) {
        showMsg("span_msg", "用户名不能为纯数字", false);
        $("#username").focus();
        return false;
    } else if (!reg.test($("#username").val())) {
        showMsg("span_msg", "用户名为4-20位字符,支持字母、数字及\"-\"、\"_\"组合", false);
        $("#username").focus();
        return false;
    } else if ($(".yw_dd_quan").attr("class") != "yw_dd_quan yw_dd_quan1") {
        showMsg("span_msg", "请先阅读并同意《人人保网站协议》", false);
        return false;
    } else {
        t = Math.random() * 100
        $.post("ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "u": $("#username").val(),
            "t": "existu"
        }, function (data) {
            if (data == "ok") {
                $("#u").val($("#username").val())
                $("#p").val($("#userpwd1").val())
                $(".rmain").hide()
                $(".rmain1").show()
            } else {
                showMsg("span_msg", data, false);
            }
        })
    }
}



//注册一次验证
function existU() {
    var reg = /^[a-zA-Z0-9][a-zA-Z0-9_-]{3,20}$/;
    if ($("#username").val() == "") {
        showMsg("span_msg", "用户名不能为空", false);
        $("#username").focus();
        return false
    } else if (/^[0-9]*$/.test($("#username").val())) {
        showMsg("span_msg", "用户名不能为纯数字", false);
        $("#username").focus();
        return false;
    } else if (!reg.test($("#username").val())) {
        showMsg("span_msg", "用户名为4-20位字符,支持字母、数字及\"-\"、\"_\"组合", false);
        $("#username").focus();
        return false;
    } else if ($("#userpwd").val() == "") {
        showMsg("span_msg", "密码不能为空！", false);
        $("#userpwd").focus()
        return false
    } else if (!/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,20}$/.test($("#userpwd").val())) {
        showMsg("span_msg", "密码为6-20位字符,建议字母、数字和符号两种以上组合", false);
        $("#userpwd").focus()
        return false;
    } else if ($("#userpwd1").val() == "") {
        showMsg("span_msg", "重复密码不能为空！", false);
        $("#userpwd1").focus()
        return false
    } else if ($("#userpwd1").val() != $("#userpwd").val()) {
        showMsg("span_msg", "两次输入密码不一致，请重新输入", false);
        $("#userpwd1").val("")
        $("#userpwd1").focus()
        return false
    } else if ($("#cbkXieyi").attr("checked") != true) {
        showMsg("span_msg", "请先阅读并同意《人人保网站协议》", false);
        return false;
    } else {
        t = Math.random() * 100
        $.post("ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "u": $("#username").val(),
            "t": "existu"
        }, function (data) {
            if (data == "ok") {
                $("#u").val($("#username").val())
                $("#p").val($("#userpwd1").val())
                $(".rmain").hide()
                $(".rmain1").show()
            } else {
                showMsg("span_msg", data, false);
            }
        })
    }
}

////////////////////注册New Registered TAM 11.26///////////////////
function existUNew() {
    var reg = /^[a-zA-Z0-9][a-zA-Z0-9_-]{3,20}$/;
    //if ($("#username").val() == "") {
    //    showMsg("span_msg", "用户名不能为空", false);
    //    $("#username").focus();
    //    return false
    //} else if (/^[0-9]*$/.test($("#username").val())) {
    //    showMsg("span_msg", "用户名不能为纯数字", false);
    //    $("#username").focus();
    //    return false;
    //} else if (!reg.test($("#username").val())) {
    //    showMsg("span_msg", "用户名为4-20位字符,支持字母、数字及\"-\"、\"_\"组合", false);
    //    $("#username").focus();
    //    return false;
    //} else 
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机不能为空", false);
        $("#mobile").focus();
        return false;
    } else if ($(".yw_dd_quan").attr("class") != "yw_dd_quan yw_dd_quan1") {
        showMsg("span_msg", "请先阅读并同意《人人保网站协议》", false);
        return false;
    } else {
        t = Math.random() * 100
        $.post("ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "u": $("#username").val(),
            "mobile": $("#mobile").val(),
            "t": "existu"
        }, function (data) {
            if (data == "ok") {
                $("#u").val($("#username").val())
                $("#p").val($("#userpwd1").val())
                // alert($("#username").val());
                sendinfo3(0);//验证手机号码是否存在
                $(".rmain").hide()
                $(".rmain1").show()
            } else {
                showMsg("span_msg", data, false);
            }
        })
    }
}


function showMsg(idname, msg, isok) {
    $("#" + idname).text(msg);
    if (isok) {
        $("#" + idname).css("color", "#22F906");
    } else {
        $("#" + idname).css("color", "#F00");
    }
}
/////////////////开始注册 TAM 11.26///////////////////
function checkregNew() {
    var c = getQueryString("data");
    t = Math.random() * 100
    $.post("/ajax/UserInfoManageHandler.ashx?time=" + t + "", {
        "u": getQueryString("un"),
        "p": $("#pwd").val(),
        //"relname": $("#relname").val(),
        "mobile": getQueryString("c"),
        //"IDCard": $("#bodyCode").val(),
        "nickname": "",
        //"c":c,
        "type": getQueryString("type"),
        "OpId": getQueryString("openId"),
        "ParentId": getQueryString("ParentId"),
        "t": "register"
    }, function (data) {
        if (data == "2") {
            var url = getQueryString("ul");
            if (url != null && url != "") {
                url = "resok.aspx?ul=" + encodeURIComponent(url);
            } else {
                url = "resok.aspx";
            }
            location.href = url;
        }
        else {
            showMsg("span_msg1", data, false);
        }
    });
}



//注册二次验证
function checkreg() {
    //if ($("#relname").val() == "") {
    //    showMsg("span_msg1", "真实姓名不能为空！", false);
    //    $("#relname").focus()
    //    return false
    //} else if ($("#bodyCode").val() == "") {
    //    showMsg("span_msg1", "请输入身份证号！", false);
    //    $("#bodyCode").focus();
    //    return false;
    //} else if (!IdentityCodeValid($("#bodyCode").val())) {
    //    showMsg("span_msg1", "请输入正确有效身份证号！", false);
    //    $("#bodyCode").focus();
    //    return false;
    //} 
    var reg = /^[\u4E00-\u9FA5\uF900-\uFA2D\w-]*$/;
    var nickname = $.trim($("#txtnickname").val());
    if (nickname == "") {
        showMsg("span_msg1", "昵称不能为空", false);
        $("#txtnickname").focus();
        return false
    } else if (/^[0-9]*$/.test(nickname)) {
        showMsg("span_msg1", "昵称不能为纯数字", false);
        $("#txtnickname").focus();
        return false;
    } else if (!reg.test(nickname)) {
        showMsg("span_msg1", '昵称为3-20位字符,支持中文、字母、数字及"-"、"_"组合', false);
        $("#txtnickname").focus();
        return false;
    } else if (getStrLen(nickname) > 20 || getStrLen(nickname) < 3) {
        showMsg("span_msg1", '昵称为3-20位字符', false);
        $("#txtnickname").focus();
        return false;
    } else if ($("#mobile").val() == "") {
        showMsg("span_msg1", "手机号不能为空", false);
        $("#mobile").focus()
        return false
        //} else if ($("#vcode").val() == "") {
        //    showMsg("span_msg1", "验证码不用能为空", false);
        //    $("#vcode").focus()
        //    return false
    } else {
        if ($("#mcode").val() == "") {
            showMsg("span_msg1", "请先验证手机", false);
            $("#mcode").val("")
            return false
        }
        else {
            if ($("#vcode").val() == $("#mcode").val()) {
                t = Math.random() * 100
                $.post("/ajax/UserInfoManageHandler.ashx?time=" + t + "", {
                    "u": $("#u").val(),
                    "p": $("#p").val(),
                    //"relname": $("#relname").val(),
                    "mobile": $("#mobile").val(),
                    //"IDCard": $("#bodyCode").val(),
                    "nickname": $("#txtnickname").val(),
                    "c": $("#vcode").val(),
                    "type": getQueryString("type"),
                    "OpId": $.trim($("#OpenId").text()),
                    "ParentId": $.trim($("#parentId").text()),
                    "t": "register"
                }, function (data) {
                    if (data == "2") {
                        var url = getQueryString("ul");
                        if (url != null && url != "") {
                            url = "resok.aspx?ul=" + encodeURIComponent(url);
                        } else {
                            url = "resok.aspx";
                        }
                        location.href = url;
                    }
                    else {
                        showMsg("span_msg1", data, false);
                    }
                })
            }
            //else {
            //    showMsg("span_msg1", "验证码不正确，请重新验证", false);
            //    $("#vcode").val("")
            //    $("#mcode").val("")
            //    return false;
            //}
        }

    }
}
//验证手机
function sendinfo() {
    //if ($("#relname").val() == "") {
    //    showMsg("span_msg1", "真实姓名不能为空！", false);
    //    $("#relname").focus()
    //    return false
    //} else if ($("#bodyCode").val() == "") {
    //    showMsg("span_msg1", "请输入身份证号！", false);
    //    $("#bodyCode").focus();
    //    return false;
    //} else if (!IdentityCodeValid($("#bodyCode").val())) {
    //    showMsg("span_msg1", "请输入正确有效身份证号！", false);
    //    $("#bodyCode").focus();
    //    return false;
    //} 
    $("#mcode").val("");
    var reg = /^[\u4E00-\u9FA5\uF900-\uFA2D\w-]*$/;
    var nickname = $.trim($("#txtnickname").val());
    if (nickname == "") {
        showMsg("span_msg1", "昵称不能为空", false);
        $("#txtnickname").focus();
        return false
    } else if (/^[0-9]*$/.test(nickname)) {
        showMsg("span_msg1", "昵称不能为纯数字", false);
        $("#txtnickname").focus();
        return false;
    } else if (!reg.test(nickname)) {
        showMsg("span_msg1", '昵称为3-20位字符,支持中文、字母、数字及"-"、"_"组合', false);
        $("#txtnickname").focus();
        return false;
    } else if (getStrLen(nickname) > 20 || getStrLen(nickname) < 3) {
        showMsg("span_msg1", '昵称为3-20位字符', false);
        $("#txtnickname").focus();
        return false;
    } else if ($("#mobile").val() == "") {
        showMsg("span_msg1", "手机号码不能为空！", false);
        $("#mobile").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("/ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "nickname": nickname,
            "mobile": $("#mobile").val(),
            "t": "existuM"
        }, function (data) {
            if (!isNaN(data)) {
                showMsg("span_msg1", "验证码发送成功！", false);
                ShowCountDown("btnMobile", 60);
                $("#mcode").val(data)
            } else {
                showMsg("span_msg1", data, false);
            }

        })
    }
}
//跳转到登陆页面
function GoToUrl() {
    setTimeout(function () {
        var url = getQueryString("ul");
        if (url != null && url != "") {
            url = decodeURIComponent(url);
        } else {
            url = "/u/PersonalCenter.aspx";
        }
        location.href = url;
    }, 5000)
}

/////////////////////重新发送验证//////////////////
function sendinfo1() {
    if (getQueryString("flag") == "forg") {
        $("#mcode").val("")
        if (Request.c == "") {
            showMsg("span_msg", "手机号码不能为空！", false);
            $("#mobile").focus()
            return false
        } else {
            t = Math.random() * 100
            $.post("ajax/UserInfoManageHandler.ashx?time=" + t + "", {
                //"bodycode": $("#bodycode").val(),
                "mobile": Request.c,// $("#mobileNum").val(),
                "t": "forget"
            }, function (data) {
                if (!isNaN(data)) {
                    showMsg("span_msg", "验证码发送成功！", false);
                    ShowCountDown("btnMobile", 60)
                    $("#mcode").val(data)
                } else {
                    showMsg("span_msg", data, false);
                }
            })
        }
    } if (getQueryString("flag") == "reg") {
        t = Math.random() * 100
        $.post("../ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "mobile": Request.c,
            "t": "sendinfo3"
        }, function (data) {
            if (!isNaN(data)) {
                showMsg("span_msg", "验证码发送成功！", false);
                ShowCountDown("btnMobile", 60);
                $("#mcode").val(data)
            } else {
                showMsg("span_msg", data, false);
                $("#vcode").val("")
            }
        })
    }
}

function sendShortMsg(mobile) {
    $("#mcode").val("");
    if (mobile == "") {
        showMsg("span_msg", "手机号码不能为空！", false);
        $("#mobile").focus()
        return false
    } else {
        //t = Math.random() * 100?time=" + t + "
        $.post("ajax/UserInfoManageHandler.ashx", {
            "mobile": mobile,
            "t": "forget"
        }, function (data) {
            if (!isNaN(data)) {
                showMsg("span_msg", "验证码发送成功！", false);
                location.href = "/SendVcode.aspx?c=" + mobile + "&mc=" + data + "&flag=forg&tttt=" + new Date().getTime();
                $("#mcode").val(data);
                // ShowCountDown("btnMobile", 60);                
            } else {
                showMsg("span_msg", data, false);
            }

        })
    }
}
/////////////////////////忘记密码 TAM 11.26///////////////////////////
function forgetPwdNext() {
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机号不能为空！", false);
        $("#mobile").focus()
        return false
    } else if ($("#vcode").val() == "") {
        showMsg("span_msg", "验证码不能为空！", false);
        $("#vcode").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("/ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "c": $("#vcode").val(),
            "t": "validCode"
        }, function (data) {
            if (data == "1") {
                alert("我们将发送验证码短信至：" + $("#mobile").val());
                sendShortMsg($("#mobile").val());
            } else {
                showMsg("span_msg", data, false);
                changeImage();
            }
        })
    }
}

///////////////////////找回密码New添加函数 TAM 11.26/////////////////////////
function forgetNext() {
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机号不能为空！", false);
        $("#mobile").focus()
        return false
    } else if ($("#vcode").val() == "") {
        showMsg("span_msg", "验证码不能为空！", false);
        $("#vcode").focus()
        return false
    } else {
        //alert("1:" + $("#vcode").val() + "2:" + Request.mc);//$("#mcode").val());
        if ($("#vcode").val() == Request.mc) {

            if (Request.flag == "forg")//密码找回
            {
                location.href = "ChangePas.aspx?c=" + Request.c + "";
            } else if (Request.flag == "reg")//注册输入密码 ParentId
            {
                location.href = "mSettingPwd.aspx?c=" + Request.c + "&openId=" + getQueryString("openId") + "&ParentId=" + getQueryString("ParentId") + "&un=" + getQueryString("un") + "";
            }
            //$("#bodycode").val("")
            $("#mobile").val("")
            $("#vcode").val("")
            $("#mcode").val("")
        } else {
            showMsg("span_msg", "验证码不正确！", false);
        }
    }
}

///////////////////////////////////TAM 11.26///////////////////////////////////
//设置密码
function chaseva(num) {
    if ($("#pas").val() == "") {
        showMsg("span_msg", "密码不能为空！", false);
        $("#pas").focus();
        return false
    } else if (!/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,16}$/.test($("#pas").val())) {
        showMsg("span_msg", "6~16位包含数字和字母 ", false);
        $("#pas").focus();
        return false;
    } else {
        t = Math.random() * 100
        $.post("ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "i": num,
            "p": $("#pas1").val(),
            "t": "cpass"
        }, function (data) {
            if (data == "ok") {
                showMsg("span_msg", "密码修改成功！", false);
                location.href = "Login.aspx"
            } else {
                showMsg("span_msg", data, false);
            }
        })
    }
}


//找回密码修改密码
function chaseva(num) {
    if ($("#pas").val() == "") {
        showMsg("span_msg", "新密码不能为空！", false);
        $("#pas").focus();
        return false
    } else if (!/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,16}$/.test($("#pas").val())) {
        showMsg("span_msg", "密码为6-16位字符,建议字母、数字和符号两种以上组合", false);
        $("#pas").focus();
        return false;
    } else if ($("#pas1").val() == "") {
        showMsg("span_msg", "确认密码不能为空！", false);
        $("#pas1").focus()
        return false
    } else if ($("#pas1").val() != $("#pas").val()) {
        showMsg("span_msg", "两次输入密码不一致，请重新输入！", false);
        $("#pas1").val("")
        $("#pas1").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "i": num,
            "p": $("#pas1").val(),
            "t": "cpass"
        }, function (data) {
            if (data == "ok") {
                showMsg("span_msg", "密码修改成功！", false);
                location.href = "Login.aspx"
            } else {
                showMsg("span_msg", data, false);
            }
        })
    }
}
////////////////////安全设置////////////////////
//更新密码
function updatepass(obj) {
    if ($("#ppass").val() == "") {
        showMsg("span_msg", "原始密码不能为空！", false);
        $("#ppass").focus()
        return false
    } else if ($("#npass").val() == "") {
        showMsg("span_msg", "新密码不能为空！", false);
        $("#npass").focus()
        return false
    } else if (!/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,20}$/.test($("#npass").val())) {
        showMsg("span_msg", "密码为6-16位字符,建议字母、数字和符号两种以上组合", false);
        $("#npass").focus()
        return false;
    } else if ($("#npass1").val() == "") {
        showMsg("span_msg", "确认密码不能为空！", false);
        $("#npass1").focus()
        return false
    } else if ($("#npass1").val() != $("#npass").val()) {
        showMsg("span_msg", "两次输入密码不一致，请重新输入！", false);
        $("#npass1").val("")
        $("#npass1").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("../ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "i": obj,
            "p": $("#ppass").val(),
            "np": $("#npass1").val(),
            "t": "uppass"
        }, function (data) {
            if (data == "ok") {
                showMsg("span_msg", "密码修改成功！", false);
                location.href = "/Login.aspx"
            } else {
                showMsg("span_msg", data, false);
                $("#ppass").val("")
                $("#npass").val("")
                $("#npass1").val("")
            }
        })
    }
}
//原始手机号
function sendinfo2(obj) {
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机号不能为空！", false);
        $("#mobile").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("../ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "i": obj,
            "mobile": $("#mobile").val(),
            "t": "sendinfo2"
        }, function (data) {
            if (!isNaN(data)) {
                showMsg("span_msg", "验证码发送成功！", false);
                ShowCountDown("btnMobile", 60);
                $("#mcode").val(data)
            } else {
                showMsg("span_msg", data, false);
                $("#mobile").val("")
                $("#vcode").val("")
            }
        })
    }
}
//原始手机号
function updatemobile() {
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机号不能为空！", false);
        $("#mobile").focus()
        return false
    } else if ($("#vcode").val() == "") {
        showMsg("span_msg", "验证码不能为空！", false);
        $("#vcode").focus()
        return false
    } else {
        if ($("#vcode").val() == $("#mcode").val()) {
            location.href = "UpdateNewsMobile.aspx"
            $("#mobile").val("")
            $("#vcode").val("")
            $("#mcode").val("")
        } else {
            showMsg("span_msg", "验证码不正确！", false);
            $("#mobile").val("")
            $("#vcode").val("")
            $("#mcode").val("")
        }
    }
}
//新手机号验证
function sendinfo3(obj) {
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机号不能为空！", false);
        $("#mobile").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("../ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "i": obj,
            "mobile": $("#mobile").val(),
            "t": "sendinfo3"
        }, function (data) {
            if (!isNaN(data)) {
                showMsg("span_msg", "验证码发送成功！", false);
                if (obj == 0) {
                    alert("我们将发送验证码短信至：" + $("#mobile").val());
                    location.href = "/SendVcode.aspx?c=" + $("#mobile").val() + "&mc=" + data + "&openId=" + $("#ltlOpenId").val() + "&ParentId=" + $("#ltlParentId").val() + "&un=" + $("#username").val() + "&flag=reg&ttt=" + new Date().getTime();
                }
                ShowCountDown("btnMobile", 60);
                $("#mcode").val(data)
            } else {
                showMsg("span_msg", data, false);
                $("#mobile").val("")
                $("#vcode").val("")
            }
        })
    }
}
//保存更新手机号码
function updatenewsmobile(obj) {
    if ($("#mobile").val() == "") {
        showMsg("span_msg", "手机号不能为空！", false);
        $("#mobile").focus()
        return false
    } else if ($("#vcode").val() == "") {
        showMsg("span_msg", "验证码不能为空！", false);
        $("#vcode").focus()
        return false
    } else {
        if ($("#vcode").val() == $("#mcode").val()) {
            t = Math.random() * 100
            $.post("../ajax/UserInfoManageHandler.ashx?time=" + t + "", {
                "i": obj,
                "mobile": $("#mobile").val(),
                "t": "upnewsmobile"
            }, function (data) {
                showMsg("span_msg", data, false);
                $("#mobile").val("")
                $("#vcode").val("")
                $("#mcode").val("")
                location.href = "PersonalCenter.aspx"
            })
        }
        else {
            showMsg("span_msg", "验证码不正确！", false);
            $("#mobile").val("")
            $("#vcode").val("")
            $("#mcode").val("")
        }
    }
}
//更新邮箱
function updateemail(obj) {
    if ($("#email").val() == "") {
        showMsg("span_msg", "邮箱不能为空！", false);
        $("#email").focus()
        return false
    } else {
        t = Math.random() * 100
        $.post("../ajax/UserInfoManageHandler.ashx?time=" + t + "", {
            "i": obj,
            "email": $("#email").val(),
            "t": "upemail"
        }, function (data) {
            showMsg("span_msg", data, false);
            $("#email").val("")
        })
    }
}


//手机验证码1分钟获取一次
var interval = 1000;
function ShowCountDown(btnId, num) {
    num = num - 1;
    $("#" + btnId).attr("value", (num) + "秒再次获取");
    // $("#" + btnId).attr("value", (num));
    if (num != 0) {
        window.setTimeout(function () { ShowCountDown(btnId, num); }, interval);
        $("#" + btnId).attr("disabled", "disabled");
    } else {
        $("#" + btnId).removeAttr("disabled");
        $("#" + btnId).attr("value", "发送验证码");
    }
}

//通过名称获取地址栏值
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}