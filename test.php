<?php
  require('./chatbox/ChatBox.php');

  date_default_timezone_set('Asia/Singapore');
  $test = new ChatBox\ChatBox();
  $text = <<<EOD
Hi! This is a chatbox.
We have a newline test here!
Another Line!!! WOW!
Emojis now work! Yay!
😃 😀 😄 😆 😂
EOD;
  echo $test->msgbox($text,time(),'sent');
?>
