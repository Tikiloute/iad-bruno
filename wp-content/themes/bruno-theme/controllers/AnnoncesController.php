<?php
class AnnoncesController {
    public static function getRecentAnnonces($count = 15) {
        return get_posts([
            'post_type'      => 'annonces',
            'posts_per_page' => $count,
            'post_status'    => 'publish',
        ]);
    }
}
