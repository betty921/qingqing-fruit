<?php
$this->title = '青青果园-用户注册';
?>

<link href="css/register.css" rel="stylesheet">


<div class="main-body">
    <div class="register-title">注册会员</div>
    <div class="register-body">
        <div class="register-left">
            <img src="images/huiyuan.jpg">
            <div class="btn-login">
                <a href="?r=user/login">会员登录 &gt;</a>
            </div>
        </div>
        <div class="register-right">
            <form action="?r=user/register" method="post">
                <div class="form-group">
                    <div class="form-lable">手机号</div>
                    <div class="form-value">
                        <input type="text" name="user_phone" onblur="CheckPhone();" value="<?= empty($user_phone)?'':$user_phone ?>">
                    </div>
                    <img id="user_phone_tag" style="margin-left: 10px;width: 32px" src="">
                </div>
                <div class="form-group">
                    <div class="form-lable">密码</div>
                    <div class="form-value">
                        <input type="password" name="user_passwd" placeholder="请输入6-20位号码字符" onblur="Gou();">
                    </div>
                    <img id="gou" style="margin-left: 10px;width: 32px" src="">
                </div>
                <div class="form-group">
                    <div class="form-lable">确认密码</div>
                    <div class="form-value">
                        <input type="password" name="ckpassword" placeholder="请输入6-20位号码字符" onblur="CheckPwd()">
                    </div>
                    <img id="checkpwd" style="margin-left: 10px;width: 32px" src="">
                </div>
                <div class="form-group">
                    <div class="form-lable">手机验证码</div>
                    <div class="form-value">
                        <div class="verify-code">
                            <input type="text" name="verify_phone_code">
                            <span onclick="getVerifyCode(this)">获取验证码</span>
                        </div>
                    </div>
                    <img id="verify_phone_code_img" style="margin-left: 10px;width: 32px" src="">
                </div>
                <div class="form-group">
                    <div class="form-lable"></div>
                    <div class="form-value">
                        <a class="btn-register" href="javascript:void(0)" onclick="FormSubmit();">注册</a>
                        <a class="btn-login-rg" href="?r=user/login">会员登录</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-lable"></div>
                    <div class="form-value">
                        <span class="errormsg"><?= empty($errmsg)?'':$errmsg ?></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
function CheckPhone() {
    var user_phone = $('[name=user_phone]').val();
    if($.trim(user_phone) == '') {
        $('.errormsg').text('手机号码不能为空');
        $('#user_phone_tag').attr('src', 'images/cha.svg');
        return;
    }
    $.ajax({
        url: '?r=user/check-phone',
        data: 'user_phone='+user_phone,
        dataType: 'json',
        type: 'post',
        success: function (respData) {
            var code = parseInt(respData.code);
            if(code == <?= \common\common\ErrDesc::ERR_PHONE_EXIST ?>) {
                $('.errormsg').text('该手机号已经注册,请登录');
                $('#user_phone_tag').attr('src', 'images/cha.svg');
                return;
            }
            $('#user_phone_tag').attr('src', 'images/gou.svg');
            $('.errormsg').text('');
        },
        error: function (msg) {

        }
    });
}
function Gou() {
    var pwd1 = $.trim($('[name=user_passwd]').val());
    if(pwd1 == '') {
        $('.errormsg').text('密码不能为空');
        $('#gou').attr('src', 'images/cha.svg');
        return;
    }
    $('#gou').attr('src', 'images/gou.svg');
}
function CheckPwd() {
    var pwd1 = $.trim($('[name=user_passwd]').val());
    var pwd2 = $.trim($('[name=ckpassword]').val());
    if(pwd1 != pwd2 || pwd1 == '') {
        $('.errormsg').text('两次密码不一致');
        $('#gou').attr('src', 'images/cha.svg');
        $('#checkpwd').attr('src', 'images/cha.svg');
        return;
    }
    $('.errormsg').text('');
    $('#gou').attr('src', 'images/gou.svg');
    $('#checkpwd').attr('src', 'images/gou.svg');
}
var time = 60;
function getVerifyCode(elem) {
    if(time > 0 && time < 60)
        return;
    var user_phone = $('[name=user_phone]').val();
    if(user_phone == '') {
        $('.errormsg').text('手机号码不能为空');
        $('#user_phone_tag').attr('src', 'images/cha.svg');
        return;
    }
    $(elem).text(time + '秒后重新发送');
    $(elem).css('backgroundColor','#999');
    var timer = setInterval(function () {
        time --;
        $(elem).text(time + '秒后重新发送');
        if(time == 0) {
            clearInterval(timer);
            time = 60;
            $(elem).text('获取验证码');
            $(elem).css('backgroundColor','#64a131');
        }
    }, 1000);
    $.ajax({
        url: '?r=user/verify-code',
        data: 'user_phone='+user_phone,
        dataType: 'json',
        type: 'post',
        success: function (respData) {
            var code = parseInt(respData.code);
            if(code != <?= \common\common\ErrDesc::OK ?>) {
                $('.errormsg').text('网络故障');
                return;
            }
            console.log('xx');
            $('.errormsg').text('');
        },
        error: function (msg) {
            $('.errormsg').text('网络故障');
        }
    })

}
function FormSubmit() {
    var user_phone = $('[name=user_phone]').val();
    if(user_phone == '') {
        $('.errormsg').text('手机号码不能为空');
        $('#user_phone_tag').attr('src', 'images/cha.svg');
        return;
    }
    var pwd1 = $('[name=user_passwd]').val();
    var pwd2 = $('[name=ckpassword]').val();
    if(pwd1 != pwd2) {
        $('.errormsg').text('两次密码不一致');
        $('#gou').attr('src', 'images/cha.svg');
        $('#checkpwd').attr('src', 'images/cha.svg');
        return;
    }
    var verify_phone_code = $('[name=verify_phone_code]').val();
    if(verify_phone_code == '') {
        $('.errormsg').text('验证码不能为空');
        $('#verify_phone_code_img').attr('src', 'images/cha.svg');
        $('#verify_phone_code_img').attr('src', 'images/cha.svg');
        return;
    }

    $('form').submit();
}    
</script>

<script>
<?php if(!empty($actionOK)): ?>
KingAlert({
    title: '注册成功, 请登录',
    okFun: function () {
        location.href = '?r=user/login';
    },
    cancelFun: function () {
        location.href = '?r=user/login';
    }
});
<?php endif;?>
</script>