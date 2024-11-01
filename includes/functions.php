<?php

function TheWP2StepSettings(){
 global $wp_roles;
if(isset($_POST['wp2step_key'])){
update_option('wp2step_api_key',$_POST['wp2step_key']);
update_option('wp2step_exp',$_POST['wp2step_exp']);

update_option('wp2step_auth_chars',$_POST['wp2step_chars']);
update_option('wp2step_len',$_POST['wp2step_len']);



$smsr = serialize( $_POST['smsRole'] );
$emailr = serialize( $_POST['emailRole'] );
$appr = serialize( $_POST['appRole'] );

update_option( 'wp2step_sms_roles', $smsr );
update_option( 'wp2step_email_roles', $emailr );
update_option( 'wp2step_app_roles', $appr );

}

$key = get_option('wp2step_api_key');
$exptime = get_option('wp2step_exp');
$char = get_option('wp2step_auth_chars');
$len = get_option('wp2step_len');

$srole = get_option( 'wp2step_sms_roles');
$erole = get_option( 'wp2step_email_roles');
$arole = get_option( 'wp2step_app_roles');

$bsms = unserialize($srole);
$bemail = unserialize($erole);
$bapp = unserialize($arole);


if(!is_array($bsms)){
$bsms =array();
}
if(!is_array($bemail)){
$bemail =array();
}
if(!is_array($bapp)){
$bapp =array();
}





?>
<div class="wrap">
<h2>WP 2 Step Settings</h2>

<div id="dashboard-widgets-wrap">
								<div id="dashboard-widgets" class="metabox-holder columns-2">
										<!-- BOX 1-->

								<div id="postbox-container-1" class="postbox-container">
										<div id="normal-sortables" class="meta-box-sortables ui-sortable">
											<div id="showverview-main" class="postbox">
												<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>WP 2 Step for Android<span class="postbox-title-action"></span></span></h3>

														<div class="inside">

														<table width="100%">

														<tr><th width="50%" align="center">Need The Free Android App?</th><th width="50%" align="center" >Custom Plugins Android,PC, and web software</th></tr>


														<tr><td align="center" style="padding:10px 10px 10px 10px;">
															<a href="https://play.google.com/store/apps/details?id=com.whereyoursolutionis.wp2step">
															  <img alt="Get it on Google Play"
																   src="https://developer.android.com/images/brand/en_generic_rgb_wo_60.png" />
															</a>
														
														

														 </td>

														<td align="center" style="padding:10px 10px 10px 10px;"> 

														

														    <em>Need wordpress help or custom plugins?  <a href="http://www.whereyoursolutionis.com/services/custom-software/">We're for hire</a>.  </em>

														</td></tr></table>

														</div>
												</div>		
											</div>
										</div>
								<!-- BOX 2-->
								<div id="postbox-container-2" class="postbox-container">
										<div id="normal-sortables" class="meta-box-sortables ui-sortable">
											<div id="showverview-main" class="postbox">

												<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>Donate To Development<span class="postbox-title-action"></span></span></h3>

														<div class="inside" align="center">

													

														<p ><em>Donate for this plugin</em></p>

														<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

												<input type="hidden" name="cmd" value="_s-xclick">

												<input type="hidden" name="hosted_button_id" value="AT8H7UZ78PMC4">

												<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">

												<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

												</form>

												</p>
											You can help support our development of this and future free plugins. 
													

														</div>
												</div>		
											</div>
									</div>
								</div>
				</div>	

<form action="admin.php?page=wp2step-settings" method="post">

	<table class="form-table">
		<tr>
			<th><label for="wp2step_key">2 Step Authentication API Key</label></th> 

			<td>
				<input type="text" name="wp2step_key" id="wp2step_key" value="<?php echo $key ;?>" class="regular-text"/><br />
				<span class="description">Your API Key can be found <a target="_blank" href="https://wp2step.com/">here</a>, you only need this if you are using the SMS feature</span>
			</td>
		</tr>

    	<tr>
			<th><label for="wp2step_exp">Key Expiration Time</label></th>

			<td>
				<input type="text" name="wp2step_exp" id="wp2step_exp" value="<?php echo $exptime ;?>" /><br />
				<span class="description">How long until the key expires in minutes</span>
			</td>
		</tr>
    	<tr>
			<th><label for="wp2step_len">Key Lenth</label></th>

			<td>
				<input type="text" name="wp2step_len" id="wp2step_len" value="<?php echo $len ;?>" /><br />
				<span class="description">How long do you want the users pin to be</span>
			</td>
		</tr>
    	<tr>
			<th><label for="wp2step_char">Key Characters</label></th>

			<td>
				<select name="wp2step_chars">
				<option value="all" <?php if ($char=='all'){echo ' selected ';}?> >Letters and Numbers</option>
				<option value="char" <?php if ($char=='char'){echo ' selected ';}?>>Letters Only</option>
				<option value="num" <?php if ($char=='num'){echo ' selected ';}?>>Numbers Only</option>
				
				</select><br />
				<span class="description">Should the key contain letters, number, or both</span>
			</td>
		</tr>

		<tr>
			<th><label >Allow 2 Step Email Auth for the following roles </label></th>

			<td>

				<?php
                 $roles = $wp_roles->get_names();
				foreach ($roles as $rl){
				echo '<input type="checkbox" name="emailRole[]" value="'.$rl.'"';
				
				if( in_array($rl,$bemail) ){
				
				echo ' checked ';
				}
				echo '/>'.$rl.'<br />';
				}
				?>
			</td>
		</tr>
		<tr>
			<th><label >Allow 2 Step Mobile App Auth for the following roles (<i>Currently Android Only, use shortcode [wp2step_badge] to display badge </i>)</label></th>

			<td>
				<?php
                 $roles = $wp_roles->get_names();
				foreach ($roles as $rl){
				echo '<input type="checkbox" name="appRole[]" value="'.$rl.'"';
				
				if( in_array($rl,$bapp) ){
				
				echo ' checked ';
				}
				echo '/>'.$rl.'<br />';
				}
				?>
			</td>
		</tr>
		<tr>
			<th><label >Allow 2 Step SMS Auth for the following roles, check none to not use ( <i>you must have a wp2step account</i> )</label></th>

			<td>
				<?php
                 $roles = $wp_roles->get_names();
				foreach ($roles as $rl){
				echo '<input type="checkbox" name="smsRole[]" value="'.$rl.'"';
				
				if( in_array($rl,$bsms) ){
				
				echo ' checked ';
				}
				echo '/>'.$rl.'<br />';
				}
				?>
			</td>
		</tr>


	</table>

<input type="submit"   value="Save Options" />
</form>
</div>
<?php
} 

