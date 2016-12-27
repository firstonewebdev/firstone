<form role="search" method="get" action="<?php echo home_url('/'); ?>">
	<input type="search" 
		   class="form-control sidebar-search" 
		   placeholder="Search" 
		   value="<?php echo get_search_query();?>" 
		   name="s" 
		   title="Search" />
</form>