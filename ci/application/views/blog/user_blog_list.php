

<div class="col-md-4" style="text-indent:4em">
    <div class="contain">
        <p align="center"><?php echo anchor('blog/create', '创建博客');?> </p>
    <?php foreach ($list as $con): ?>
        <table>

            <tr>
                <td><a href="<?php echo site_url('blog/view'.'/'.$con['id']); ?>">
                        <?php echo $con['titles'];?></a></td>
                <td><a href="<?php echo site_url('blog/edit'.'/'.$con['id']); ?>">编辑</a></td>
                <td align="lift"><?php echo $con['update_time'];?></td>
            </tr>
        </table>
    <?php endforeach; ?>
    </div>
</div>