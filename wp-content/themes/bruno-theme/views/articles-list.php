
<?php if (!empty($articles)) : ?>
    <div class="article-grid">
        <?php foreach ($articles as $post) : setup_postdata($post); ?>
            <article class="article-card">
                <a href="<?php the_permalink(); ?>" class="article-card-link">

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
                        <div class="article-card-meta">
                        <span class="article-categories">
                            <i class="fas fa-folder-open" aria-hidden="true"></i>
                            <?php the_category(', '); ?>
                        </span>
                        </div>
                        <h2 class="article-card-title"><?php the_title(); ?></h2>
                        <time class="article-card-date" datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date('d M Y'); ?>
                        </time>
                       <p class="article-card-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                       </p>
                    </div>
                </a>
            </article>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
<?php else : ?>
    <p>Aucun article pour le moment.</p>
<?php endif; ?>
