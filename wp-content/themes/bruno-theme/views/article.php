<div class="single-post-meta">
  <?php
    $categories = get_the_category();
    if (!empty($categories)) {
        $cat = $categories[0]; // première catégorie
        if ($cat->name !== 'Non classé') {
            $icon_map = [
              'Patrimoine' => ['icon' => 'fa-landmark',   'class' => 'badge-patrimoine'],
              'Sport'      => ['icon' => 'fa-futbol',     'class' => 'badge-sport'],
              'Évènement'  => ['icon' => 'fa-calendar',   'class' => 'badge-evenement'],
              'Culture'    => ['icon' => 'fa-paint-brush','class' => 'badge-culture'],
              'Politique'  => ['icon' => 'fa-gavel',      'class' => 'badge-politique'],
              'Economie'   => ['icon' => 'fa-chart-line', 'class' => 'badge-economie'],
              'Divers'     => ['icon' => 'fa-tag',        'class' => 'badge-divers']
            ];

            $data = $icon_map[$cat->name] ?? ['icon' => 'fa-tag', 'class' => 'badge-default'];

            echo '<span class="article-badge ' . esc_attr($data['class']) . '">
                    <i class="fas ' . esc_attr($data['icon']) . '"></i> ' . esc_html($cat->name) . '
                  </span>';
        }
    }
  ?>
  
  <time datetime="<?php echo get_the_date('c'); ?>">
    <?php echo 'Publié le ' . get_the_date('d M Y'); ?>
  </time>
</div>
