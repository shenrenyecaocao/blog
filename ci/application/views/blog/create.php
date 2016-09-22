<div class="container-fluid">
    <div class="col-md-8">
        <div class="col-md-1"></div>
        <div class="col-md-7">

            <h2><?php echo $title; ?></h2>

            <?php echo validation_errors(); ?>

            <?php echo form_open('blog/create'); ?>

            标题: <input type="text" name="titles" cols="50">
                    <br /><br />
                内容:
                <br /><textarea name="content" rows="18" cols="100"></textarea>
                <br><br>
            <select name="topical">
                <option value="shenghuo">生活</option>
                <option value="keji">科技</option>
                <option value="gongzuo">工作</option>
                <option value="junshi">军事</option>
                <option value="lunli">伦理</option>
                <option value="tiyu">体育</option>
                <option value="shishang">时尚</option>
                <option value="jiaoyu">教育</option>
                <option value="zhengzhi">政治</option>
            </select>

                <input type="submit" name="submit" value="发布主题">
            </form>
        </div>
    </div>