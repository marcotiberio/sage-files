<?php
/**
* Newsletter
*
*/

// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// Dynamic block ID
$block_id = 'newsletter-' . $block['id'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>

<section class="max-w-screen-xl mx-auto p-5">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-md sm:text-center">
        <h2 class="mb-4 text-3xl tracking-tight text-black font-extrabold text--<?php the_field('alignment'); ?>""><?php the_field('headline'); ?></h2>
        <p class="mx-auto mb-8 max-w-2xl font-light text-black"><?php the_field('content_html'); ?></p>
        <div class="mailchimp mx-auto mb-3"> <!-- Start MailChimp -->
            <!-- Begin MailChimp Signup Form -->
            <link rel="stylesheet" type="text/css">
            <div class="" id="mc_embed_signup">
            <form>
                <div id="mc_embed_signup_scroll" class="flex items-center mx-auto max-w-screen-sm">
                    <input type="email" placeholder="Your email goes here..." name="EMAIL" class="required email w-2/3 block p-3 text-sm text-gray rounded-l-lg ring-1 ring-black ring-inset" id="mce-EMAIL" onfocus="if (this.value=='Email') this.value='';" aria-required="true">
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button w-1/3 p-3 text-sm font-medium text-center text-white bg-black hover:text-black hover:bg-white hover:ring-1 hover:ring-black hover:ring-inset cursor-pointer"></div>
                </div>
                <h6 class="mt-sm"><?php the_field('disclaimer_html'); ?></h6>

                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none; font-family: apercu-bold;"></div>
                    <div class="response" id="mce-success-response" style="display:none; font-family: apercu-bold;"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d0cc72069e3d46c4430900264_31f53c4a43" tabindex="-1" value=""></div>
            </form>
            </div>
            <!--End mc_embed_signup-->
        </div>
    </div>
</section>