function GetTheRequestLoginCode(){
    $wp2step_pin = ( isset( $_POST['wp2step'] ) ) ? $_POST['wp2step'] : '';
    
	?>

	<p>
	<span id="steppin" <?php  if(empty($_POST['wp2step_pin']) && empty($_POST['log']) ){ echo 'style="display:none;"'; } ?>>
       <?php _e('Enter Login Pin','wp2step') ?><br />
            <input type="text" name="wp2step_pin" id="wp2step_pin" class="input" value="<?php echo esc_attr(stripslashes($wp2step_pin)); ?>" size="25" />
    </span>
	</p>
    <?php

}



function pin_check( $user, $username, $password ){

global $error;
global $wp_hasher;
 

if(isset($_POST['log']) && isset($_POST['pwd']) && empty($_POST['wp2step_pin']) ){ 

$user = get_user_by( 'login',$_POST['log']  );
if(empty($user)){
$user = get_user_by( 'email', $_POST['log'] ); 
}


$srole = get_option( 'wp2step_sms_roles');
$erole = get_option( 'wp2step_email_roles');
$arole = get_option( 'wp2step_app_roles');

$bsms = unserialize($srole);
$bemail = unserialize($erole);
$bapp = unserialize($arole);


if(!is_array($bsms)){
$bsms =array();
}
if(!is_array($bemail)){
$bemail =array();
}
if(!is_array($bapp)){
$bapp =array();
}

$roles =  array_merge ( $bsms,$bemail,$bapp);

$in_role = check_user_role($roles,$user->ID);
		

	if ($in_role) {

	$r = get_user_meta( $user->ID,'will2step',true  );

	if($r!='none'){
	$getret = SendTheVerificationCode( $user->ID ); 		
					if($getret=='pin'){
					?> 
					<style> 
					#login_error{display:none;} 
					#user_login{display:none;}
					#user_pass{display:none;} 
					.forgetmenot{display:none;}
					label{display:none;} 
					</style>
					<?php
					remove_action('authenticate', 'wp_authenticate_username_password', 20);
					}elseif($getret=='error' || $getret=='credits'){
					update_usermeta($user->ID,'wp2step_error','error');
					
					return null;
					}else{
		 
					return null;
					}
				}else{
		
				return null;
				} 
		}else{
		return null;
		}
			
	}elseif(isset($_POST['log']) && isset($_POST['pwd']) && isset($_POST['wp2step_pin']) ){

			$user = get_user_by( 'login',$_POST['log']  );
			if(empty($user)){
			$user = get_user_by( 'email', $_POST['log'] ); 
			}


			$pin = get_user_meta($user->ID,'wp2step_pin',true);
			$time = get_user_meta($user->ID,'wp2step_time',true);
			$inc = get_option('wp2step_exp');
			$inpin = trim($_POST['wp2step_pin']);
			
			if(empty($inc)){
			$exp = 30;
			}else{
			$exp = get_option('wp2step_exp');
			}
			
			$expi = strtotime('now') - ($exp * 60 );

								
				//if( $pin != $inpin ){
				if(strcmp($pin,$inpin) != 0){
				  $error =  __("<strong>ERROR</strong>:Your login pin is incorrect");
				  remove_action('authenticate', 'wp_authenticate_username_password', 20);
				 }elseif($time < $expi ){
				  $error = new WP_Error( 'denied', __("<strong>ERROR</strong>:Your pin has expired") );
				  remove_action('authenticate', 'wp_authenticate_username_password', 20);

				//}elseif ($pin == $inpin){
				}elseif (strcmp($pin,$inpin) == 0){ 
				update_user_meta($user->ID,'wp2step_pin','');
				return null;
				}
	
		
 
		}elseif(empty($_POST['log']) || empty($_POST['pwd']) ) {
		 return null;
		}




}


