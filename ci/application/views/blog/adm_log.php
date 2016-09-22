
<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-9">
                <?php
                echo validation_errors();
                ?>
                <?php
                echo form_open('admin/log_in');
                ?>
            <div class="form-horizontal">
                <div class="form-group">
                    <br />
                    <br />
                    <label for="inputEmail3" class="col-sm-2 control-label">用户ID</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <input type="submit" class="btn btn-default" value="登录"/>
                    </div>
                    <div class="col-sm-offset-0 col-sm-5">
                        <p><strong><?php echo $error;?></strong><p/>
                    </div>
                </div>
                </div>
            </form>

        </div>
    </div>
</div>

