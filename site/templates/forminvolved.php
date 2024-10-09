<?php snippet('header') ?>

<body data-barba="wrapper" style="background-color:#FBE368;color:#07453A">
  <div class="header">
    <?php snippet('navbtn') ?>
    <?php snippet('menu') ?>
  </div>  

  <span class="transition"></span>


    <main data-barba="container" data-barba-namespace="involved" data-color="#FFFFFF" data-transition="#07453A" style="background-color:#FFFFFF; color:#07453A">
        <div class="content grid-cols-12">
            
            <section class="about-intro mb-3 span-4-10">
                <h2 class="text-bg">Get Involved.</h2>
            </section>

            <section class="involved-form span-4-10 mb-6">
                <form>
                    <div>
                        <label for="fname">What’s your name ?</label>
                        <input type="text" id="fname" name="fname">
                    </div>

                    <div>
                        <label for="lname">What’s your last name ?</label>
                        <input type="text" id="lname" name="lname">
                    </div>

                    <div>
                        <label for="bday">Your birthday?</label>
                        <input type="date" id="bday" name="bday">
                    </div>

                    <div>
                        <label for="email">What’s your e-mail ?</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div>
                        <label for="wherefrom">Where do you come from?</label>
                        <input type="text" id="wherefrom" name="wherefrom">
                    </div>

                    <div>
                        <label for="aboutyou" class="mb-1">Tell us a bit more about you!</label>
                        <ul class="mb-2">
                            <li>Why do you want to volunteer with us?</li>
                            <li>Do you have a specific skill you would like to teach?</li>
                            <li>How long would you like to volunteer with us?</li>
                            <li>What is your availability? (250 words max)</li>
                        </ul>
                    
                        <textarea rows="8" id="aboutyou" name="aboutyou" placeholder="Tell us a bit more about you!"></textarea>
                    </div>

                    <input type="submit" value="send" class="btnbub btnsend">
                </form>
            </section>
            
        </div>    
        <?php snippet('footer') ?>
    </main> 
    <script src="assets/dist/js/main.js"></script>
</body>
</html>