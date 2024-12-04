<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

## 주소 리다이랙트 (http > https로 접속)
if (strpos(G5_URL, "http://") !== false) goto_url(str_replace("http://", "https://", G5_URL).$_SERVER['REQUEST_URI']);