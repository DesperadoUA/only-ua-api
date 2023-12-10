<?php
function parseAmpContent($content) {
    if(IS_AMP) {
        $content = str_replace('<picture></picture>', '', $content);
        preg_match_all('|<picture>(.+?)<\/picture>|is', $content, $contentPictureData);
        for($i=0; $i<count($contentPictureData); $i++) {
            $content = str_replace($contentPictureData[$i], '', $content);
        }
        $parseImages = preg_match_all('/<img.*?src="([^"]+)".*?(?:data-original="([^"]+)".*?)?>/i', $content, $contentImagesData);
        $ampImageArr = [];
        foreach ($contentImagesData[0] as $key => $contentImageData) {
            $imageSrc = !empty($contentImagesData[1][$key]) ? $contentImagesData[1][$key] : '';
            $imageSrc = !empty($contentImagesData[2][$key]) ? $contentImagesData[2][$key] : $imageSrc;
            $imageInfo = getimagesize( $imageSrc);
            $imageSize = !empty($imageInfo[3]) ? $imageInfo[3] : 'width="520" height="180"';
            $imageAlt =  preg_match('/<img.*?alt="([^"]+).*?>/i', $contentImageData, $parseAlt);
            $imageAlt = !empty($parseAlt[1]) ? 'alt="' . $parseAlt[1]  . '"' : '';
            $ampImage = '<amp-img layout="responsive" ';
            $ampImage .= $imageSize;
            $ampImage .= ' src="' . $imageSrc . '"';
            $ampImage .= $imageAlt;
            $ampImage .= '></amp-img>';
            $replaceString = htmlentities($contentImageData);
            $content = str_replace($contentImageData, $ampImage, $content);
        }
        $parsedLinks = preg_match_all('/<a.*?href="([^"]+)".*?>.*?<\/a>/i', $content, $contentLinksData);
        foreach ($contentLinksData[0] as $key => $linkData){
            if ( strpos($contentLinksData[1][$key] ,'#')  !== 0 && !strpos($contentLinksData[1][$key] ,'amp')){
                if(strpos($contentLinksData[1][$key] ,'http')  !== 0 && $contentLinksData[1][$key] !== '/go/') {
                    $content = str_replace('href="' . $contentLinksData[1][$key] . '"', 'href="/amp' . rtrim($contentLinksData[1][$key], '/') . '/"', $content);
                }
            }
        }
        $content = str_replace('<iframe', '<amp-iframe', $content);
        $content = str_replace('</iframe', '</amp-iframe', $content);
        $content = str_replace("100%", '300px', $content);
        $content = preg_replace('/xml:lang=".*?"/i', '', $content);
        return $content;
    }
    return $content;
}
/* Post cards */
function get_casino_card_data($arr_id) {
    $data_posts = [];
    foreach ($arr_id as $item) {
        $bonuses = carbon_get_post_meta($item, 'bonuses');
        $data_posts[] = [
            'id'               => $item,
            'title'            => get_the_title($item),
            'sub_title'        => carbon_get_post_meta($item, 'sub_title'),
            'meta_title'       => carbon_get_post_meta($item, 'meta_title'),
            'meta_description' => carbon_get_post_meta($item, 'meta_description'),
            'meta_keywords'    => carbon_get_post_meta($item, 'meta_keywords'),
            'h1'               => carbon_get_post_meta($item, 'h1'),
            'title_card_link'  => carbon_get_post_meta($item, 'title_card_link'),
            'ref'              => carbon_get_post_meta($item, 'ref'),
            'rating'           => carbon_get_post_meta($item, 'rating'),
            'permalink'        => get_short_link($item),
            'thumbnail'        => get_the_post_thumbnail_url($item, 'full'),
            'marker'           => carbon_get_post_meta($item, 'marker'),
            'licensed'         => carbon_get_post_meta($item, 'licensed'),
            'bonuses'          => $bonuses
        ];
    }
    return $data_posts;
}
/* Post cards end */

