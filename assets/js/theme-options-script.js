jQuery('#settingsNav a').click(function(e) {
	e.preventDefault();
	var target_section_id = jQuery(this).attr('data-target-section');
	var target_section = jQuery('#'+target_section_id);
	var displayer = jQuery('#settings_displayer');
	displayer.html(target_section.html());
});