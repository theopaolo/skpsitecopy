<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">

  <div class="header" style="color:#07453A">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>

  <span class="transition"></span>


    <main data-barba="container" data-barba-namespace="involved" data-color="#FFE019" data-transition="#07453A"  style="background-color:#FFE019; color:#07453A">

        <div class="donate" style="border-color: #07453A "><span style="background-color:#07453A; color:#FFE019"><a href="<?= page('donation')->url() ?>">Donate</a></span></div>
        <div class="donate shopbubl">
          <a href="https://saffronkitchenproject.bigcartel.com/products" target="_blank">
            <span class="donspan" style="background-color:#07453A; color:#FFE019">Shop</span>
          </a>
        </div>
        <div class="aboutpage content grid-cols-12">

            <section class="involved-intro span-4-10 lg-span-2-12 xs-span-1-13">
                <h2 class="text-bg mb-3">Get Involved.</h2>

                <?= $page->text()->kt() ?>

                <div class="flex justify-between flex-wrap mb-4">
                  <!--<div>
                    <p class="mb-1">Send us an email at <a href="mailto:<?= Str::encode($site->skpmail()) ?>"> <?= Str::encode($site->skpmail()) ?> </a></p>
                  </div> -->
                </div>

                <h3  class="mb-2 text-bold">Job openings:</h3>
                <?php $jobnum = 0 ; foreach(page('journal')->children()->listed() as $joboffer) :?>
                    <?php if($joboffer->jobopen()->toBool() === true) : $jobnum++?>
                      <p> <a href="<?= $joboffer->url() ?>"> <?= $joboffer->title() ?> </a></p>
                    <?php endif ?>
                <?php endforeach?>
                <?php if($jobnum < 1) :?>
                  <p>No job openings for the moment, to be updated sign up to our newsletter</p>
                <?php endif ?>

            </section>

        </div>
        <?php snippet('footer') ?>
    </main>
    <script src="assets/dist/js/main.js"></script>
</body>
</html>