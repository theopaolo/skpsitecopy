<footer class="<?php if (isset($class) == true): echo $class ; endif  ?>">

  <div class="mb-6">
    <div id="mc_embed_signup mb-4">
      <form action="https://saffronkitchenproject.us5.list-manage.com/subscribe/post?u=b037ab16b340fb1fe8aff1122&amp;id=c6b517f71e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate flex flex-col items-center" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll" class="flex flex-col items-center">
          <h2>Sign up to our newsletter</h2>
          <div class="mc-field-group">
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b037ab16b340fb1fe8aff1122_c6b517f71e" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="SEND" name="subscribe" id="mc-embedded-subscribe" class="button m-0"></div>
        </div>
      </form>
    </div>
  </div>

    <div class="grid grid-cols-4 gap-105 lg-grid-cols-2 sm-grid-cols-1 xm-row-gap-105 mb-4 xs-mb-unset">

        <div class="flex flex-col align-start ">
            <span>Say Hi!</span>
            <a href="mailto:<?= Str::encode($site->skpmail()) ?>"> <?= Str::encode($site->skpmail()) ?> </a>
            <p class="mb-4 xs-mb-unset">Registered Charity Number: 1195986</p>
        </div>

        <div class="flex flex-col align-start  mb-4 xs-mb-unset">
            <span>Follow us on</span>
            <a href="https://www.facebook.com/saffronkitchenproject" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/saffronkitchenproject/" target="_blank">Instagram</a>
            <a href="https://www.youtube.com/channel/UC6e-V4wXxMapOz_czX0VNmQ" target="_blank">Youtube</a>
            <a href="https://www.linkedin.com/company/76985121/" target="_blank">LinkedIn</a>

        </div>
        <div>
            <span>Sitemap</span>
            <ul>
                <li><a href="<?= $site->url() ?>#story" class="barba-prevent">Story</a></li>
                <li><a href="<?= $site->url() ?>#pillars" class="barba-prevent">Pillars</a></li>
                <li><a href="<?= page('about')->url() ?>">About</a></li>
                <li><a href="<?= page('getinvolved')->url() ?>">Get involved</a></li>
                <li><a href="<?= page('donation')->url() ?>">Donate</a></li>
                <li><a href="<?= page('journal')->url() ?>">Journal</a></li>
                <li><a href="<?= page('privacy')->url() ?>">Privacy policy</a></li>
                <li><a href="https://saffronkitchenproject.bigcartel.com/products" target="_blank">Shop</a></li>
            </ul>
        </div>
        <?php if($site->yearlyreports()->isNotEmpty()): ?>
        <div class="mt-1">
          <span>Annual reports</span>
          <ul>
            <?php
            $reports =  $site->yearlyreports()->toFiles();
            foreach ($reports as $report): ?>
              <li> <a href="<?= $report->url() ?>"><?= $report->title() ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
        <?php endif ?>
    </div>
    <div class="flex justify-center signature flex-col items-center">
      <a href="https://shimsham.design" target="_blank"><?= svg('assets/img/logoshsh.svg') ?></a>
      <div class="authors">
        <a href="https://nadiners.com/" target="_blank">Design by Nadine RS</a>
        <a href="https://www.instagram.com/milena_illustrations/" target="_blank">Illustrations by Milena W</a>
        <a href="https://theogoedert.com" target="_blank">Code by Théo GS</a>
      </div>
    </div>
</footer>