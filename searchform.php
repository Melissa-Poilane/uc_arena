<form method="get" id="form" action="<?php echo esc_url(home_url('/')); ?>">
  <input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" placeholder="Rechercher...">
  <input type="submit" id="submit" value="Rechercher">
</form>