function MakePin(){
$get_char=get_option('wp2step_auth_chars');
$length=get_option('wp2step_len');

	if($get_char=='all'){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	}elseif($get_char=='char'){
	$characters = 'abcdefghijklmnopqrstuvwxyz';
	}else{
	$characters = '0123456789';
	}
	
	if($length==0 || empty($length) ){
	$length=6;
	}

    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;

}


function SendTheVerificationCode($user_int){

$isReq = get_option('wp2step_roles');	
$isReq = unserialize($isReq);
$user = get_userdata($user_int);

	if ( $user->ID >0){	
			$thePin = MakePin();
			if( $user->will2step =='sms'){ 

				$key = get_option('wp2step_api_key');

				$theNumber = $user->country_code.$user->cell_phone;
	
				update_user_meta($user->ID,'wp2step_time',strtotime('now') );
				update_user_meta($user->ID,'wp2step_pin',$thePin);

					if(!empty($theNumber) && !empty($key) ){

					$ch = curl_init(); 
					curl_setopt($ch, CURLOPT_URL, 'https://www.wp2step.com/?apikey='.$key.'&msg='.$thePin.'&number=+'.$theNumber); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					$output = curl_exec($ch); 
					curl_close($ch);  

						if( $output == 'Error' ){
						
					     return 'error'; 
						
						}elseif($output == 'Insufficient Credits'){
						
						 return 'credits';
						
						}else{
						return 'pin';
						}
					
					
					
					
					}else{
					return 'nodata';
					}
					
				}elseif( $user->will2step =='email'){ 
	
				update_user_meta($user->ID,'wp2step_time',strtotime('now') );
				update_user_meta($user->ID,'wp2step_pin',$thePin);				
				wp_mail($user->user_email,get_bloginfo('name'),'Your login code is '.$thePin);
				return 'pin';
				
				}elseif( $user->will2step =='app'){ 
				update_user_meta($user->ID,'wp2step_time',strtotime('now') );
				update_user_meta($user->ID,'wp2step_pin',$thePin);				
				return 'pin';
				
				}else{
				return;
				}
			}else{
			return 'Invalid login';
			}

}

add_action( 'show_user_profile', 'add_the_phone_field' );
add_action( 'edit_user_profile', 'add_the_phone_field' );

