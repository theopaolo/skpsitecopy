<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#07453A;color:#FFE019">
  <div class="header">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>  

  <span class="transition"></span>


  <main data-barba="container" data-barba-namespace="goals" data-color="#07453A" data-transition="#FFE019" style="background-color:#07453A;color:#FFE019">
    <div class="goals-content h-min-screen">
        <div class='roulette'>
            <div class="bubl b-top" data-id="employ">Employing</div>
            <div class="bubl b-left" data-id="mourish">Nourishing</div>
            <div class="bubl b-right" data-id="teach">Teaching</div>
        </div>
        <section class='roulette-content'>
            <div class="container active">
                <article class='goals' style=''>
                    <h1>Our goals</h1>
                    <p>We aim to do three things simultaneously; Nourish, Teach, Employ. <br> These operations are our three pillars - the foundations that will hold up an effective and prosperous initiative. </p>
                </article>
            </div>
            

            <article class='employ'>
                <h1>Employ</h1>
                <p>We generate jobs within our team to displaced persons - a stepping stone to prepare those keen to work within the wider Greek hospitality industry. </p>
            </article>

            <article class='mourish'>
                <h1>Nourish</h1>
                <p>Preparing heart-warming, nutritious, inventive meals in a dignified and sustainable way. The meals will be prepared by the community for the community. We will also distribute meals to partner organisations within Athens that support our cause to increase our community reach. </p>
            </article>

            <article class='teach'>
                <h1>Teach</h1>
                <p>Providing vocational training to equip students for prosperous career opportunities in the hospitality industry. In addition, we train them in the soft skills needed to excel in any sector. </p>
            </article>

            
        </section>
    </div>
    <?php snippet('footer') ?>
  </main>
  
  <script src="assets/dist/js/main.js"></script>

</body>
</html>