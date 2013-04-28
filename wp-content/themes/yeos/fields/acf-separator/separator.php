<?php

/*
 *	Advanced Custom Fields - New field template
 *	
 *	Create your field's functionality below and use the function:
 *	register_field($class_name, $file_path) to include the field
 *	in the acf plugin.
 *
 *	Documentation: 
 *
 */
 
 
class acf_Separator extends acf_Field
{

	/*--------------------------------------------------------------------------------------
	*
	*	Constructor
	*	- This function is called when the field class is initalized on each page.
	*	- Here you can add filters / actions and setup any other functionality for your field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function __construct($parent)
	{
		// do not delete!
    	parent::__construct($parent);
    	
    	// set name / title
    	$this->name = 'separator'; // variable name (no spaces / special characters / etc)
		$this->title = __("Separator",'acf'); // field label (Displayed in edit screens)
		
   	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	create_options
	*	- this function is called from core/field_meta_box.php to create extra options
	*	for your field
	*
	*	@params
	*	- $key (int) - the $_POST obejct key required to save the options to the field
	*	- $field (array) - the field object
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_options($key, $field)
	{
		
		
		// vars
		$defaults = array(
			'textvalue'	=>	'',
			'subjvalue' =>	'',
			'spacevalue' =>	'',
			'paddvalue' 	=>	'',
			'htag' 	=>	'default',
			'sepvalue' 	=>	'standard',
			'sepbgvalue' 	=>	'',
			'sepimgvalue' 	=>	'',
			'sepcssvalue' 	=>	'',
			'sepfontcolorvalue' 	=>	''
		);
		
		$field = array_merge($defaults, $field);
		
		$field['textvalue'] = isset($field['textvalue']) ? $field['textvalue'] : '';
		$field['subjvalue'] = isset($field['subjvalue']) ? $field['subjvalue'] : '';
		$field['spacevalue'] = isset($field['textvalue']) ? $field['spacevalue'] : '';
		$field['paddvalue'] = isset($field['paddvalue']) ? $field['paddvalue'] : '';
		$field['htag'] = isset($field['htag']) ? $field['htag'] : '';
		$field['sepvalue'] = isset($field['sepvalue']) ? $field['sepvalue'] : '';
		$field['sepbgvalue'] = isset($field['sepbgvalue']) ? $field['sepbgvalue'] : '';
		$field['sepimgvalue'] = isset($field['sepimgvalue']) ? $field['sepimgvalue'] : '';
		$field['sepfontcolorvalue'] = isset($field['sepfontcolorvalue']) ? $field['sepfontcolorvalue'] : '';
		$field['sepcssvalue'] = isset($field['sepcssvalue']) ? $field['sepcssvalue'] : '';
		?>	
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Separator Title",'acf'); ?></label>
				<p class="description"><?php _e('Title to go in separater. eg. "This is Title".','acf'); ?></a></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][textvalue]',
					'value'	=>	$field['textvalue'],
				));
				?>
			</td>
		</tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Separator Subject",'acf'); ?></label>
				<p class="description"><?php _e(' Subject to go below title. eg. "Subject Title".','acf'); ?></a></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][subjvalue]',
					'value'	=>	$field['subjvalue'],
				));
				?>
			</td>
		</tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Title Size",'acf'); ?></label>
				<p class="description"><?php _e("Define how to render Header tags. If Default ACF is selected, title color, custom css, and background color will NOT work.",'acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'select',
					'name'	=>	'fields['.$key.'][htag]',
					'value'	=>	$field['htag'],
					'choices' => array(
						'default'	=>	__("Default ACF",'acf'),
						'h1'	=>	__("H1",'acf'),
						'h2'	=>	__("H2",'acf'),
						'h3'	=>	__("H3",'acf'),
						'h4'	=>	__("H4",'acf'),
						'h5'	=>	__("H5",'acf')
					)
				));
				?>
			</td>
		</tr>
         <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Title Color",'acf'); ?></label>
				<p class="description"><?php _e('Color of title. Add a color value e.g: "#000000" or "black".','acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
				    'type'	=>	'text',
					'name'	=>	'fields['.$key.'][sepfontcolorvalue]',
					'class'	=>	'acf_color_picker',	
					'value'	=>	$field['sepfontcolorvalue']				
				));
				?>
			</td>
		</tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Separator Spacing",'acf'); ?></label>
				<p class="description"><?php _e("Add spacing between top/bottom of header. (default is 10)",'acf'); ?></a></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][spacevalue]',
					'value'	=>	$field['spacevalue']
				));
				?>
			</td>
		</tr>
         <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Separator Padding",'acf'); ?></label>
				<p class="description"><?php _e("Add padding around separater title. (default is 0)",'acf'); ?></a></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][paddvalue]',
					'value'	=>	$field['paddvalue']
				));
				?>
			</td>
		</tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Separater Style ",'acf'); ?></label>
				<p class="description"><?php _e('Choose from <b>Standard ACF Metabox</b> or <b>No Metabox</b>','acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'select',
					'name'	=>	'fields['.$key.'][sepvalue]',
					'value'	=>	$field['sepvalue'],
					'choices' => array(
						'standard'	=>	__("Standard ACF Metabox",'acf'),
						'custom'	=>	__("No Metabox",'acf')
					)
				));
				?>
			</td>
		</tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Background Color",'acf'); ?></label>
				<p class="description"><?php _e('Background color of separater.','acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
				    'type'	=>	'text',
					'name'	=>	'fields['.$key.'][sepbgvalue]',
					'class'	=>	'acf_color_picker',	
					'value'	=>	$field['sepbgvalue']				
				));
				?>
			</td>
		</tr>
         <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Background Image URL",'acf'); ?></label>
				<p class="description"><?php _e('Background image url of separater.','acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
				    'type'	=>	'text',
					'name'	=>	'fields['.$key.'][sepbgimgvalue]',	
					'value'	=>	$field['sepbgimgvalue']				
				));
				?>
			</td>
		</tr>
         <tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Custom Separater CSS",'acf'); ?></label>
				<p class="description"><?php _e('Custom style you separater & title using css.<br/>Example: ( border: 1px solid #000000 !important; text-shadow: 1px 1px 1px #000000 !important; )<br/><b>Please make sure to enter correct css syntax</b>.','acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
				    'type'	=>	'textarea',
					'name'	=>	'fields['.$key.'][sepcssvalue]',	
					'value'	=>	$field['sepcssvalue']				
				));
				?>
			</td>
		</tr>        
        <?php	
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	pre_save_field
	*	- this function is called when saving your acf object. Here you can manipulate the
	*	field object and it's options before it gets saved to the database.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function pre_save_field($field)
	{
		// do stuff with field (mostly format options data)
		
		return parent::pre_save_field($field);
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	create_field
	*	- this function is called on edit screens to produce the html for this field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_field($field)
	{
	
	
	$spacevalue = $field['spacevalue'];
	$paddvalue = $field['paddvalue'];
	$sepvalue = $field['sepvalue'];
	$htag = $field['htag'];
	$sepbgvalue = $field['sepbgvalue'];
	$sepimgvalue = $field['sepimgvalue'];
	$sepfontcolorvalue = $field['sepfontcolorvalue'];
	$sepcssvalue = $field['sepcssvalue'];
	
	if ($field['subjvalue'] != ""){ 
	$subjvalue = '<br/><span style="font-size:13px; font-weight:normal;">'.$field['subjvalue']; 
	}
	
	if ($spacevalue != ""){
	$topmargin = "margin-top:".$spacevalue."px !important; ";
	}	
	
	if ($paddvalue == ""){ 
	$padding = "padding-top:10px 0 !important; padding-bottom:10px 0 !important; ";
	}
	
	if ($paddvalue != ""){ 
	$padding = "padding-top:".$paddvalue."px !important; padding-bottom:".$paddvalue."px !important;";
	}
	
	if ($sepbgimgvalue != ""){ 
	$bgurl = "background:url(".$sepbgimgvalue.") no-repeat top left transparent !important; ";
	}
	
	if ($sepbgvalue != ""){ 
	$bgcolor = "background-color:".$sepbgvalue." !important; ";
	}
	
	if ($sepfontcolorvalue != ""){ 
	$fontcolor = "color:".$sepfontcolorvalue." !important; ";
	}
	
	if ($htag == "h3"){ 
	$htag = "h6";
	$htagstyle = "font-size:15px !important; ".$fontcolor.$bgcolor.$sepcssvalue;
	$boxstyle = "border-color:".$sepbgvalue." !important; ";
	}
	
	if ($htag == "h1" || $htag == "h2" || $htag == "h4" || $htag == "h5" ){ 
	$htagstyle = $fontcolor.$bgcolor.$sepcssvalue;
	$boxstyle = "border-color:".$sepbgvalue." !important; ";	
	}
	
    if ($htag == "default"){ 
	$htag = "h3";
	$htagstyle="";
	}	
	
	if ($sepvalue == "standard"){ 
	$styleBox = "default";
	$display = "padding-left:10px !important; padding-right:10px !important; margin: 0 0 !important;";	
	    if ($sepbgvalue != "" || $sepbgimgvalue != ""){ 
		$display = "padding-left:10px !important; padding-right:10px !important; margin: 0 0 !important;";
		}
	 
	}else{
    $styleBox = "no_box";
	$display = "display:block !important; border: 0px !important; margin: 0 0 !important; ";
		if ($sepbgvalue != "" || $sepbgimgvalue != ""){ 
		$display = "display:block !important;  padding-left:15px !important; padding-right:15px !important; margin: 0 0 !important; ";
		}
	}
		
	//Show all renders
	echo '</div></div></div></div><div id="poststuff" style="'.$topmargin.'"><div id="acf_0" style="'.$boxstyle.'" class="postbox acf_postbox '.$styleBox.'"><'.$htag.' class="hndle" style="'.$display.$bgurl.$padding.$htagstyle.'"><span>'.$field['textvalue'].$subjvalue.'</span></'.$htag.'><div class="inside"><div class="options" data-layout="'.$styleBox.'" data-show="true"/>';	
	
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	admin_head
	*	- this function is called in the admin_head of the edit screen where your field
	*	is created. Use this function to create css and javascript to assist your 
	*	create_field() function.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_head()
	{
	//Hide Title	
	?>
	<style type="text/css">
    .field-separator{display:none !important;}
    </style>
<?php
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	admin_print_scripts / admin_print_styles
	*	- this function is called in the admin_print_scripts / admin_print_styles where 
	*	your field is created. Use this function to register css and javascript to assist 
	*	your create_field() function.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_print_scripts()
	{
	
	}
	
	function admin_print_styles()
	{
		
	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	update_value
	*	- this function is called when saving a post object that your field is assigned to.
	*	the function will pass through the 3 parameters for you to use.
	*
	*	@params
	*	- $post_id (int) - usefull if you need to save extra data or manipulate the current
	*	post object
	*	- $field (array) - usefull if you need to manipulate the $value based on a field option
	*	- $value (mixed) - the new value of your field.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function update_value($post_id, $field, $value)
	{
		// do stuff with value
		
		// save value
		parent::update_value($post_id, $field, $value);
	}
	
	
	
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value
	*	- called from the edit page to get the value of your field. This function is useful
	*	if your field needs to collect extra data for your create_field() function.
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value($post_id, $field)
	{
		// get value
		////$value = parent::get_value($post_id, $field);
		
		// format value
		
		// return value
		////return $value;	
		$value = parent::get_value($post_id, $field);
		
		$value = htmlspecialchars($value, ENT_QUOTES);
		
		return $value;	
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value_for_api
	*	- called from your template file when using the API functions (get_field, etc). 
	*	This function is useful if your field needs to format the returned value
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value_for_api($post_id, $field)
	{
		// get value
		////$value = $this->get_value($post_id, $field);
		
		// format value
		
		// return value
		////return $value;
		

	}
	

		
		
		
		


	
}

?>