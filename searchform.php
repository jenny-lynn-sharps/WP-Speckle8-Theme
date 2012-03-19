<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="text" onfocus="if(this.value == 'Looking for something?') { this.value = ''; }" name="s" id="search" onblur="if(this.value == '') { this.value = 'Looking for something?'; }" name="s" id="search" value="Looking for something?" />
    <!--<input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />-->
</form>
