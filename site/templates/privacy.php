<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">
    
  <div class="header">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>  

  <span class="transition"></span>

    <main data-barba="container" data-barba-namespace="privacy" data-color="#FFFFFF"  data-transition="#07453A" style="background-color:#FFFFFF;color:#E5194C">
        
        <div class="privacypage  content grid-cols-12"> 

        <div class="pub-header span-3-11 lg-span-2-12 md-span-3-11">
            <h2 class="text-bg mb-5 sm-mb-2"><?= $page->title() ?></h2>
        </div>

        <div class="publications span-3-11 lg-span-2-12 md-span-3-11">
            <?= $page->text()->kt() ?>
        </div>
        
        </div>
        <?php snippet('footer', ['class' => 'journalfoot']) ?>
    </main> 

    <script src="../assets/dist/js/main.js"></script>
</body>
</html>