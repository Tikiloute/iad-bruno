
<?php if (!empty($articles)) : ?>
    <div class="article-grid">
        <?php foreach ($articles as $post) : setup_postdata($post); ?>
            <article class="article-card">

    <?php if (has_post_thumbnail()) : ?>
        <div class="article-card-thumb">
            <?php the_post_thumbnail('card-thumbnail'); ?>
        </div>
    <?php else : ?>
        <div class="article-card-thumb">
            <?php
            $image_url = get_the_post_thumbnail_url(10, 'card-thumbnail');
            if (!$image_url) {
                $image_url = get_template_directory_uri() . '/assets/images/default.png';
            }
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Image par défaut" class="fallback-thumbnail" width="600" height="400" />
        </div>
    <?php endif; ?>

    <div class="article-card-body">

<!-- Les catégories sont gérées ici -->
        <?php
        $categories = get_the_category();
        $article_badges = [];

        $icon_map = [
            'Patrimoine' => ['icon' => 'fa-landmark',   'class' => 'badge-patrimoine'],
            'Sport'      => ['icon' => 'fa-futbol',     'class' => 'badge-sport'],
            'Évènement'  => ['icon' => 'fa-calendar',   'class' => 'badge-evenement'],
            'Culture'    => ['icon' => 'fa-paint-brush','class' => 'badge-culture'],
            'Politique'  => ['icon' => 'fa-gavel',      'class' => 'badge-politique'],
            'Economie'   => ['icon' => 'fa-chart-line', 'class' => 'badge-economie'],
            'Divers'     => ['icon' => 'fa-tag',        'class' => 'badge-divers']
        ];

        if (!empty($categories)) {
            foreach ($categories as $cat) {
                if ($cat->name !== 'Non classé') {
                    $data = $icon_map[$cat->name] ?? ['icon' => 'fa-tag', 'class' => 'badge-default'];
                    $article_badges[] = '<span class="article-badge ' . esc_attr($data['class']) . '">
                        <i class="fas ' . esc_attr($data['icon']) . '"></i> ' . esc_html($cat->name) . '
                    </span>';
                }
            }
        }

        if (!empty($article_badges)) :
        ?>
        <div class="article-card-meta">
            <?php echo implode(' ', $article_badges); ?>
        </div>
        <?php endif; ?>
<!-- fin de catégories -->
        
        <h2 class="article-card-title"><?php the_title(); ?></h2>

        <time class="article-card-date" datetime="<?php echo get_the_date('c'); ?>">
            <?php echo "Publié le ".get_the_date('d M Y'); ?>
        </time>

        <p class="article-card-excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
        </p>

        <div class="article-card-footer">
            <a href="<?php the_permalink(); ?>" class="article-read-more">
                Lire l'article <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</article>

        <?php endforeach; wp_reset_postdata(); ?>
    </div>
<?php else : ?>
    <p>Aucun article pour le moment.</p>
<?php endif; ?>
