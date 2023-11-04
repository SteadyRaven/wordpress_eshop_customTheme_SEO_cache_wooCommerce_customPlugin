<?php
add_filter('advanced_import_welcome_message', 'fashion_blogging_modify_welcome_message');
function fashion_blogging_modify_welcome_message(){
  $message = '
   <div class="ai-header">
      <h1>
         '.esc_html__('Welcome to Fashion Blogging Demo Import Page. What is the', 'fashion-blogging').' <a href="'.esc_url('https://www.smarterthemes.com/').'" target="_blank">'.esc_html__('Difference Between Free & Pro Version.?', 'fashion-blogging').'</a>
      </h1>
      <p>'.esc_html__( 'Thank you for choosing the Fashion Blogging theme. This quick demo import setup will help you configure your new website like theme demo. It will install the required WordPress plugins, default content and tell you a little about Help &amp; Support options. It should only take less than 5 minutes.', 'fashion-blogging' ).'</p>
   </div>
   ';

      return $welcome_msg;
}