/* Single posts */
function get_single_casino_data($id){
    $data_post = [];
    $current_data = get_post($id);
    if(!empty($current_data)) {
        $amp_text = carbon_get_post_meta($current_data->ID, 'amp_content');
        $amp_text = empty($amp_text) ? parseAmpContent($current_data->post_content) : parseAmpContent($amp_text);
        $payments_id = carbon_get_post_meta($current_data->ID, 'relative_payment');
        $relative_payments = [];
        if(!empty($payments_id)) {
            foreach ($payments_id as $item) {
                $relative_payments[] = [
                    'title' => get_the_title($item),
                    'permalink' => get_short_link($item)
                ];
            }
        }

        $vendors_id = carbon_get_post_meta($current_data->ID, 'relative_vendor');
        $relative_vendors = [];
        if(!empty($vendors_id)) {
            foreach ($vendors_id as $item) {
                $relative_vendors[] = [
                    'title' => get_the_title($item),
                    'permalink' => get_short_link($item)
                ];
            }
        }

        $pay_out_id = carbon_get_post_meta($current_data->ID, 'relative_pay_out');
        $relative_pay_out = [];
        if(!empty($pay_out_id)) {
            foreach ($pay_out_id as $item) {
                $relative_pay_out[] = [
                    'title' => get_the_title($item),
                    'permalink' => get_short_link($item)
                ];
            }
        }

        $data_posts = [
            'id'                      => $current_data->ID,
            'title'                   => $current_data->post_title,
            'meta_title'              => carbon_get_post_meta($current_data->ID, 'meta_title'),
            'meta_description'        => carbon_get_post_meta($current_data->ID, 'meta_description'),
            'meta_keywords'           => carbon_get_post_meta($current_data->ID, 'meta_keywords'),
            'h1'                      => carbon_get_post_meta($current_data->ID, 'h1'),
            'content'                 => $current_data->post_content,
            'amp_content'             => $amp_text,
            'ref'                     => carbon_get_post_meta($current_data->ID, 'ref'),
            'bonuses'                 => carbon_get_post_meta($current_data->ID, 'bonuses'),
            'rating'                  => carbon_get_post_meta($current_data->ID, 'rating'),
            'thumbnail'               => get_the_post_thumbnail_url($current_data->ID, 'full'),
            'sub_title'               => carbon_get_post_meta($current_data->ID, 'sub_title'),
            'min_deposit'             => carbon_get_post_meta($current_data->ID, 'min_deposit'),
            'min_payout'              => carbon_get_post_meta($current_data->ID, 'min_payout'),
            'currency'                => carbon_get_post_meta($current_data->ID, 'currency'),
            'valuta'                  => carbon_get_post_meta($current_data->ID, 'valuta'),
            'reviews'                 => carbon_get_post_meta($current_data->ID, 'reviews_casino'),
            'faq_title'               => carbon_get_post_meta($current_data->ID, 'faq_title'),
            'faq'                     => carbon_get_post_meta($current_data->ID, 'faq'),
            'video_banner'            => carbon_get_post_meta($current_data->ID, 'video_banner'),
            'video_iframe'            => carbon_get_post_meta($current_data->ID, 'video_iframe'),
            'event'                   => carbon_get_post_meta($current_data->ID, 'event'),
            'title_stycky_left_link'  => carbon_get_post_meta($current_data->ID, 'title_stycky_left_link'),
            'title_stycky_right_link' => carbon_get_post_meta($current_data->ID, 'title_stycky_right_link'),
            'relative_payments'       => $relative_payments,
            'relative_vendors'        => $relative_vendors,
            'relative_pay_out'        => $relative_pay_out,
            'date'                    => $current_data->post_date,
            'date_modified'           => $current_data->post_modified,
            'how_to'                  => carbon_get_post_meta($current_data->ID, 'how_to_step'),
            'description_site'        => get_bloginfo(),
            'hreflang'                => get_headers_lang($current_data->ID)
        ];
        return $data_posts;
    }
    return $data_post;
}
function get_single_game_data($id){
    $data_post = [];
    $current_data = get_post($id);
    if(!empty($current_data)) {
        $amp_text = carbon_get_post_meta($current_data->ID, 'amp_content');
        $amp_text = empty($amp_text) ? parseAmpContent($current_data->post_content) : parseAmpContent($amp_text);

        $data_posts = [
            'id'                      => $current_data->ID,
            'title'                   => $current_data->post_title,
            'meta_title'              => carbon_get_post_meta($current_data->ID, 'meta_title'),
            'meta_description'        => carbon_get_post_meta($current_data->ID, 'meta_description'),
            'meta_keywords'           => carbon_get_post_meta($current_data->ID, 'meta_keywords'),
            'h1'                      => carbon_get_post_meta($current_data->ID, 'h1'),
            'content'                 => $current_data->post_content,
            'amp_content'             => $amp_text,
            'thumbnail'               => get_the_post_thumbnail_url($current_data->ID, 'full'),
            'date'                    => $current_data->post_date,
            'date_modified'           => $current_data->post_modified,
            'hreflang'                => get_headers_lang($current_data->ID)
        ];
        return $data_posts;
    }
    return $data_post;
}
function get_page_data($id) {
    $data_post = [];
    $current_data = get_post($id);
    if(!empty($current_data)) {
        $amp_text = carbon_get_post_meta($current_data->ID, 'amp_content');
        $amp_text = empty($amp_text) ? parseAmpContent($current_data->post_content) : parseAmpContent($amp_text);
        $data_posts = [
            'id'               => $current_data->ID,
            'title'            => $current_data->post_title,
            'meta_title'       => carbon_get_post_meta($current_data->ID, 'meta_title'),
            'meta_description' => carbon_get_post_meta($current_data->ID, 'meta_description'),
            'meta_keywords'    => carbon_get_post_meta($current_data->ID, 'meta_keywords'),
            'h1'               => carbon_get_post_meta($current_data->ID, 'h1'),
            'content'          => $current_data->post_content,
            'amp_content'      => $amp_text,
            'description_site' => get_bloginfo(),
            'thumbnail'        => get_the_post_thumbnail_url($current_data->ID, 'full'),
            'date'             => $current_data->post_date,
            'date_modified'    => $current_data->post_modified,
            'hreflang'         => get_headers_lang($current_data->ID)
        ];
        return $data_posts;
    }
    return $data_post;
}
/* Single posts end */

