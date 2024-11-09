<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">

  <div class="header bgwhite">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>

  <span class="transition"></span>


    <main data-barba="container" data-barba-namespace="publication" data-color="#FFFFFF"  data-transition="#07453A" style="background-color:#FFFFFF;color:#E5194C">
        <div class="donate" style="border-color: #FFE019 ">
            <a href="<?= page('donation')->url() ?>">
                <span style="background-color:#FFE019; color:#E5194C"> Donate</span>
            </a>
        </div>
        <div class="donate shopbubl">
            <a href="https://saffronkitchenproject.bigcartel.com/products" target="_blank">
                <span class="donspan" style="background-color:#FFE019; color:#E5194C">Shop</span>
            </a>
        </div>

        <div class="journalpage pubpage content grid-cols-12">

            <div class="pub-header span-3-11 lg-span-2-12 xs-span-1-13">
                <div class="head flex items-center">
                    <a href="<?= $page->parent()->url() ?>"><p>&larr; Journal.</p></a>
                    <p><?= $page->published()->toDate('d M Y') ?></p>
                </div>
                <h2 class="text-bg mb-5 sm-mb-2"><?= $page->title() ?></h2>
            </div>

            <div class="publications span-4-10 lg-span-2-12 md-span-3-11 xs-span-1-13">
                <?= $page->maincontent()->toBlocks() ?>
            </div>
        </div>
        .
        <?php snippet('footer', ['class' => 'journalfoot']) ?>
    </main>

    <script src="../assets/dist/js/main.js"></script>
</body>
</html>