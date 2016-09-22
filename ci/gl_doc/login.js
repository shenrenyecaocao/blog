/**
 * Created by Administrator on 2016/9/11.
 */
function log_in(site_url){
    $(document).ready(function(){
        $("#submit").click(function(){
            $.ajax({
                type: "post",
                url:"http://localhost/web/ci/index.php/blog/login1",
                // url:site_url,
                async:true,//默认为true 异步
                //1.使用JSON.stringify 否则格式为 a=2&b=3...
                //2.需要强制类型转换，否则格式为:{"a":"2","b":"3"}
                data:JSON.stringify({
                    username: parseInt($('input[name="username"]').val()),
                    password: parseInt($('input[name="password"]').val()),
                    now: new Date().getTime()
                }),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success:function(data){
                    // alert(data.name);
                    $('#login1').text(
                        // <b>+
                        "用户："+ data.name +"你好！"
                        // +</b>
                    );//在ID为login出显示登录信息
                }
            })
        })
    })
}
