

<div class="col-md-4" id="picture">
    <div class="contain1">
        <br />
        <p align="center"><font size="6">机智的小伙伴！</font></p>
        <table align="center">
            <tr>
                <th>用户：<?php echo $name;?>你好！</th>
                <td>
                    <img src="<?php echo base_url('picture').'/'.$pic_name;?>"
                         width="80" height="80" id="pic" class="img-circle"/>
                    <a href="<?php echo site_url('blog/picture')?>">头像</a>
                </td>
            </tr>
            <tr>
                <td colspan="2"><a href="<?php echo site_url('sign_out');?>">退出</a></td>
            </tr>
        </table>
    </div>
</div>

