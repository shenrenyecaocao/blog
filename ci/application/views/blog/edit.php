<div class="container-fluid">
    <div class="col-md-8">
        <div class="col-md-1"></div>
        <div class="col-md-7">

            <h2><?php echo $title; ?></h2>

            <?php echo validation_errors(); ?>

            <?php echo form_open('blog/update'.'/'.$id); ?>

            标题: <input type="text" name="titles" value="<?php echo $titles;?>" cols="50">
            <br /><br />
            内容:
            <br /><textarea name="content" rows="18" cols="100"><?php echo $content;?></textarea>
            <br><br>
            <select name="topical">
                <option value="shenghuo" <?php echo $shenghuo;?> >生活</option>
                <option value="keji" <?php echo $keji;?> >科技</option>
                <option value="gongzuo" <?php echo $gongzuo;?> >工作</option>
                <option value="junshi" <?php echo $junshi;?> >军事</option>
                <option value="lunli" <?php echo $lunli;?> >伦理</option>
                <option value="tiyu" <?php echo $tiyu;?> >体育</option>
                <option value="shishang"<?php echo $shishang;?> >时尚</option>
                <option value="jiaoyu" <?php echo $jiaoyu;?> >教育</option>
                <option value="zhengzhi" <?php echo $zhengzhi;?> >政治</option>
            </select>

            <input type="submit" name="submit" value="发布主题">
            </form>
        </div>
    </div>