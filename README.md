# ChatBox
PHP library to generate Whatsapp-styled dialogs

Created for ease of generation of images for chat dialogs for whatever purpose you need.

## Installation
Just [download](https://github.com/willi123yao/ChatBox/archive/master.zip) the source files and extract them to your project folder.

## How to use
1. On the PHP project that you want to use, include this library:
  `include('./chatbox/ChatBox.php);`
2. Create an object:
  `$chatbox = new ChatBox\ChatBox();`
3. Create the chatbox:
  `$box = $chatbox->msgbox($message,$time,$status)`
  
P.S. The time should be in epoch time and status should be either 'read' or 'sent'

## How to contribute
Head over to [TODO.md](./TODO.md) and start helping by creating the features.
For bugs and problems, the [Issues](https://github.com/willi123yao/ChatBox/issues) page would be a good place to do so.

## DISCLAIMER
The default font used by Whatsapp (Helvetica Neue) is NOT provided. Please place it in the `chatbox\` folder and rename it to `helveticaNeue.ttf`. Otherwise, it will use the default Helvetica font on your system.
