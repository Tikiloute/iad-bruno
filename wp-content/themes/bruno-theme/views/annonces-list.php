<?php if (!empty($annonces)) : ?>
    <div class="article-grid">

        <?php foreach ($annonces as $annonce) : ?>
            <?php setup_postdata($GLOBALS['post'] =& $annonce); ?>

            <?php
                $prix  = get_field('prix', $annonce->ID);
                $m2    = get_field('m2', $annonce->ID);
                $lieu  = get_field('lieu', $annonce->ID);
                $type  = get_field('type', $annonce->ID);
                $dpe   = get_field('dpe', $annonce->ID);
                $lien  = get_field('lien', $annonce->ID);
            ?>

            <article class="article-card<?php echo $lien ? ' is-clickable' : ''; ?>" <?php if ($lien) : ?> onclick="window.open('<?php echo esc_url($lien); ?>', '_blank');"<?php endif; ?>>

                <div class="article-card-thumb">
                    <?php if (has_post_thumbnail($annonce->ID)) : ?>
                        <?php echo get_the_post_thumbnail($annonce->ID, 'card-thumbnail'); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default.png'); ?>"
                             alt="Image par défaut"
                             class="fallback-thumbnail"
                             width="600" height="400" />
                    <?php endif; ?>
                </div>

                <div class="article-card-body">

                    <h2 class="article-card-title"><?php the_title(); ?></h2>

                    <?php
                    $categories = get_the_category();
                    $valid_cats = [];

                    $icon_map = [
                        'Exclusivité'     => ['icon' => 'fa-star',           'class' => 'badge-exclu'],
                        'Nouveauté'       => ['icon' => 'fa-bolt',           'class' => 'badge-new'],
                        'Sous compromis'  => ['icon' => 'fa-hourglass-half', 'class' => 'badge-compromis'],
                        'Vendu'           => ['icon' => 'fa-ban',            'class' => 'badge-vendu']
                    ];

                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
                            if ($cat->name !== 'Non classé') {
                                $data = $icon_map[$cat->name] ?? ['icon' => 'fa-tag', 'class' => 'badge-default'];
                                $valid_cats[] = '<span class="article-badge ' . esc_attr($data['class']) . '">
                                    <i class="fas ' . esc_attr($data['icon']) . '"></i> ' . esc_html($cat->name) . '
                                </span>';
                            }
                        }
                    }

                    if (!empty($valid_cats)) :
                    ?>
                    <div class="article-card-meta">
                        <?php echo implode(' ', $valid_cats); ?>
                    </div>
                    <?php endif; ?>


                    <ul class="annonce-infos">
                        <?php if ($prix = get_field('prix')) : ?>
                            <li><span class="champ-label"><i class="fas fa-euro-sign icon-field"></i> Prix</span> <span class="champ-valeur"><?= number_format($prix, 0, ',', ' ') ?> €</span></li>
                        <?php endif; ?>
                        
                        <?php if ($m2 = get_field('m2')) : ?>
                            <li><span class="champ-label"><i class="fas fa-ruler-combined icon-field"></i> Surface</span> <span class="champ-valeur"><?= esc_html($m2) ?> m²</span></li>
                        <?php endif; ?>

                        <?php if ($lieu = get_field('lieu')) : ?>
                            <li><span class="champ-label"><i class="fas fa-map-marker-alt icon-field"></i> Lieu</span> <span class="champ-valeur"><?= esc_html($lieu) ?></span></li>
                        <?php endif; ?>

                        <?php if ($type = get_field('type')) : ?>
                            <li><span class="champ-label"><i class="fas fa-home icon-field"></i> Type</span> <span class="champ-valeur"><?= esc_html($type) ?></span></li>
                        <?php endif; ?>

                    </ul>

                    <?php if (has_excerpt()) : ?>
                        <p class="article-card-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </p>
                    <?php endif; ?>

                    <?php 
                        if(!empty($lien)){
                            echo '<span class="read-more-arrow animated">→</span>';
                        }
                   ?>

                </div>
            </article>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php else : ?>
    <p>Aucune annonce pour le moment.</p>
<?php endif; ?>
