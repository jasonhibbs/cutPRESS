<?php
  $twitter_message = rawurlencode('Tweet message for sharing via @tweeter —');
  $fb_message = rawurlencode('Facebook message');
  $the_title = get_the_title();
  $share_title = rawurlencode($the_title);
  $permalink = get_permalink();
  $share_link = rawurlencode($permalink);
?>

<div class="the_share_links">
  
  <a class="twitter"
     onclick="window.open('http://twitter.com/intent/tweet?text=<?php echo $twitter_message; echo $share_link; ?>', 'newWindow', 'width=500,height=300'); return false;"
     href="http://twitter.com/intent/tweet?text=<?php echo $twitter_message; echo $share_link; ?>"
     target="_blank" title="Share this on Twitter"><i class="icon-twitter"></i></a>
  
  <a class="facebook"
     onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link; ?>&amp;t=<?php echo $share_title; ?>&amp;s=<?php echo $fb_message ?>', 'newWindow', 'width=626,height=436'); return false;"
     href="https://www.facebook.com/sharer/sharer.php?t=<?php echo $share_title; ?>&amp;u=<?php echo $share_link; ?>&amp;s=<?php echo $fb_message ?>"
     target="_blank" title="Share this on Facebook"><i class="icon-facebook"></i></a>
  
  <a class="linkedin"
     href="http://linkedin.com/shareArticle?url=<?php echo $share_link; ?>"
     target="_blank" title="Share this on LinkedIn"><i class="icon-linkedin"></i></a>
  
  <a class="googleplus"
     onclick="window.open('http://plus.google.com/share?url=<?php echo $share_link; ?>', 'newWindow', 'width=500,height=400'); return false;"
     href="http://plus.google.com/share?url=<?php echo $share_link; ?>"
     target="_blank" title="Share this on Google Plus"><i class="icon-google-plus"></i></a>
</div>