<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">
  <div class="header bgpink" style="color:#FFE019">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>

  <span class="transition"></span>
    <main data-barba="container" data-barba-namespace="donate" data-transition="#FFE019"  style="background-color:#E5194C; color:#FFE019">

      <div class="donate">
        <a href="https://saffronkitchenproject.bigcartel.com/products" target="_blank">
          <span class="donspan" style="background-color:#FFE019; color:#E5194C">Shop </span>
        </a>
      </div>

        <div class="donatepage content grid-cols-12">
          <section class="donate-intro span-4-10 mb-6 lg-span-2-12 sm-span-1-13">
            <article>
              <h2 class="text-bg mb-3">Donate.</h2>
              <div class="sm-grid-cols-1">
                  <?= $page->text()->kt() ?>
                  <div>
                    <a href="https://www.globalgiving.org/donate/100445/saffron-kitchen-project/" target="_blank"><h2 class="text-bg" style="color:#FFE019; text-shadow: none;">Global Giving</h2></a>
                    <a href="https://www.paypal.com/donate/?hosted_button_id=UQS9QB36L2A5S" target="_blank"><h2 class="text-bg" style="color:#FFE019; text-shadow: none;">Paypal</h2></a>
                  </div>
                  </br>
                  </br>
              </div>
              <div>

                  <h2 class="text-bg mb-2">Bank Transfers</h2>

                  <h4>Euro account holder: Saffron Kitchen Project</h4>
                  <p class="m-0">BIC: TRWIBEB1XXX</p>
                  <p  class="m-0">IBAN : BE66 9672 5647 5743</p>
                  <p  class="m-0">EUR - Avenue Louise 54, Room S52</p>
                  <p>Brussels, 1050, Belgium</p>

                  <h4>Pound account holder: Saffron Kitchen Project</h4>
                  <p class="m-0">Sort code: 23-14-70</p>
                  <p class="m-0">Account number: 50479579</p>
                  <p  class="m-0">IBAN: GB11 TRWI 2314 7050 4795 79</p>
                  <p  class="m-0">GBP - 56 Shoreditch High Street</p>
                  <p>London, E1 6JJ, United Kingdom</p>

                  <h4>Dollar account holder: Saffron Kitchen Project</h4>
                  <p class="m-0">Routing number: 084009519</p>
                  <p class="m-0">Account number: 9600002372166376</p>
                  <p  class="m-0">Account type: Checking</p>
                  <p  class="m-0">USD - 30 W. 26th Street, Sixth Floor</p>
                  <p>New York, NY 10010, United States</p>
                </div>
            </article>
          </section>
        </div>

        <?php snippet('footer') ?>
    </main>
    <script src="assets/dist/js/main.js"></script>
</body>
</html>