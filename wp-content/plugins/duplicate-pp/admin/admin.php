<?php
/**
 * Admin Support Page
*/

class DPP_Admin_Page {
    /**
     * Contructor
    */
    public function __construct(){
        add_action( 'admin_menu', [ $this, 'dpp_plugin_admin_page' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'dpp_admin_page_assets' ] );
    }

    // Admin Assets
    public function dpp_admin_page_assets($screen) {
        if( 'tools_page_duplicate-pp' == $screen ) {
            wp_enqueue_style( 'admin-asset', plugins_url('assets/css/admin.css', __FILE__ ) );
        }
    }

    // Admin Page
    public function dpp_plugin_admin_page(){
        add_submenu_page( 'tools.php', __('Duplicate PP','duplicate-pp'), __('Duplicate PP','duplicate-pp'), 'manage_options', 'duplicate-pp', [ $this, 'dpp_admin_page_content_callback' ] );
    }
    public function dpp_admin_page_content_callback(){
        ?>
            <div class="admin_page_container">
                <div class="plugin_head">
                    <div class="head_container">
                        <h1 class="plugin_title"> Duplicate PP </h1>
                        <h4 class="plugin_subtitle">A Light-weight Plugin to Duplicate Anything</h4>
                        <div class="support_btn">
                            <a href="https://makegutenblock.com/contact" target="_blank" style="background: #D37F00">Get Support</a>
                            <a href="https://wordpress.org/plugins/duplicate-pp/#reviews" target="_blank" style="background: #0174A2">Rate Plugin</a>
                        </div>
                    </div>
                </div>
                <div class="plugin_body">
                    <div class="doc_video_area">
                        <div class="doc_video">
                          <img src=<?php echo plugin_dir_url(__FILE__); ?>../img/dpp.jpg>
                        </div>
                    </div>
                    <div class="support_area">
                        <div class="single_support">
                            <h4 class="support_title">Freelance Work</h4>
                            <div class="support_btn">
                                <a href="https://www.fiverr.com/users/devs_zak/" target="_blank" style="background: #1DBF73">@Fiverr</a>
                                <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" target="_blank" style="background: #14A800">@UpWork</a>
                            </div>
                        </div>
                        <div class="single_support">
                            <h4 class="support_title">Get Support</h4>
                            <div class="support_btn">
                                <a href="https://makegutenblock.com/contact" target="_blank" style="background: #002B42">Contact</a>
                                <a href="mailto:zbinsaifullah@gmail.com" style="background: #EA4335">Send Mail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
 new DPP_Admin_Page();
