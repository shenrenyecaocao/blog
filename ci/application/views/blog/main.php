
<div class="container-fluid">
    <div class="col-md-8">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <br />
            <?php foreach ($blog_table as $blog_item): ?>
                <table>
                    <tr>
                    <td align="lift"><a href="<?php echo site_url('blog/view'.'/'.$blog_item['id']); ?>">
                        <p> <font size="6"><?php echo $blog_item['titles']; ?></font></p>  <!--博客标题-->
                    </a></td>
                    </tr>
                    <tr><td colspan="5" align="lift">
                <div class="main" style="text-indent:2em">
                    <p><font size="5"><?php echo $blog_item['content']; ?></font></p><!--博客的内容-->
                </div></td></tr>
                    <tr><td colspan="3" align="center">
                <p>作者：<?php echo $blog_item['name'];?></p></td>
                        <td colspan="2"><p>时间：<?php echo $blog_item['update_time'];?></p></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <nav>
                <ul class="pagination">
                    <li><a href="<?php echo site_url('page/home_page');?>">首页</a></li>
                    <li><a href="<?php echo site_url('page/prev');?>">&laquo;<span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('page/next');?>">&raquo;<span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('page/last_page');?>">末页</a></li>
                </ul>
            </nav>
        </div>
    </div>


