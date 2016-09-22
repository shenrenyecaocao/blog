<div class="container-fluid">
    <div class="col-md-1"></div>
    <div class="col-md-7">

        <?php
            echo validation_errors();
        ?>
        <?php
            echo form_open('reg');
        ?>
            <label for="exampleInputName2">姓名:</label>
            <input type= "text" name= "name" value="<?php echo set_value('name');?>"/>
            <br /><br />

            <label for="exampleInputName2">用户名:</label>
            <input type= "text" name= "username" value="<?php echo set_value('username');?>"/>
            <br /><br />

            <label for="exampleInputName2">密码:</label>
            <input type= "password" name= "password" value=""/>
            <br /><br />

            <label for="exampleInputName2">确认密码:</label>
            <input type= "password" name= "confirm" value=""/>
            <br /><br />

            <label for="exampleInputName2">你的幸运数是多少？</label>
            <input type= "number" name= "m_question" value="<?php echo set_value('m_question');?>"/>
            <br /><br />

            <label for="exampleInputName2"> 密保邮箱：</label>
            <input type= "email" name= "m_email" value="<?php echo set_value('m_email');?>"/>
            <br /><br />

            <input type= "submit" name= "submit" value= "提交"/>

        </form>

    </div>
