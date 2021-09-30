<?php

/**
 * Element Definition: "ARPrice_CS"
 */
class ARPrice_CS {

    public function ui() {
        return array(
            'title' => esc_html__('AR-PRICE', 'ARPrice'),
            'autofocus' => array(
                'heading' => 'h4.arprice-cs-heading',
                'content' => '.arprice-cs'
            ),
            'icon_group' => 'AR-PRICE'
        );
    }

    public function update_build_shortcode_atts($atts) {

        if (!isset($atts['style'])) {
            $atts['style'] = '';
        }


        if (isset($atts['background_color'])) {
            $atts['style'] .= ' background-color: ' . $atts['background_color'] . ';';
            unset($atts['background_color']);
        }

        return $atts;
    }

}
