<?php snippet("header"); ?>
<?php
  $imgRound = new Asset("assets/img/SKPround.jpg");
  $imgRectangle = new Asset("assets/img/SKPrectangle.jpg");
?>

<body data-barba="wrapper" style="background-color:#E5194C;color:#FFE019">

  <div class="header" style="color:#FFE019">
    <?php snippet("navbtn"); ?>
    <?php snippet("menu"); ?>
  </div>

  <span class="transition"></span>

  <main class="homepage relative" data-barba="container" data-barba-namespace="home" data-color="#E5194C" data-transition="#FFE019" style="background-color:#E5194C;color:#FFE019">

    <div class="donate">
      <a href="<?= page("donation")->url() ?>">
        <span class="donspan" style="background-color:#07453A; color:#FFE019">Donate </span>
      </a>
    </div>

    <div class="donate shopbubl">
      <a href="https://saffronkitchenproject.bigcartel.com/products" target="_blank">
        <span class="donspan" style="background-color:#07453A; color:#FFE019">Shop </span>
      </a>
    </div>

    <section class="content intro no-gap storyAnim bgcolor bgpink">
      <h1 class="span-3-10 storyText flex flex-col"><span id="textFirst">Eat · Cook · Learn · Belong</span> <span id="textSecond">your culinary community</span></h1>

      <span class="arrowintro">
        <svg width="30" height="61" viewBox="0 0 30 61" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M30 41.3C19.3966 41.3 15 44.372 15 60.5M15 60.5C15 44.372 10.6034 41.3 -5.91332e-07 41.3M15 60.5L15 0.499999" stroke="#FFE019"/>
        </svg>
      </span>

      <div class="bottombtn span-4-10 lg-span-2-12 xs-span-1-13">
          <div class="bottom-circle" style="background-color:#FFE019;"></div>
          <a class="next-section" style="color:#E5194C">Our Story</a>
      </div>
    </section>

    <section class="storypage content grid-cols-12 bgcolor bgyellow" id="story">
        <div class="story-intro span-4-10 lg-span-2-12 xs-span-1-13">

          <h2 class="text-lg mb-2">Saffron Kitchen Project is about people, food, building community and creating lasting opportunities for vulnerable people in Athens. Food is about love, comfort and hospitality. There is a kindness in the practice of preparing meals for others, the perfect opportunity to make people feel welcome. We’re here to support each other, using food as the tool kit.</h2>

          <?php if ($imgRound->exists() && $imgRound->isReadable()): ?>
              <img class="miam" src="<?= $imgRound
                  ->thumb(["width" => 500])
                  ->url() ?>" alt="SKP team">
          <?php endif; ?>

          <p>Drawing on many years of experience in the hospitality industry as well as the humanitarian sector we identified a need for access to nutritious food, professional training and job opportunities for refugees.</p>

          <p>At Saffron Kitchen Project we aim to do exactly that. We cook meals together, provide specialised training and create opportunities for people with refugee backgrounds to support themselves and grow their own skill sets.</p>

        </div>

        <div class="story-end span-4-10 lg-span-2-12 xs-span-1-13">

          <?php if ($imgRound->exists() && $imgRound->isReadable()): ?>
              <img src="<?= $imgRectangle
                  ->thumb(["width" => 800])
                  ->url() ?>" alt="SKP Meal">
          <?php endif; ?>

          <figure class="mb-2">
            <blockquote>
              <p class="text-xl">‘Food can bring people together in a way nothing else could.’</p>
            </blockquote>
            <figcaption>Yotam Ottolenghi</figcaption>
          </figure>

          <p>With this in mind we came up with our pillars, the cornerstones of what SKP is built on… </p>

          <span class="arrow">
            <svg width="30" height="61" viewBox="0 0 30 61" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M30 41.3C19.3966 41.3 15 44.372 15 60.5M15 60.5C15 44.372 10.6034 41.3 -5.91332e-07 41.3M15 60.5L15 0.499999" stroke="#07453A"/>
            </svg>
          </span>
        </div>

        <div class="bottombtn span-4-10 lg-span-2-12 xs-span-1-13">
          <div class="bottom-circle2" style="background-color:#07453A;"></div>
          <a class="next-section2" style="color:#FFE019">Our Pillars</a>
        </div>
    </section>

    <section class="goals-wrapper bgcolor bggreen " id="pillars">
      <div class="goals-content">
        <article class='goal employ'>
            <h1>Employ</h1>
            <p>We demonstrate our commitment to tackling unemployment in Greece by not only employing but also generating job opportunities for people from the refugee and hosting community.</p>
        </article>
        <article class='goal mourish'>
            <h1>Nourish</h1>
            <p>Provide vulnerable people with warm, nutritious and inventive meals in a dignified and sustainable way. We partner with several organisations that support vulnerable people throughout Athens, distributing delicious meals whilst avoiding food waste as much as possible.</p>
        </article>
        <article class='goal teach'>
            <h1>Train</h1>
            <p>We offer free culinary education and vocational training in partnership with IEK Delta. In an effort to prepare our students for work in the hospitality industry, the programme comprises culinary skills as well as soft skills training such as teamwork, leadership and time management. Upon completion students will receive an accredited EOPEP certificate which will aid them in entering the job market.</p>
        </article>
      </div>
    </section>

    <?php snippet ("otherpages");?>
    <?php snippet("footer", ["class" => "homefoot"]); ?>
  </main>
  <?= js("assets/dist/js/main.js") ?>
</body>
</html>
