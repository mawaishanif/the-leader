<?php 
/**
 * Class which represents all of the data of author image class
 */
class Author_Image_Class
{
    /**
     * Constructor will initlize all of the classes for author image class and registers for wordpress plugin.
     */
    public function __construct()
    {
     // add_action('show_user_profile', array($this, 'the_leader_user_profile_picture'));   
     add_action('personal_options_update', array($this, 'the_leader_user_profile_update'));
     add_action( 'admin_enqueue_scripts', array( $this, 'base_profile_image_admin_enqueue_scripts' ) );
     add_filter( 'get_avatar', array($this, 'my_custom_avatar'), 1, 5 );
     add_filter( 'user_profile_picture_description', array($this, 'checkingSomething'), 1, 5 );
    }
    /**
	 * Show custom user profile fields
	 * @param  obj $user The user object.
	 * @return void
	 */
	function the_leader_user_profile_picture($user) {
	?>
	<table class="form-table">
		<tbody>
			<tr class="user-profile-picture">
				<th>Custom Profile Avatar</th>
				<td>
					<img alt="" id="profile_image" src="../assets/images/default-avatar.png" class="avatar avatar-96 photo" height="96" width="96">
					<p class="description">
						<button type="button" id="choose_image_button" class="button">Choose Image</button>
						<button style="color:red" type="button" id="delete_image_button" class="button hidden">Delete Image</button>
						<input type="hidden" value="https://google.com/imagenumber1" name="user_avatar" id="user_avatar">
						<br>
						This picture will be used as Avatar through out this website.
					</p>
					<?php echo get_avatar($user); ?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
	}
 
function the_leader_user_profile_update($user_id) {
 		$imageId = filter_input( INPUT_POST, 'user_avatar', FILTER_VALIDATE_INT );	
		update_user_meta( $user_id, 'the_leader_author_profile_image', $imageId );
}
function base_profile_image_admin_enqueue_scripts() {

		wp_enqueue_media();
		wp_enqueue_script( 
			'the_leader_user_profile_image_script', 
			get_template_directory_uri() . '/assets/js/the-leader-custom-profile-script.js', 
			array( 'jquery' ), 
			1.00,
			True
		);

	}
function show_the_leader_profile_image( $avatar, $identifier, $size, $alt ) {
	if ( $user = cupp_get_user_by_id_or_email( $identifier ) ) {
		if ( $custom_avatar = get_cupp_meta( $user->ID, 'thumbnail' ) ) {
			return "<img alt='{$alt}' src='{$custom_avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
		}
	}

	return $avatar;
}

function my_custom_avatar( $avatar, $id_or_email, $size, $default, $alt ) {

		if (isset($id_or_email->comment_author_email)) {
			$user = get_user_by( 'email', $id_or_email->comment_author_email );
			$imageId = get_user_option( 'the_leader_author_profile_image', $user->ID );
			$url = wp_get_attachment_url( $imageId );

			if ($imageId) {
				return $avatar = "<img alt='{$alt}' src='{$url}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
			}
			else
			{
				$url = get_avatar_url($id_or_email->comment_author_email);
				
				return $avatar = "<img alt='{$alt}' src='{$url}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
			}
		}

		$imageId = get_user_option( 'the_leader_author_profile_image', $id_or_email );
		$url = wp_get_attachment_url( $imageId );

		$avatar = "<img alt='{$alt}' src='{$url}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
	    return $avatar;
	}
function checkingSomething(){
	?> 
	<p class="description">
		<button type="button" id="choose_image_button" class="button">Choose Image</button>
		<button style="color:red" type="button" id="delete_image_button" class="button hidden">Delete Image</button>
		<input type="hidden" value="https://google.com/imagenumber1" name="user_avatar" id="user_avatar">
		<br> This picture will be used as Avatar through out this website.
	</p>

	<?php
}

}
