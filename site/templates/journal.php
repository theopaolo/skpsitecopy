<?php snippet("header"); ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">

  <div class="header" style="color:#E5194C">
    <?php snippet("navbtn"); ?>
    <?php snippet("menu"); ?>
  </div>

  <span class="transition"></span>

    <main data-barba="container" data-barba-namespace="journal" data-color="#FFFFFF"  data-transition="#07453A" style="background-color:#FFFFFF;color:#E5194C">
        <div class="donate" style="border-color: #FFE019 "><span style="background-color:#FFE019; color:#E5194C"><a href="<?= page(
            "donation"
        )->url() ?>"> Donate</a></span></div>
        <div class="donate shopbubl">
            <a href="https://saffronkitchenproject.bigcartel.com/products" target="_blank">
                <span class="donspan" style="background-color:#FFE019; color:#E5194C">Shop</span>
            </a>
        </div>

        <div class="journalpage content grid-cols-12">
            <div class="publications span-3-11 lg-span-2-12">
                <h2 class="text-bg mb-3">Journal.</h2>

                <section>
                    <?php
                    $publications = $page
                        ->children()
                        ->listed()
                        ->sortBy("published", "desc");
                    $latestPublication = $publications->first();
                    if ($latestPublication): ?>
                        <a href="<?= $latestPublication->url() ?>">
                            <article class="featured flex flex-col">
                                <?php if (
                                    $cover = $latestPublication
                                        ->cover()
                                        ->toFile()
                                ): ?>
                                    <div class="cover" style="background-image: url('<?= $cover->url() ?>');"> </div>
                                <?php endif; ?>
                                <div>
                                    <span class="date"><?= $latestPublication
                                        ->published()
                                        ->toDate("d M Y") ?></span>
                                    <h3 class="title"><?= $latestPublication->title() ?></h3>
                                    <?php if (
                                        $excerpt = $latestPublication->excerpt()
                                    ): ?>
                                        <p class="excerpt"><?= $excerpt ?></p>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </a>
                    <?php endif;
                    ?>
                </section>

                <section class="all-pubs grid grid-cols-3 cols-gap-2 rows-gap-2">
                    <?php foreach (
                        $page
                            ->children()
                            ->listed()
                            ->sortBy(function ($page) {
                                return $page->published()->toDate();
                            }, "desc")
                        as $publication
                    ): ?>
                        <?php if (
                            $publication->featured()->toBool() === false
                        ): ?>
                            <a href="<?= $publication->url() ?>">
                                <article>
                                    <?php if (
                                        $cover = $publication->cover()->toFile()
                                    ): ?>
                                        <div class="cover" style="background-image: url('<?= $cover->url() ?>');"></div>
                                    <?php endif; ?>
                                    <div>
                                        <span class="date"><?= $publication
                                            ->published()
                                            ->toDate("d M Y") ?></span>
                                        <h3 class="title"><?= $publication->title() ?></h3>
                                    </div>
                                </article>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </section>

            </div>
        </div>.
        <?php snippet("footer", ["class" => "journalfoot"]); ?>

    </main>

    <script src="assets/dist/js/main.js"></script>
</body>
</html>
