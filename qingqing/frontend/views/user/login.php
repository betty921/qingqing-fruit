<?php
$this->title = '青青果园-用户登录';
?>

<link href="css/register.css" rel="stylesheet">

<div class="main-body">
    <div class="register-title">注册会员</div>
    <div class="register-body">
        <div class="register-left">
            <img src="images/huiyuan.jpg">
            <div class="btn-login">
                <a href="?r=user/register">会员注册 &gt;</a>
            </div>
        </div>
        <div class="register-right">
            <form class="login-form" action="?r=user/login" method="post">
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
                        <input type="password" name="user_passwd" placeholder="请输入6-20位号码字符">
                    </div>
                    <img id="gou" style="margin-left: 10px;width: 32px" src="">
                </div>
                <div class="form-group">
                    <div class="form-lable"></div>
                    <div class="form-value forgetpsd">
                        <input type="checkbox" value=""><span>记住密码</span>
                        <a href="#">忘记密码？快捷登录</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-lable"></div>
                    <div class="form-value">
                        <a class="btn-register" href="javascript:void(0);" onclick="Login();">登录</a>
                        <a class="btn-login-rg" href="?r=user/register">会员注册</a>
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
    if(user_phone == '') {
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
                $('.errormsg').text('');
                $('#user_phone_tag').attr('src', 'images/gou.svg');
                return;
            }
            $('#user_phone_tag').attr('src', 'images/cha.svg');
            $('.errormsg').text('该手机号还未注册，请先注册');
        },
        error: function (msg) {

        }
    });
}

function Login() {
    var user_phone = $('[name=user_phone]').val();
    if($.trim(user_phone) == '') {
        $('.errormsg').text('手机号码不能为空');
        $('#user_phone_tag').attr('src', 'images/cha.svg');
        return;
    }
    var pwd1 = $('[name=user_passwd]').val();
    if($.trim(pwd1) == '') {
        $('.errormsg').text('密码不能为空');
        $('#gou').attr('src', 'images/cha.svg');
        return;
    }
    $('form').submit();
}    
</script>


<script>
    <?php if(!empty($actionOK)): ?>
    KingAlert({
        title: '登录成功',
        okFun: function () {
            location.href = '?r=site/index';
        },
        cancelFun: function () {
            location.href = '?r=site/index';
        }
    });
    <?php endif;?>
</script>