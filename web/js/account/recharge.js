// 下面是抄的
    $(document).ready(function () {
        //$("#aibankform").validationEngine();
        $("#Amount").keyup(function () {
            if (false) {
                $("#content_nav").append("<div id='reg_error_box_" + $("#Amount").attr('name') + "'  class='register_float_box' style=\"display: none;\"><div>充值大于1000，使用\"非即时到帐充值\"，帮您节省手续费。</div><span></span></div>");

                $("#reg_error_box_" + $("#Amount").attr('name')).css('top', $("#Amount").offset().top - 39).css('left', $("#Amount").offset().left + 20).fadeIn('slow');
                $("#Amount").css('border', '1px solid red');
                return false;
            } else {
                $("#Amount").css('border', '1px solid #8db3ca');
                $("#reg_error_box_" + $("#Amount").attr('name')).each(function () {
                    $(this).fadeOut('slow');
                    setTimeout(function () { $("#reg_error_box_" + $("#Amount").attr('name')).remove(); }, 500);
                });
            }
        });

        $(".card_nav").find('span').each(function () {
            $(this).css('cursor', 'pointer').live('click', function () {
                var thisbank;
                if ($(this).parent().prev().attr('type') != 'radio') {
                    $(this).parent().prev().find("input[type='radio']").attr('checked', 'checked');
                    thisbank = $(this).attr('class')//$(this).css('backgroundImage').split('(')[1].split(')')[0];
                } else {
                    $(this).parent().prev("input[type='radio']").attr('checked', 'checked');
                    thisbank = $(this).find('img').attr('src');
                }
                if ($(".card").css('display') == 'none') {
                    $('.bank_nav').hide();
                    if ($(this).parent().parent().parent().parent().parent().parent().attr('class') == 'bank p1') {
                        $('.card').show().find('tr').html("<td width=\"19\"><input type=\"radio\" checked=\"checked\"/></td><td><span class=" + thisbank + " style=\"cursor: pointer;\"></span></td><td><div class=\"morebank\">选择其他充值方式<img src=\"http://www.ppdaicdn.com/img/admin/roll.png\"></div></td>");
                        var channel = $(this).parent().prev().find('input').attr('channel');
                        $("#txtChannel").val(channel);
                        $("#txtBank").val($(this).parent().prev().find('input').val());
                        $("#aibankform").attr('action', '/inpour');
                        $.cookie("LastChannel", channel);
                        $.cookie("LastBankCode", $(this).parent().prev().find('input').val());
                    } else {
                        $('.card').show().find('tr').html("<td width=\"19\"><input type=\"radio\" checked=\"checked\"/></td><td><img style=\"border: 1px solid #CCC;\" src=" + thisbank + " /></td><td><div class=\"morebank\">选择其他充值方式<img src=\"http://www.ppdaicdn.com/img/admin/roll.png\"></div></td>");
                        var channel = $(this).parent().parent().attr('channel');
                        if (channel == 'alipay') {
                            $("#aibankform").attr('action', '/selectalipaybank');
                        } else if (channel == 'sft') {
                            $("#aibankform").attr('action', '/selectsftbank');
                        }
                        $("#txtChannel").val(channel + "_bank");
                        $("#txtBank").val($(this).parent().prev('input').val());
                        $.cookie("LastBankImage", thisbank);
                        $.cookie("LastBankCode", $(this).parent().prev('input').val());
                        $.cookie("LastChannel", channel + "_bank");

                    }
                } else {
                    var channel = $(this).parent().prev().find('input').attr('channel');
                    $("#txtChannel").val(channel);
                    $("#txtBank").val($(this).parent().prev().find('input').val());
                    $("#aibankform").attr('action', '/inpour');
                    $.cookie("LastChannel", channel);
                    $.cookie("LastBankCode", $(this).parent().prev().find('input').val());
                    $('.card').show().find('tr').html("<td width=\"19\"><input type=\"radio\" checked=\"checked\"/></td><td><span class=" + thisbank + " style=\"cursor: pointer;\"></span></td><td><div class=\"morebank\">选择其他充值方式<img src=\"http://www.ppdaicdn.com/img/admin/roll.png\"></div></td>");
                }
                if ($("#Amount").val() != '0') {
                    ChangeAmount();
                }
            });
        });
        $(".rechargenew_content").find('input[type="radio"]').each(function () {
            $(this).live('click', function () {
                if ($(this).attr("channel") == "alipay" || $(this).attr("channel") == "tenpay") {
                    $(this).parent().next().find('span').click();
                } else {
                    $(this).next().find('img').click();
                }
            });
        });



    $("#Amount").keydown(function (e) {
        var key = [8, 37, 39, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 110, 190];
        if ($.inArray(e.which, key) < 0) {
            return false;
        }
    });
    $("#Amount").keyup(ChangeAmount);
    //$("#Amount").change(checkAmount);
    $("#Amount").blur(checkAmount);
    $("#btnOk").click(function () {
        var amount = $('input[id=Amount]').val();
        if (amount.length < 1) {
            $(".error").html("请输入金额");
            updateAmount(0);
            return false;
        }
        if (!/^\d+(\.\d{1,2})?$/.test(amount)) {
            $(".error").html("请输入正确金额");
            updateAmount(0);
            return false;
        }
        if ($("input[type='radio']:checked").length < 1) {
            $(".error").html("请选择充值方式");
            return false;
        }
        if (checkAmount()) {
            $("#aibankform").submit();
        }
    });

    function checkAmount(e) {
        $(".error").html("");
        var amount = $('input[id=Amount]').val();
        if (amount.length < 1) {
            updateAmount(0);
            return false;
        }
        if (!/^\d+(\.\d{1,2})?$/.test(amount)) {
            $(".error").html("请输入正确金额");
            updateAmount(0);
            return false;
        }
        var factAmount = parseFloat(amount);
        var freeAmount = parseFloat($("#txtFreeAmount").val());
        if (factAmount <= 0.01) {
            $(".error").html("充值金额需大于0.01元");
            updateAmount(0);
            return false;
        }
        if (factAmount > 10000000) {
            $(".error").html("充值金额需小于10000000元");
            updateAmount(0);
            return false;
        }
        return ChangeAmount();
        return true;
    }

    function ChangeAmount() {
        var amount = parseFloat($('input[id=Amount]').val());
        if (isNaN(amount)) {
            $(".error").html("");
            updateAmount(0);
            return false;
        }
        var freeAmount = parseFloat($("#txtFreeAmount").val());
        var factAmount = amount;
        var amountCharge = factAmount;
        var amountFree = 0;
        if (freeAmount != undefined && freeAmount > 0) {
            if (freeAmount >= factAmount) {
                amountCharge = 0;
                amountFree = factAmount;
            } else {
                amountCharge = factAmount - freeAmount;
                amountFree = freeAmount;
            }
        }
    }

    function updateAmount(factAmount) {
        $('#factAmount').html(factAmount.toFixed(2) + "元");
        factAmount = parseFloat($('input[id=currentAmount]').val()) + factAmount;
        $('#AfterInpourAmount').html('￥' + factAmount.toFixed(2));
        $("#fee").html((Number($("#Amount").val()) - Number($("#factAmount").html().split('元')[0])).toFixed(2));
    }

    function IsNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }


    //选中导航 
    $("#10003").attr('class', 'tabon');
    $("#10003012").attr('class', 'li_on');
    //visitlog
    $.post("/visitlog", { typeid: 2, remark: '2', checkExist: true });