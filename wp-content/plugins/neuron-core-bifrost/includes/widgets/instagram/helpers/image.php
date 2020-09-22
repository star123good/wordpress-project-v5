<?php
/**
 * Image Attributes
 */

$resolution = $settings['resolution'] ? $settings['resolution'] : 'standard';

$image = [
    'likes' => $data->likes->count,
    'comments' => $data->comments->count,
    'link' => $data->link
];

switch ($resolution) {
    default:
        $image['url'] = $data->images->$resolution->url;
        $image['width'] = $data->images->$resolution->width;
        $image['height'] = $data->images->$resolution->height;
        break;
    case 'standard':
        $image['url'] = $data->images->standard_resolution->url;
        $image['width'] = 640;
        $image['height'] = 640;
        break;
    case 'low_resolution':
        $image['url'] = $data->images->low_resolution->url;
        $image['width'] = 320;
        $image['height'] = 320;
        break;
}