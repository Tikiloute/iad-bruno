<?php
class ArticlesController {
    public static function getRecentArticles($count = 10) {
        return get_posts([
            'post_type'      => 'post',
            'posts_per_page' => $count,
            'post_status'    => 'publish',
        ]);
    }
}
