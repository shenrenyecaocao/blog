
<div class="container-fluid">
    <div class="col-md-8">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="contain1" id="login">
                <br />
                <p align="center"><font size="6">机智的小伙伴！</font></p>
                <?php echo $error;?>
                <?php echo form_open_multipart('blog/pic_succ');?>
                <table align="center">
                    <tr>
                        <th><input type="file" name="userfile" size="20" /></th>
                        <br />
                        <br />
                        <th><input type="submit" value="ok" /></th>
                    </tr>

                </table>
                </from>
            </div>

        </div>
    </div>


