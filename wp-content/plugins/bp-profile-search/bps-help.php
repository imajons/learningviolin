<?php

function bps_help ()
{
    $screen = get_current_screen ();

	$title_00 = __('Overview', 'bp-profile-search');
	$content_00 = '
<p>'.
__('Configure your profile search form, then display it:', 'bp-profile-search'). '
<ul>
<li>'. sprintf (__('In its Members Directory page, selecting the option %s', 'bp-profile-search'), '<em>'. __('Add to Directory', 'bp-profile-search'). '</em>'). '</li>
<li>'. sprintf (__('In a sidebar or widget area, using the widget %s', 'bp-profile-search'), '<em>'. __('Profile Search', 'bp-profile-search'). '</em>'). '</li>
<li>'. sprintf (__('In a post or page, using the shortcode: %s (*)', 'bp-profile-search'), "<br><strong>[bps_display form=form_id template=template_name]</strong>"). '</li>
<li>'. sprintf (__('Anywhere in your theme, using the PHP code: %s (*)', 'bp-profile-search'), "<br><strong>&lt;?php do_action ('bps_display_form', form_id, 'template_name'); ?&gt;</strong>"). '</li>
</ul>'.
__('(*) Replace <em>form_id</em> with your actual form ID, and <em>template_name</em> with the name of the form template you want to use.', 'bp-profile-search'). '
</p>';

	$title_01 = __('Form Fields', 'bp-profile-search');
	$content_01 = '
<p>'.
__('Select the profile fields to show in your search form.', 'bp-profile-search'). '
<ul>
<li>'. __('Customize the field label and description, or leave them empty to use the default', 'bp-profile-search'). '</li>
<li>'. __('Select the field search mode from the <em>Search Mode</em> drop-down list', 'bp-profile-search'). '</li>
<li>'. __('To reorder the fields in the form, drag them up or down by the handle on the left', 'bp-profile-search'). '</li>
<li>'. __('To remove a field from the form, click <em>Remove</em> on the right', 'bp-profile-search'). '</li>
<li>'. __('To leave a field description blank, enter a single dash (-) character', 'bp-profile-search'). '</li>
</ul>
</p>';

	$title_02 = __('Add to Directory', 'bp-profile-search');
	$content_02 = '
<p>'.
__('Insert your search form in its Members Directory page.', 'bp-profile-search'). '
<ul>
<li>'. __('Select the form template to use', 'bp-profile-search'). '</li>
<li>'. __('Specify the optional form header', 'bp-profile-search'). '</li>
<li>'. __('Enable the <em>Toggle Form</em> feature', 'bp-profile-search'). '</li>
<li>'. __('Enter the text for the <em>Toggle Form</em> button', 'bp-profile-search'). '</li>
</ul>'.
__('If you select <em>Add to Directory: No</em>, the above options are ignored.', 'bp-profile-search'). '
</p>';

	$title_03 = __('Form Attributes', 'bp-profile-search');
	$content_03 = '
<p>'.
__('Select your form’s <em>method</em> attribute.', 'bp-profile-search'). '
<ul>
<li>'. __('POST: the form data are not visible in the URL and it’s not possible to bookmark the results page', 'bp-profile-search'). '</li>
<li>'. __('GET: the form data are sent as URL variables and it’s possible to bookmark the results page', 'bp-profile-search'). '</li>
</ul>'.
__('Select your form’s <em>action</em> attribute. The <em>action</em> attribute points to your form’s results page, that could be:', 'bp-profile-search'). '
<ul>
<li>'. __('The BuddyPress Members Directory page', 'bp-profile-search'). '</li>
<li>'. __('A custom Members Directory page', 'bp-profile-search'). '</li>
</ul>'.
sprintf (__('You can create a custom Members Directory page using the shortcode %s, and you can even use a custom directory template.', 'bp-profile-search'), '<strong>[bps_directory]</strong>'). ' '.
__('To learn more, read the <a href="http://dontdream.it/bp-profile-search/custom-directories/" target="_blank">Custom Directories</a> tutorial.', 'bp-profile-search'). '
</p>';

	$sidebar = '
<p><strong>'. __('For more information:', 'bp-profile-search'). '</strong></p>
<p><a href="http://dontdream.it/bp-profile-search/" target="_blank">'. __('Documentation', 'bp-profile-search'). '</a></p>
<p><a href="http://dontdream.it/bp-profile-search/search-modes/" target="_blank">'. __('Search Modes', 'bp-profile-search'). '</a></p>
<p><a href="http://dontdream.it/bp-profile-search/troubleshooting/" target="_blank">'. __('Troubleshooting', 'bp-profile-search'). '</a></p>
<p><a href="http://dontdream.it/bp-profile-search/incompatible-plugins/" target="_blank">'. __('Incompatible plugins', 'bp-profile-search'). '</a></p>
<p><a href="http://dontdream.it/support/forum/bp-profile-search-forum/" target="_blank">'. __('Support Forum', 'bp-profile-search'). '</a></p>
<br><br>';

	$screen->add_help_tab (array ('id' => 'bps_00', 'title' => $title_00, 'content' => $content_00));
	$screen->add_help_tab (array ('id' => 'bps_01', 'title' => $title_01, 'content' => $content_01));
	$screen->add_help_tab (array ('id' => 'bps_03', 'title' => $title_03, 'content' => $content_03));
	$screen->add_help_tab (array ('id' => 'bps_02', 'title' => $title_02, 'content' => $content_02));

	$screen->set_help_sidebar ($sidebar);

	return true;
}
