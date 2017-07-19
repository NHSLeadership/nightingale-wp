<?php
/**
* Create ribbon settings page
*/
function ribbon_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Ribbon Settings</h1>
			<p>This is where you can switch various ribbons on and off, as well as customise their settings.</p>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
							do_settings_sections("cookies-ribbon-options");
	            do_settings_sections("dev-ribbon-options");
							do_settings_sections("partner-ribbon-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_options_page("Ribbon Settings", "Ribbons", "manage_options", "ribbon-settings", "ribbon_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function add_cookies_ribbon_checkbox()
{
	?>
		<input type="checkbox" name="cookies_ribbon_checkbox" id="cookies_ribbon_checkbox" value="0" <?php checked(0, get_option('cookies_ribbon_checkbox'), true); ?> />
	<?php
}

function add_cookies_ribbon_cookies_url()
{
	if ( get_option( 'cookies_ribbon_cookies_url' ) == null ) // if not set, offer default value
		update_option( 'cookies_ribbon_cookies_url', 'https://www.gov.uk/help/cookies' );
	?>
		<input class="widefat" type="text" name="cookies_ribbon_cookies_url" id="cookies_ribbon_cookies_url" value="<?php echo get_option('cookies_ribbon_cookies_url'); ?>" />
	<?php
}

function add_cookies_ribbon_browser_url()
{
	if ( get_option( 'cookies_ribbon_browser_url' ) == null ) // if not set, offer default value
		update_option( 'cookies_ribbon_browser_url', 'https://www.aboutcookies.org/' );
	?>
		<input class="widefat" type="text" name="cookies_ribbon_browser_url" id="cookies_ribbon_browser_url" value="<?php echo get_option('cookies_ribbon_browser_url'); ?>" />
	<?php
}

function add_dev_ribbon_selection()
{
	if ( get_option( 'dev_ribbon_selection' ) == false ) // default to 'none'
		update_option( 'dev_ribbon_selection', 'none' );
	?>
		<input type="radio" name="dev_ribbon_selection" id="dev_ribbon_selection" value="alpha" <?php checked('alpha', get_option('dev_ribbon_selection'), true); ?>>Alpha
		<input type="radio" name="dev_ribbon_selection" id="dev_ribbon_selection" value="beta" <?php checked('beta', get_option('dev_ribbon_selection'), true); ?>>Beta
		<input type="radio" name="dev_ribbon_selection" id="dev_ribbon_selection" value="none" <?php checked('none', get_option('dev_ribbon_selection'), true); ?>>None
	<?php
}

function add_dev_ribbon_url()
{
	?>
		<input class="widefat" type="text" name="dev_ribbon_url" id="dev_ribbon_url" value="<?php echo get_option('dev_ribbon_url'); ?>" />
	<?php
}

function add_partner_ribbon_checkbox()
{
	?>
		<input type="checkbox" name="partner_ribbon_checkbox" id="partner_ribbon_checkbox" value="0" <?php checked(0, get_option('partner_ribbon_checkbox'), true); ?> />
	<?php
}

function add_partner_ribbon_pages()
{
	?>
	<input class="widefat" type="textarea" name="partner_ribbon_pages" id="partner_ribbon_pages" value="<?php echo get_option('partner_ribbon_pages'); ?>" />
	<?php
}

function add_partner_ribbon_text()
{
	?>
	<input class="widefat" type="textarea" name="partner_ribbon_text" id="partner_ribbon_text" value="<?php echo get_option('partner_ribbon_text'); ?>" />
	<?php
}

function add_theme_panel_fields()
{
//	add_settings_section("section", "Cookies Ribbon", null, "cookies-ribbon-options", $icon_url = get_template_directory_uri().'/node_modules/nightingale/assets/img/logo-nhs.png');
	add_settings_section("section", "Cookies Ribbon", null, "cookies-ribbon-options");
		add_settings_field("cookies_ribbon_checkbox", "Display Cookies Ribbon?", "add_cookies_ribbon_checkbox", "cookies-ribbon-options", "section");
		add_settings_field("cookies_ribbon_cookies_url", "Cookies Information URL:", "add_cookies_ribbon_cookies_url", "cookies-ribbon-options", "section");
		add_settings_field("cookies_ribbon_browser_url", "Browser Settings URL:", "add_cookies_ribbon_browser_url", "cookies-ribbon-options", "section");
		register_setting("section", "cookies_ribbon_checkbox");
		register_setting("section", "cookies_ribbon_cookies_url");
		register_setting("section", "cookies_ribbon_browser_url");
	add_settings_section("section", "Development Ribbon", null, "dev-ribbon-options");
		add_settings_field("dev_ribbon_selection", "Ribbon Type:", "add_dev_ribbon_selection", "dev-ribbon-options", "section");
		add_settings_field("dev_ribbon_url", "Ribbon URL:", "add_dev_ribbon_url", "dev-ribbon-options", "section");
		register_setting("section", "dev_ribbon_selection");
		register_setting("section", "dev_ribbon_url");
	add_settings_section("section", "Partnership Ribbon", null, "partner-ribbon-options");
		add_settings_field("partner_ribbon_checkbox", "Display Partnership Ribbon?", "add_partner_ribbon_checkbox", "partner-ribbon-options", "section");
		add_settings_field("partner_ribbon_pages", "Ribbon Pages:", "add_partner_ribbon_pages", "partner-ribbon-options", "section");
		add_settings_field("partner_ribbon_text", "Ribbon Text:", "add_partner_ribbon_text", "partner-ribbon-options", "section");
		register_setting("section", "partner_ribbon_checkbox");
		register_setting("section", "partner_ribbon_pages");
		register_setting("section", "partner_ribbon_text");
}

add_action("admin_init", "add_theme_panel_fields");

/**
* Add ribbons after body tag
*/
function display_cookies_ribbon() {
// If cookies ribbon checkbox is selected, display cookies ribbon with URLs from settings
	if (get_option('cookies_ribbon_checkbox') != null) {
    echo '<div class="c-ribbon">
          <div class="o-wrapper">
            <div class="c-ribbon__actions">
              <button class="c-sprite  c-sprite--close-rev">Close</button>
            </div>
            <strong class="c-ribbon__body">By default this site uses <a href='.get_option('cookies_ribbon_cookies_url').' target="_blank">cookies</a> to collect information and improve. To control cookies, you can <a href='.get_option('cookies_ribbon_browser_url').' target="_blank">adjust your browser settings</a>.</strong>
          </div>
        </div>';
	}
}
add_action('nightingale_before_header','display_cookies_ribbon');

function display_dev_ribbon() {
// If alpha or beta option is selected, display appropriate dev ribbon with URL from settings
// Note: the selection is used to define the CSS class that is used (e.g. c-ribbon--alpha or c-ribbon--beta) as well as the ribbon title
	$dev_ribbon_selection = get_option('dev_ribbon_selection');
	if ($dev_ribbon_selection != 'none') {
    echo '<div class="c-ribbon  c-ribbon--'.$dev_ribbon_selection.'">
        <div class="o-wrapper">
          <strong class="c-ribbon__tag">'.$dev_ribbon_selection.'</strong>
          <strong class="c-ribbon__body">This page is part of a new service – your <a href='.get_option('dev_ribbon_url').' target="_blank">feedback</a> will help us to improve it.</strong>
        </div>
      </div>';
	}
}
add_action('nightingale_before_header','display_dev_ribbon');

function display_partner_ribbon($pageid) {
// Display partnership ribbon with text from settings
	// Read list of specified pages into array
	$pages_array = explode(',',get_option('partner_ribbon_pages'));
	// Loop through list of specified pages
	foreach($pages_array as $page_id) {
		// If current page matches, or no pages specified, display ribbon
		if ($page_id==null || $pageid==$page_id) {
      echo '<div class="c-ribbon  c-ribbon--expandable">
          <div class="o-wrapper">
            <details class="c-ribbon__body">
              <summary><b>In partnership with:</b> '.get_option('partner_ribbon_text').'.</summary>
            </details>
          </div>
        </div>';
		}
	}
}
// If partnership ribbon checkbox is selected, display partnership ribbon with text from settings
if (get_option('partner_ribbon_checkbox') != null) {
	// If specific pages set, display partnership ribbon above page content for those pages
	if(get_option('partner_ribbon_pages')!=null) {
		add_action('nightingale_before_content','display_partner_ribbon',10,1);	
	}
	// If no page specified, display partnership ribbon above page header for all pages
	else {
		add_action('nightingale_before_header','display_partner_ribbon');
	}
}