function add_the_phone_field( $user ) { 
$r = get_user_meta( $user->ID,'will2step',true  );
$t = get_user_meta($user->ID ,'cell_phone', true );
$p = get_user_meta($user->ID ,'country_code', true );
$a = get_user_meta($user->ID ,'wp2step_appkey', true );


$srole = get_option( 'wp2step_sms_roles');
$erole = get_option( 'wp2step_email_roles');
$arole = get_option( 'wp2step_app_roles');



$bsms = unserialize($srole);
$bemail = unserialize($erole);
$bapp = unserialize($arole);


if(!is_array($bsms)){
$bsms =array();
}
if(!is_array($bemail)){
$bemail =array();
}
if(!is_array($bapp)){
$bapp =array();
}

$cansms = check_user_role($bsms);
$canemail = check_user_role($bemail);
$canapp = check_user_role($bapp);


	?>
	<script>
	jQuery(document).ready(function(){
	showSelector();
	jQuery('#countrycode').val('<?php echo $p; ?>');
	});
	
	
	function showSelector(){
		
		if(	jQuery('#will2step').val() =='sms'){
		jQuery('#sms').show('slow');
		jQuery('#app').hide('slow');
		
		}else if(jQuery('#will2step').val() =='app'){
		
		jQuery('#sms').hide('slow');
		jQuery('#app').show('slow');
		
		}else{
		jQuery('#sms').hide('slow');
		jQuery('#app').hide('slow');
		
		}
	}
	function AppKeyGen(){
	var key=Math.random().toString(10).slice(2)	
	jQuery('#appass').val(key);
	}
	
	</script>

 		<h3>2 Step Authentication</h3>

		<table class="form-table">
			
			<tr>
				<th><label for="twostep">Recieve 2 Step Authentication by</label></th>
			
				<td>
				<select name="will2step" id="will2step" onchange ="showSelector()">
				<option  <?php  if($r=='none' ) {echo ' selected ';} ?> value="none" />None</option>
				<?php if ($cansms){ ?> <option  <?php  if($r=='sms' ) {echo ' selected ';} ?>   value="sms" />SMS</option><?php } ?>
				<?php if($canemail){ ?><option  <?php  if($r=='email' ) {echo ' selected ';} ?> value="email" />Email</option> <?php } ?>
				<?php if ($canapp){ ?><option  <?php  if($r=='app' ) {echo ' selected ';} ?>   value="app" />App (currently android only)</option> <?php } ?>
				</select>
				<br />
					<span class="description">What type of 2 step authentication would you like to use on login</span>
				</td>				</td>
			</tr>
			
			
			<?php if ($cansms){ ?>
			<tr id="sms" style="display:none;">
				<th><label for="cellphone">Cell Phone</label></th>

				<td>
					<select name="countrycode" id="countrycode">
					 <option value="1">USA (+1) 
					<option  value="44" >UK (+44) 
					 <option value="213">Algeria (+213) 
					 <option value="376">Andorra (+376) 
					 <option value="244">Angola (+244) 
					 <option value="1264">Anguilla (+1264) 
					 <option value="1268">Antigua &amp; Barbuda (+1268) 
					 <option value="599">Antilles (Dutch) (+599) 
					 <option value="54">Argentina (+54) 
					 <option value="374">Armenia (+374) 
					 <option value="297">Aruba (+297) 
					 <option value="247">Ascension Island (+247) 
					 <option value="61">Australia (+61) 
					 <option value="43">Austria (+43) 
					 <option value="994">Azerbaijan (+994) 
					 <option value="1242">Bahamas (+1242) 
					 <option value="973">Bahrain (+973) 
					 <option value="880">Bangladesh (+880) 
					 <option value="1246">Barbados (+1246) 
					 <option value="375">Belarus (+375) 
					 <option value="32">Belgium (+32) 
					 <option value="501">Belize (+501) 
					 <option value="229">Benin (+229) 
					 <option value="1441">Bermuda (+1441) 
					 <option value="975">Bhutan (+975) 
					 <option value="591">Bolivia (+591) 
					 <option value="387">Bosnia Herzegovina (+387) 
					 <option value="267">Botswana (+267) 
					 <option value="55">Brazil (+55) 
					 <option value="673">Brunei (+673) 
					 <option value="359">Bulgaria (+359) 
					 <option value="226">Burkina Faso (+226) 
					 <option value="257">Burundi (+257) 
					 <option value="855">Cambodia (+855) 
					 <option value="237">Cameroon (+237) 
					 <option value="1">Canada (+1) 
					 <option value="238">Cape Verde Islands (+238) 
					 <option value="1345">Cayman Islands (+1345) 
					 <option value="236">Central African Republic (+236) 
					 <option value="56">Chile (+56) 
					 <option value="86">China (+86) 
					 <option value="57">Colombia (+57) 
					 <option value="269">Comoros (+269) 
					 <option value="242">Congo (+242) 
					 <option value="682">Cook Islands (+682) 
					 <option value="506">Costa Rica (+506) 
					 <option value="385">Croatia (+385) 
					 <option value="53">Cuba (+53) 
					 <option value="90392">Cyprus North (+90392) 
					 <option value="357">Cyprus South (+357) 
					 <option value="42">Czech Republic (+42) 
					 <option value="45">Denmark (+45) 
					 <option value="2463">Diego Garcia (+2463) 
					 <option value="253">Djibouti (+253) 
					 <option value="1809">Dominica (+1809) 
					 <option value="1809">Dominican Republic (+1809) 
					 <option value="593">Ecuador (+593) 
					 <option value="20">Egypt (+20) 
					 <option value="353">Eire (+353) 
					 <option value="503">El Salvador (+503) 
					 <option value="240">Equatorial Guinea (+240) 
					 <option value="291">Eritrea (+291) 
					 <option value="372">Estonia (+372) 
					 <option value="251">Ethiopia (+251) 
					 <option value="500">Falkland Islands (+500) 
					 <option value="298">Faroe Islands (+298) 
					 <option value="679">Fiji (+679) 
					 <option value="358">Finland (+358) 
					 <option value="33">France (+33) 
					 <option value="594">French Guiana (+594) 
					 <option value="689">French Polynesia (+689) 
					 <option value="241">Gabon (+241) 
					 <option value="220">Gambia (+220) 
					 <option value="7880">Georgia (+7880) 
					 <option value="49">Germany (+49) 
					 <option value="233">Ghana (+233) 
					 <option value="350">Gibraltar (+350) 
					 <option value="30">Greece (+30) 
					 <option value="299">Greenland (+299) 
					 <option value="1473">Grenada (+1473) 
					 <option value="590">Guadeloupe (+590) 
					 <option value="671">Guam (+671) 
					 <option value="502">Guatemala (+502) 
					 <option value="224">Guinea (+224) 
					 <option value="245">Guinea - Bissau (+245) 
					 <option value="592">Guyana (+592) 
					 <option value="509">Haiti (+509) 
					 <option value="504">Honduras (+504) 
					 <option value="852">Hong Kong (+852) 
					 <option value="36">Hungary (+36) 
					 <option value="354">Iceland (+354) 
					 <option value="91">India (+91) 
					 <option value="62">Indonesia (+62) 
					 <option value="98">Iran (+98) 
					 <option value="964">Iraq (+964) 
					 <option value="972">Israel (+972) 
					 <option value="39">Italy (+39) 
					 <option value="225">Ivory Coast (+225) 
					 <option value="1876">Jamaica (+1876) 
					 <option value="81">Japan (+81) 
					 <option value="962">Jordan (+962) 
					 <option value="7">Kazakhstan (+7) 
					 <option value="254">Kenya (+254) 
					 <option value="686">Kiribati (+686) 
					 <option value="850">Korea North (+850) 
					 <option value="82">Korea South (+82) 
					 <option value="965">Kuwait (+965) 
					 <option value="996">Kyrgyzstan (+996) 
					 <option value="856">Laos (+856) 
					 <option value="371">Latvia (+371) 
					 <option value="961">Lebanon (+961) 
					 <option value="266">Lesotho (+266) 
					 <option value="231">Liberia (+231) 
					 <option value="218">Libya (+218) 
					 <option value="417">Liechtenstein (+417) 
					 <option value="370">Lithuania (+370) 
					 <option value="352">Luxembourg (+352) 
					 <option value="853">Macao (+853) 
					 <option value="389">Macedonia (+389) 
					 <option value="261">Madagascar (+261) 
					 <option value="265">Malawi (+265) 
					 <option value="60">Malaysia (+60) 
					 <option value="960">Maldives (+960) 
					 <option value="223">Mali (+223) 
					 <option value="356">Malta (+356) 
					 <option value="692">Marshall Islands (+692) 
					 <option value="596">Martinique (+596) 
					 <option value="222">Mauritania (+222) 
					 <option value="269">Mayotte (+269) 
					 <option value="52">Mexico (+52) 
					 <option value="691">Micronesia (+691) 
					 <option value="373">Moldova (+373) 
					 <option value="377">Monaco (+377) 
					 <option value="976">Mongolia (+976) 
					 <option value="1664">Montserrat (+1664) 
					 <option value="212">Morocco (+212) 
					 <option value="258">Mozambique (+258) 
					 <option value="95">Myanmar (+95) 
					 <option value="264">Namibia (+264) 
					 <option value="674">Nauru (+674) 
					 <option value="977">Nepal (+977) 
					 <option value="31">Netherlands (+31) 
					 <option value="687">New Caledonia (+687) 
					 <option value="64">New Zealand (+64) 
					 <option value="505">Nicaragua (+505) 
					 <option value="227">Niger (+227) 
					 <option value="234">Nigeria (+234) 
					 <option value="683">Niue (+683) 
					 <option value="672">Norfolk Islands (+672) 
					 <option value="670">Northern Marianas (+670) 
					 <option value="47">Norway (+47) 
					 <option value="968">Oman (+968) 
					 <option value="680">Palau (+680) 
					 <option value="507">Panama (+507) 
					 <option value="675">Papua New Guinea (+675) 
					 <option value="595">Paraguay (+595) 
					 <option value="51">Peru (+51) 
					 <option value="63">Philippines (+63) 
					 <option value="48">Poland (+48) 
					 <option value="351">Portugal (+351) 
					 <option value="1787">Puerto Rico (+1787) 
					 <option value="974">Qatar (+974) 
					 <option value="262">Reunion (+262) 
					 <option value="40">Romania (+40) 
					 <option value="7">Russia (+7) 
					 <option value="250">Rwanda (+250) 
					 <option value="378">San Marino (+378) 
					 <option value="239">Sao Tome &amp; Principe (+239) 
					 <option value="966">Saudi Arabia (+966) 
					 <option value="221">Senegal (+221) 
					 <option value="381">Serbia (+381) 
					 <option value="248">Seychelles (+248) 
					 <option value="232">Sierra Leone (+232) 
					 <option value="65">Singapore (+65) 
					 <option value="421">Slovak Republic (+421) 
					 <option value="386">Slovenia (+386) 
					 <option value="677">Solomon Islands (+677) 
					 <option value="252">Somalia (+252) 
					 <option value="27">South Africa (+27) 
					 <option value="34">Spain (+34) 
					 <option value="94">Sri Lanka (+94) 
					 <option value="290">St. Helena (+290) 
					 <option value="1869">St. Kitts (+1869) 
					 <option value="1758">St. Lucia (+1758) 
					 <option value="249">Sudan (+249) 
					 <option value="597">Suriname (+597) 
					 <option value="268">Swaziland (+268) 
					 <option value="46">Sweden (+46) 
					 <option value="41">Switzerland (+41) 
					 <option value="963">Syria (+963) 
					 <option value="886">Taiwan (+886) 
					 <option value="7">Tajikstan (+7) 
					 <option value="66">Thailand (+66) 
					 <option value="228">Togo (+228) 
					 <option value="676">Tonga (+676) 
					 <option value="1868">Trinidad &amp; Tobago (+1868) 
					 <option value="216">Tunisia (+216) 
					 <option value="90">Turkey (+90) 
					 <option value="7">Turkmenistan (+7) 
					 <option value="993">Turkmenistan (+993) 
					 <option value="1649">Turks &amp; Caicos Islands (+1649) 
					 <option value="688">Tuvalu (+688) 
					 <option value="256">Uganda (+256) 
					 <option value="44" selected>UK (+44) 
					 <option value="380">Ukraine (+380) 
					 <option value="971">United Arab Emirates (+971) 
					 <option value="598">Uruguay (+598) 
					 <option value="1">USA (+1) 
					 <option value="7">Uzbekistan (+7) 
					 <option value="678">Vanuatu (+678) 
					 <option value="379">Vatican City (+379) 
					 <option value="58">Venezuela (+58) 
					 <option value="84">Vietnam (+84) 
					 <option value="84">Virgin Islands - British (+1284) 
					 <option value="84">Virgin Islands - US (+1340) 
					 <option value="681">Wallis &amp; Futuna (+681) 
					 <option value="969">Yemen (North) (+969) 
					 <option value="967">Yemen (South) (+967) 
					 <option value="381">Yugoslavia (+381) 
					 <option value="243">Zaire (+243) 
					 <option value="260">Zambia (+260) 
					 <option value="263">Zimbabwe (+263)
				</select>
<input type="text" name="cellphone" id="cellphone" value="<?php echo $t;?>" class="regular-text" width="15px" /><br />
					<span class="description">Cell Phone number for 2 step auth</span> 
				</td>
			</tr>
			<?php } ?>
			<?php if ($canapp){ ?>
			<tr id="app" style="display:none;">
				<th><label for="apppass">App Connect Key</label></th>
				<td>
				<input type="text" value="<?php echo $a; ?>" name="appass" id="appass"/><br/>
				<span class="description"><i><a href="javascript:;" onclick="AppKeyGen();">Auto-generate</a> 10 digit key</i></span> 
				</td>
			</tr>
            <?php } ?>
		</table>
	<?php 

}



