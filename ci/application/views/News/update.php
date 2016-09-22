<main class="container">
	<h2><?php echo $news_item['title']; ?></h2>

	<?php echo validation_errors(); ?>

	<?php echo form_open('news/update/'.$news_item['slug']); ?>
		<div class="row">
	        <div class="input-field col s12">
	          <input value="<?php echo $news_item['title'] ?>" id="title" name="title" type="text" class="validate">
	          <label for="title">Гарчиг</label>
	        </div>
      	</div>

	    <div class="row">
	        <div class="input-field col s12">
	          <textarea id="textarea" rows="10" name="text"><?php echo $news_item['text'] ?></textarea>
	        </div>
      	</div>
	  <button class="btn waves-effect waves-light" type="submit" name="action">Мэдээг засах
	    <i class="material-icons right">send</i>
	  </button>
	</form>
</main>
