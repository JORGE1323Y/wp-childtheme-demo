<?php
/* 
 * Template personalizzato della home page
 * Questo file sostituisce completamente la home del tema padre.
 * Serve come demo tecnica per mostrare l'override tramite child theme.
 */
get_header();
?>

<main class="container-simone">

    <!-- Titolo principale -->
    <h1 style="text-align:center; margin-bottom:20px;">
        HOME OVERRIDE — CHILD THEME
    </h1>

    <!-- Box informativo introduttivo -->
    <div style="background:#fff3cd; padding:20px; border-left:5px solid #ffca2c; border-radius:6px;">
        <strong>Questa home è generata dal tema child.</strong><br>
        Questa sezione dimostra come un file del child theme può sovrascrivere interamente
        il template della homepage originale.
    </div>

    <!-- Paragrafo descrittivo -->
    <p style="margin-top:25px; font-size:18px; line-height:1.6;">
        Questo progetto è una piccola demo tecnica dove applico modifiche reali ai template di WordPress.
        La pagina che stai visualizzando è gestita da un file <code>front-page.php</code> inserito
        all’interno del tema child, che prende il controllo della home e ne modifica struttura e layout.
    </p>

    <hr style="margin:40px 0;">

    <!-- Titolo della sezione articoli -->
    <h2 style="text-align:center; margin-bottom:30px;">Articoli recenti</h2>

    <!-- Griglia responsiva delle card -->
    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));
        gap:25px;
    ">
        <?php
        // Query personalizzata per mostrare gli articoli recenti
        $posts = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,      // Mostra solo 3 articoli
            'orderby'        => 'date',
            'order'          => 'DESC'
        ));

        // Loop degli articoli
        if ($posts->have_posts()):
            while ($posts->have_posts()): 
                $posts->the_post(); ?>

                <!-- Singola card articolo -->
                <div style="
                    background:#ffffff;
                    padding:20px;
                    border-radius:12px;
                    box-shadow:0 4px 15px rgba(0,0,0,0.08);
                ">
                    <h3 style="margin-top:0;"><?php the_title(); ?></h3>

                    <p style="color:#777; margin-bottom:12px;">
                        <?php echo get_the_date(); ?>
                    </p>

                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                    </p>

                    <a href="<?php the_permalink(); ?>">→ Leggi tutto</a>
                </div>

            <?php endwhile;

        // Nessun articolo trovato
        else:
            echo "<p>Nessun articolo trovato.</p>";
        endif;

        // Ripristina la query principale
        wp_reset_postdata();
        ?>
    </div>

</main>

<?php
get_footer();
