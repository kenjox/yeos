<?php
if (class_exists('WPBakeryShortCode')) {
	class HoustonShortCode extends WPBakeryShortCode {

		public function __construct($settings = array()) {
			parent::__construct($settings);
		}
		protected function content($atts, $content = null) {
			$atts['shortcode_content'] = $content;
			$this->atts["shortcode_content"] = $content;
			$this->to_property(shortcode_atts( array(), $atts ));
			$template_name = str_ireplace("WPBakeryShortCode_", "", get_class($this));
			
				$width_class = wpb_translateColumnWidthToSpan($this->atts['width']);
					$before  = '<div class="' . $width_class . '">';
					$after = "</div>";
				
					$output = $before.$this->get_template_part($template_name).$after;
					$output = $this->startRow($this->atts['el_position']) . $output . $this->endRow($this->atts['el_position']);

				
			return $output;
		}

		protected function get_template_part( $slug, $name = null ) {
			if ( isset($name) )
				$templates[] = "{$slug}-{$name}.php";
			else
				$template_name = "{$slug}.php";
			$located = false;
			if ( file_exists(STYLESHEETPATH . '/template-parts/shortcodes/' . $template_name)) {
				$located = STYLESHEETPATH . '/template-parts/shortcodes/' . $template_name;
			} else if ( file_exists(TEMPLATEPATH . '/template-parts/shortcodes/' . $template_name) ) {
				$located = TEMPLATEPATH . '/template-parts/shortcodes/' . $template_name;
			}
			$output = "";

			if ($located !== false) {
				ob_start();
				require( $located );
				$output = ob_get_contents();
				ob_end_clean();
			}
			return $output;
		}

		protected function to_property($array) {
			foreach ($array as $key => $value) {
				$this->$key = $value;
			}
		}
	}
}
