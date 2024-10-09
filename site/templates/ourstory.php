<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">
    
  <div class="header">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>  

  <span class="transition"></span>


    <main data-barba="container" data-barba-namespace="story" data-color="#FFE019"  data-transition="#07453A" style="background-color:#FFE019;color:#07453A">
    
    <div class="donate" style="border-color: #07453A "><span style="background-color:#07453A; color:#FFE019"><a href="<?= page('donation')->url() ?>"> Donate</a></span></div>

    <div class="storypage content grid-cols-12">
        <div class="story-intro span-4-10">

          <h1 class="text-lg mb-2">We are a non-profit Athens-based organisation that creates beautifully crafted, nutritious meals, inspired by multiple cultures, for displaced, vulnerable persons. </h1>
          
          <img src="assets/img/spices.png" alt="Spices">  

          <p>We simultaneously offer such persons the chance to be something more by creating a path to employment through vocational and hospitality training, so they might go on to lead prosperous independent and fulfilling lives. Finally, we generate jobs by employing from within the community - offering much needed legal work that promotes social inclusion. </p>
          
        </div>

        <div class='relative story-bubls span-4-10'>
          <div class="bubl">people</div>
          <div class="bubl">community</div>
          <div class="bubl">food</div>
        </div>

        <div class="story-end span-4-10">
          <p>This is a project about people, food and building community and lasting opportunity for vulnerable persons (refugees, migrants, homeless) in Athens, who face a number of challenges as they go about making their lives. Food not only nourishes - it welcomes and dignifies. Food is about love, comfort and hospitality. There is a kindness in the practice of preparing food, a wish that you will be well, healthy and replete, as well as warm and safe. </p>
          
          <img src="assets/img/table.jpg" alt="Sharing food">
         
          <h2 class='text-lg mb-2'>Why we are more than just a free meal</h2>
          
          <p>We empower displaced persons with cooking skills that can kickstart prosperous much-needed careers. Learning to cook is hospitable and collective, it comes with conversation and togetherness, it is the bond of family and friendship and the connection to community and culture. We’re here to look after each other, using food as the tool kit.</p>
          
          <span>
            <svg width="30" height="61" viewBox="0 0 30 61" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M30 41.3C19.3966 41.3 15 44.372 15 60.5M15 60.5C15 44.372 10.6034 41.3 -5.91332e-07 41.3M15 60.5L15 0.499999" stroke="#FFE019"/>
            </svg>
          </span>

        </div>

        <div class="bottombtn span-4-10">
          <div class="butbtn" style="background-color:#07453A;"></div>
          <a class="nextpage" style="color:#FFE019" href="<?= page('goals')->url() ?>">Our Goals</a>
        </div>
    </div>    

    </main> 
    <script src="assets/dist/js/main.js"></script>
</body>
</html>