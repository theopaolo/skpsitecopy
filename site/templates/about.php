<?php snippet('header') ?>
<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">
  <div class="header bgwhite" style="color:#07453A">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>

  <span class="transition"></span>

<main data-barba="container" data-barba-namespace="about" data-color="#FFFFFF" data-transition="#07453A"  style="background-color:#FFFFFF; color:#07453A">

        <div class="donate" style="border-color: #07453A ">
            <a href="<?= page('donation')->url() ?>">
                <span class="donspan" style="background-color:#07453A; color:#FFE019">Donate</span>
            </a>
        </div>

        <div class="donate shopbubl">
            <a href="https://saffronkitchenproject.bigcartel.com/" target="_blank">
                <span class="donspan" style="background-color:#07453A; color:#FFE019">Shop</span>
            </a>
        </div>

        <div class="aboutpage content grid-cols-12">

            <section class="about-intro span-4-10 lg-span-2-12 xs-span-1-13 ">
                <h2 class="text-bg mb-3">About Us.</h2>
                <p class="text-bold">Our mission is to support displaced and vulnerable people in building healthy, autonomous lives, using food as a toolkit. We are a community that leverages food so people can eat, cook, learn and most importantly, feel that they belong.</p>
                <P>We are a UK non-profit organisation based in Athens, founded in 2021.</P>
                <p>Saffron Kitchen Project (SKP) was started to address a problem; the refugee community and vulnerable people are facing many obstacles such as lack of food, job opportunities as well as inadequate social inclusion.</p>
                <p>Our solution is to create a path to employment through vocational and hospitality training as well as providing meals and job opportunities.</p>
                <p>Our team, built of hired chefs coming from the refugee community, admin staff and dedicated volunteers ensure the smooth running of the project, upholding our values and solidarity with other actors on the ground.</p>
                <p>SKP’s current culinary headquarters are provided by ANKAA Project in the diverse neighbourhood of Kypseli. Collaboration is the cornerstone of any good initiative, for this reason, in order to make SKP as successful as we can be, we collaborate with other organisations based in Athens, allowing us to have the greatest reach possible.</p>
                <p>Meet the team…</p>
            </section>

            <section class="span-3-11 lg-span-2-12 xs-span-1-13 team-members">
                <h2 class="title-about">SKP Team</h2>
                <?php foreach($page->skpteam()->toStructure() as $teamate):?>
                    <article class="team-member">
                        <div class="profile">
                            <?php if($profile = $teamate->profile()->toFile()) :?>
                                <?= $profile ?>
                            <?php endif ?>
                        </div>

                        <div>
                            <h3 class="m-0"><?= $teamate->name() ?></h3>
                            <p><?= $teamate->subtitle()?></p>
                            <?= $teamate->bio()->kt() ?>
                        </div>
                    </article>
                <?php endforeach ?>

                <h2 class="title-about">Board Members</h2>
                <?php foreach($page->board()->toStructure() as $baordmember):?>
                    <article class="team-member">
                        <div class="profile">
                            <?php if($profile = $baordmember->profile()->toFile()) :?>
                                <?= $profile ?>
                            <?php endif ?>
                        </div>

                        <div>
                            <h3><?= $baordmember->name() ?></h3>
                            <?= $baordmember->bio()->kt() ?>
                        </div>
                    </article>
                <?php endforeach ?>

            </section>
            <section class="about-partners span-3-11 lg-span-2-12 xs-span-1-13">
                <h2 class="title-about">Our Partners</h2>
                <article class="partner grid">
                <?php foreach($page->partners()->toStructure() as $partner):?>
                    <div class="circle flex items-center">
                        <a href="<?= $partner->link() ?>" target="_blank">
                            <?php if($profile = $partner->profile()->toFile()) :?>
                                <?= $profile ?>
                            <?php endif ?>
                        </a>
                    </div>
                <?php endforeach ?>

                </article>
            </section>
        </div>
        <?php snippet('footer') ?>
        <div class='illuholder'>
            <p></p>
        </div>
    </main>
    <script src="assets/dist/js/main.js"></script>
</body>
</html>