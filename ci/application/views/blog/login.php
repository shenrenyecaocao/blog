
<div class="col-md-4">
    <div class="contain" id="login">
        <br />
        <p align="center"><font size="6">小伙伴请登录！</font></p>
        <div id="login1">
        <?php
            echo validation_errors();
        ?>
        <?php
            echo form_open('login');
        ?>
             <div class="form-group">
             <br /><br />
             <label for="username" class="col-sm-2 control-label">名字</label>
                 <div class="col-sm-10">
                     <input type="text" class="form-control" name="username"
                       value="<?php echo set_value('username');?>" placeholder="请输入名字"/>
                </div>
             </div>
            <div class="form-group">
                <br /><br /><br />
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" name="password"
                       placeholder="请输入密码"/>
                 </div>
            </div>
            <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10">
                 <div class="checkbox">
                    <label>
                        <input type="checkbox"> 请记住我
                    </label>
                 </div>
                 </div>
            </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
                <button type="button" name="submit" class="btn btn-default"
                        id="submit" onclick="javascript:log_in('<?php echo site_url("blog/login1");?>')">
                    登录</button>
            </div>
            <div class="col-sm-offset-1 col-sm-1">
                <a href="<?php echo site_url("blog/forget");?>"><button type="button" name="submit" class="btn btn-default">
                        忘记密码</button></a>
            </div>
         </div>

        </form>
        </div>
    </div>
</div>