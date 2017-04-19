/**
 * Created by chinnsyoukich on 2017/4/19.
 */

$(document).ready(function(){
    //看不清点击刷新验证码
   $("#checkcode").click(function(){
      this.src = 'checkcode.php?tm='+Math.random();
    });


    //验证表单
   var validator = $("#sighupForm").validate({
        //debug:true,
        rules:{
           username:{
               required:true,
               minlength:5
           },
            password:{
                required:true,
                minlength:5
            },
            passwordAgain:{
                required:true,
                minlength:5,
                equalTo:"#password"
            },
            checkcode:{
                required:true,
                maxlength:4
            }
        }

    });

    ////重置验证，并没什么用。。。
    //$("#reset").click(function() {
    //    validator.resetForm();
    //});


});