/* Support functions */
function url_to_post_id($url, $post_type) {
    $query = new WP_Query( array(
        'post_type'         => $post_type,
        'name'              => $url,
        'post_status'       => 'publish'
    ));
    if(!isset($query->post)) return 0;
    else return $query->post->ID;
}
function get_short_link($id) {
    return str_replace(HOST_URL, '', get_permalink($id));
}
function get_public_post_id($post_type) {
    $arr_id = [];
    $query = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type'    => $post_type,
        'post_status'  => 'publish',
        'orderby'      => 'meta_value_num',
        'order'        => 'DESC',
        'meta_query' => array(
            array(
                'key' => '_rating',
            )
        ),
    ));
    if(empty($query->posts)) return $arr_id;
    foreach ($query->posts as $item ) $arr_id[] = $item->ID;
    return $arr_id;
}
function get_permalink_and_title_by_arr_id($arr_id) {
    if(empty($arr_id)) return [];
    $data = [];
    foreach ($arr_id as $id) {
        $data[] = [
            'title' => get_the_title($id),
            'permalink' => get_short_link($id)
        ];
    }
    return $data;
}
function get_menu($id){
    $data = [];
    $menu = wp_get_nav_menu_items($id);
    if(!empty($menu)) {
        foreach ($menu as $item) {
            $data[] = [
                'title'     => $item->title,
                'permalink' => str_replace(HOST_URL, '', $item->url)
            ];
        }
    }
    return $data;
}
function get_sitemap_by_arr_posts($posts, $priority) {
    if(empty($posts)) return [];
    $data = [];
    foreach ($posts as $item) {
        $data[] = [
            'url'  => get_short_link($item->ID),
            'lastmod'    => substr($item->post_modified, 0, 10),
            'changefreq' => 'daily',
            'priority'   => get_short_link($item->ID) === '/' ? 1 : $priority
        ];
    }
    return $data;
}
function get_headers_lang($id){
    $headers = [];
    $headers_lang = carbon_get_post_meta($id, 'headers_meta_lang');
    if(!empty($headers_lang)) {
        foreach ($headers_lang as $item) {
            $headers[] = [
                'lang' => $item['headers_lang'],
                'link' => $item['headers_link']
            ];
        }
    }
    return $headers;
}
/* Support functions end */