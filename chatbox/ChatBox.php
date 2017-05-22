<?php
  /*
  * Main Library for WhatsApp Dialogs
  * ---------------------------------
  * $msg can use \n characters.
  * Enclose with * for bold and _ for italics.
  *
  * To create a simple chatbox, just include this file
  * and use function msgbox.
  *
  * More info can be found on README.md
  *
  * Built by willi123yao(https://github.com/willi123yao)
  */

  class ChatBox {
    var $head = '<svg width="1000" height="1000" xmlns="http://www.w3.org/2000/svg">';

    var $foot = '</svg>';

    var $color = '#dcf8c6';

    var $msglen = 0;

    function msgbox($msg,$time,$status) {
      $svg = $this->head;
      $msglines = substr_count($msg,"\n");
      $text = $this->create_text($msg);
      $msglen = ($this->msglen)*9.5;
      $svg = $svg.$this->create_font();
      $svg = $svg.$this->create_rect($msglen+55,45+$msglines*22,'10','10');
      $svg = $svg.$this->create_tri('50',$msglen+25,'10');
      $svg = $svg.$text;
      $svg = $svg.$this->create_time($time,$msglen-25,47+$msglines*21);
      $svg = $svg.$this->create_status($status,$msglen+30,35+$msglines*21);
      $svg = $svg.$this->foot;
      return $svg;
    }

    function create_font() {
      return '<defs><style type="text/css">@font-face {font-family: "helveticaNeue"; src: url("helveticaNeue.ttf") format("truetype") font-weight: normal; font-style: normal; </style></defs>';
    }

    function create_text($msg) {
      $pos = strpos($msg,"\n");
      $svg = '';
      $height = 40;
      while($pos) {
        $text = substr($msg,0,$pos);
        if(strlen($text) > $this->msglen) {
          $this->msglen = strlen($text);
        }
        $svg = $svg.'<text xml:space="preserve" text-anchor="start" font-family="helveticaNeue, Helvetica, sans-serif" font-size="16" id="svg_6" y="'.$height.'" x="25.805551" fill-opacity="null" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#000000">'.$text.'</text>';
        $msg = substr($msg,$pos+1);
        $height = $height + 21;
        $pos = strpos($msg,"\n");
      }
      $svg = $svg.'<text xml:space="preserve" text-anchor="start" font-family="helveticaNeue, Helvetica, sans-serif" font-size="16" id="svg_6" y="'.$height.'" x="25.805551" fill-opacity="null" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#000000">'.$msg.'</text>';
      if(strlen($msg) > $this->msglen) {
        $this->msglen = strlen($msg);
      }
      return $svg;
    }

    function create_status($status,$X,$Y) {
      if ($status == 'read') {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="'.$X.'" y="'.$Y.'"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#4fc3f7"/></svg>';
      }
      else if ($status == 'sent') {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck" x="'.$X.'" y="'.$Y.'"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#92a58c"/></svg>';
      }
      else {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="'.$X.'" y="'.$Y.'"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#4fc3f7"/></svg>';
      }
    }

    function create_time($time,$X,$Y) {
      return '<text xml:space="preserve" text-anchor="start" font-family="Helvetica, Arial, sans-serif" font-size="12" id="svg_7" y="'.$Y.'" x="'.$X.'" fill-opacity="0.45" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#000000">'.date('g:i A',$time).'</text>';
    }

    function create_rect($X,$Y,$offsetX,$offsetY) {
      return '<rect rx="15" id="svg_1" height="'.$Y.'" width="'.$X.'" y="'.$offsetY.'" x="'.$offsetX.'" stroke-width="0" stroke="#000" fill="#dcf8c6"/>';
    }

    function create_tri($size,$offsetX,$offsetY) {
    $scale = $size/10;
    $peakX = intval(($scale * 10 * sin(M_PI / 2 - acos((pow(10,2) + pow(10,2) - pow(10,2)) / (2 * 10 * 10))))*10)/10;
    $peakY = intval(($scale * sqrt(pow(10,2)-pow($peakX / $scale,2)))*10)/10;
    $color = '#dcf8c6';
    return '<polygon points="'.$offsetX.','.$offsetY.' '.($size+$offsetX).','.$offsetY.' '.($peakX+$offsetX).','.($peakY+$offsetY).'" style="fill:'.$this->color.'" />';
    }
  }
?>
