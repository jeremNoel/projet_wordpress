add_action( 'widgets_init', 'mfc_init' );

function mfc_init() {
	register_widget( 'mfc_widget' );
}

class mfc_widget extends WP_Widget
{

    public function __construct()
    {
        // Basic widget details
    }

    public function widget( $args, $instance )
    {
        // Widget output in the front end
    }

    public function update( $new_instance, $old_instance ) {
        // Form saving logic - if needed
    }

    public function form( $instance ) {
        // Backend Form
    }
}