add_action( 'personal_options_update', 'save_the_phone_field' );
add_action( 'edit_user_profile_update', 'save_the_phone_field' );

function save_the_phone_field( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'country_code', $_POST['countrycode'] );
	update_usermeta( $user_id, 'cell_phone', $_POST['cellphone'] );
	update_usermeta( $user_id, 'will2step', $_POST['will2step'] );
	update_usermeta( $user_id, 'wp2step_appkey', $_POST['appass'] );

	
	}



function check_user_role($roles,$user_id=NULL) {
	// Get user by ID, else get current user
	if ($user_id){
		$user = get_userdata($user_id);
	}else{
		$user = wp_get_current_user();
	}
		if (empty($user))
		return FALSE;

	foreach ($user->roles as $role) {
		if (in_array(ucwords($role),$roles)) {
			return TRUE;
		}
	}
	return FALSE;
}


function after_login_error(){

if(is_user_logged_in()){
$user = wp_get_current_user();
$p = get_user_meta($user->ID ,'wp2step_error', true );

	if($p=='error'){
	?>
	<script> 
	jQuery(document).ready(function(){
	alert('There is an error with your 2 step authentication, please contact your administrator.');		
	});
	</script>
	<?php
	update_usermeta($user->ID,'wp2step_error','');
	}
} 
	return;
}

