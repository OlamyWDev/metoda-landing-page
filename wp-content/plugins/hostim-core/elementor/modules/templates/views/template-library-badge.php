<script type="text/template" id="hostim-liteTemplateLibrary_templates">
	<div id="liteTemplateLibrary_toolbar">
		<div id="liteTemplateLibrary_toolbar-search">
			<label for="liteTemplateLibrary_search" class="elementor-screen-only"><?php esc_html_e( 'Search Templates:', 'hostim-core' ); ?></label>
			<input id="liteTemplateLibrary_search" placeholder="<?php esc_attr_e( 'Search', 'hostim-core' ); ?>">
			<i class="eicon-search"></i>
		</div>
		<div id="liteTemplateLibrary_toolbar-counter"></div>
		
		<div id="liteTemplateLibrary_toolbar-filter" class="liteTemplateLibrary_toolbar-filter">
			<# if (hostim.library.getTypeTags()) { var selectedTag = hostim.library.getFilter( 'tags' ); #>
				<# if ( selectedTag ) { #>
				<span class="liteTemplateLibrary_filter-btn">{{{ hostim.library.getTags()[selectedTag] }}} <i class="eicon-caret-right"></i></span>
				<# } else { #>
				<span class="liteTemplateLibrary_filter-btn"><?php esc_html_e( 'Filter', 'hostim-core' ); ?> <i class="eicon-caret-right"></i></span>
				<# } #>
				<ul id="liteTemplateLibrary_filter-tags" class="liteTemplateLibrary_filter-tags">
					<li data-tag="">All</li>
					<# _.each(hostim.library.getTypeTags(), function(slug) {
						var selected = selectedTag === slug ? 'active' : '';
						#>
						<li data-tag="{{ slug }}" class="{{ selected }}">{{{ hostim.library.getTags()[slug] }}}</li>
					<# } ); #>
				</ul>
			<# } #>
		</div>
	</div>

	<div class="liteTemplateLibrary_templates-window">
		<div id="liteTemplateLibrary_templates-list"></div>
	</div>
</script>