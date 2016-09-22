
<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <br />
            <?php foreach ($blog_table as $blog_item): ?>
                <table>
                    <tr>
                        <td align="lift"><a href="<?php echo site_url('admin/index'.'/'.$blog_item['id']); ?>">
                                <p> <font size="6"><?php echo $blog_item['titles']; ?></font></p>  <!--博客标题-->
                            </a></td>
                    </tr>
                    <tr><td colspan="6" align="lift">
                            <div class="main" style="text-indent:2em">
                                <p><font size="5"><?php echo $blog_item['content']; ?></font></p><!--博客的内容-->
                            </div></td></tr>
                    <tr><td colspan="2" align="center">
                            <p>作者：<?php echo $blog_item['name'];?></p></td>
                        <td colspan="2"><p>时间：<?php echo $blog_item['update_time'];?></p></td>
                        <td colspan="2" align="lift"><a href="<?php echo site_url('admin/delete'.'/'.$blog_item['id']);?>"><p>删除</p></a></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <nav>
                <ul class="pagination">
                    <li><a href="<?php echo site_url('admin_page/home_page');?>">首页</a></li>
                    <li><a href="<?php echo site_url('admin_page/prev');?>">&laquo;<span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('admin_page/next');?>">&raquo;<span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('admin_page/last_page');?>">末页</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>