function wp2step_loginscripts(){
wp_enqueue_script('jquery'); 
}
 
function wp2step_ispinrequest(){

	if(isset($_POST['appaction'])){
	
	if ( wp_get_referer() ){
	wp_die('No Cheating.');
	}
	
		if($_POST['appaction']=='returnpin'){
			$user = get_user_by( 'login',$_POST['log']  );
			if(empty($user)){
			$user = get_user_by( 'email', $_POST['log'] ); 
			}


			if ( $user && wp_check_password( $_POST['pwd'], $user->data->user_pass, $user->ID) ){
			
			$pin = get_user_meta($user->ID,'wp2step_pin',true);
			$time = get_user_meta($user->ID,'wp2step_time',true);
			$key = get_user_meta($user->ID,'wp2step_appkey',true);
			$inc = get_option('wp2step_exp');
			$inpin = trim($_POST['wp2step_pin']);
			
			if($key==$_POST['key']){
			if(empty($inc)){
			$exp = 30;
			}else{
			$exp = get_option('wp2step_exp');
			}
			
			$expi = strtotime('now') - ($exp * 60 );
			
			if($time < $expi ||empty($pin) ){ 
			echo 'Waiting for Login';
			}else{
			echo $pin;
			}
		}else{ 
		echo 'Validation Failure';
		}
		
		}else{
		echo 'Validation Failure';
		
		}
		
		
		die();
		}
	}
}


function WP2Step_badge(){
ob_start();
?>
<a href="https://play.google.com/store/apps/details?id=com.whereyoursolutionis.wp2step">
  <img alt="Get it on Google Play"
       src="https://developer.android.com/images/brand/en_generic_rgb_wo_60.png" />
</a>
<?php
return ob_get_clean();

}