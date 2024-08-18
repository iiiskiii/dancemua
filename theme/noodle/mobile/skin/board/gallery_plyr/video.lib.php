<?php
if (!defined('_GNUBOARD_')) exit;

// 주어진 URL로부터 비디오 ID와 제공자를 추출하여 배열로 반환하는 함수
function get_video_info($url) {
    $video_id = '';
    $provider = '';

    // YouTube URL 패턴
    $youtube_pattern =
        '%^# Match any YouTube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # $1: Required 10-12 character ID
        %x';

    // Vimeo URL 패턴
    $vimeo_pattern =
        '%^# Match Vimeo URL
        (?:https?://)?      # Optional scheme. Either http or https
        (?:player\.)?       # Optional subdomain
        vimeo\.com/         # Domain
        (?:video/)?         # Optional video subdirectory
        (\d+)               # $1: Vimeo video ID
        %x';

    // YouTube URL 확인
    if (preg_match($youtube_pattern, $url, $matches)) {
        $video_id = $matches[1];
        $provider = 'youtube';
    }
    // Vimeo URL 확인
    elseif (preg_match($vimeo_pattern, $url, $matches)) {
        $video_id = $matches[1];
        $provider = 'vimeo';
    }

    // 배열로 반환
    return array(
        'video_id' => $video_id,
        'provider' => $provider
    );
}