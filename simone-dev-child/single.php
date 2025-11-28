<?php
/* 
 * Template personalizzato per i singoli articoli
 * Questo file sostituisce il single.php del tema padre.
 * Mostra come il child theme può modificare la struttura delle pagine interne.
 */
get_header();
?>

<main class="container-simone">

    <!-- BOX INFO ARTICOLO -->
    <div style="
        background:#f0f0f0;
        padding:15px 20px;
        border-left:5px solid #333;
        margin-bottom:25px;
        border-radius:6px;
    ">
        <strong><?php the_title(); ?></strong><br>
        Pubblicato il: <?php echo get_the_date(); ?><br>

        <!-- Calcolo tempo di lettura -->
        Tempo di lettura:
        <?php
            $content  = get_post_field('post_content', get_the_ID());
            $words    = str_word_count(wp_strip_all_tags($content));
            $minutes  = ceil($words / 200); // media lettura
            echo $minutes . " min";
        ?>
    </div>

    <!-- CONTENUTO DELL'ARTICOLO -->
    <article style="line-height:1.7; font-size:18px; margin-bottom:40px;">
        <?php the_content(); ?>
    </article>

    <!-- BOX AUTORE -->
    <div style="
        margin-top:40px;
        padding:20px;
        border:1px solid #ccc;
        background:#fafafa;
        border-radius:6px;
    ">
        <h3 style="margin-top:0;">Autore</h3>
        <p style="margin:0;">
            Questo articolo rientra nel progetto demo di <strong>Simone Sugliano</strong>,
            dedicato allo sviluppo tramite child theme e alla personalizzazione
            dei template WordPress.
        </p>
    </div>

    <hr style="margin:50px 0;">

    <!-- SEZIONE ARTICOLI CORRELATI / ALTRI ARTICOLI -->
    <h2 style="text-align:center; margin-bottom:30px;">Altri articoli</h2>

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));
        gap:25px;
    ">
        <?php
        // Query per mostrare 3 articoli diversi da quello corrente
        $related = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'date',
            'order'          => 'DESC'
        ));

        if ($related->have_posts()):
            while ($related->have_posts()):
                $related->the_post(); ?>

                <!-- Card articolo -->
                <div style="
                    background:#ffffff;
                    padding:20px;
                    border-radius:12px;
                    box-shadow:0 4px 15px rgba(0,0,0,0.08);
                    transition:.2s;
                ">
                    <h3 style="margin-top:0;"><?php the_title(); ?></h3>

                    <p style="color:#777; margin-bottom:12px;">
                        <?php echo get_the_date(); ?>
                    </p>

                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                    </p>

                    <a href="<?php the_permalink(); ?>" style="font-weight:bold;">
                        → Leggi tutto
                    </a>
                </div>

            <?php endwhile;
        else:
            echo "<p>Nessun altro articolo disponibile.</p>";
        endif;

        wp_reset_postdata();
        ?>
    </div>

</main>

<?php get_footer(); ?>
