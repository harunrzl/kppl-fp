<?php if ( ! isset( $_div ) ) $_div = new stdClass(); ?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $_div->title ?: 'Default Title' ?></title>
<base href="<?= $_csc->dirpath() ?>">
<link rel="stylesheet" href="assets/css/reset.css" type="text/css">
</head>

<style>
body { margin: 0 auto; width: 768px; background: #EFEFEF; }
input[type=text],input[type=search],input[type=password],textarea{border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;box-shadow:inset 0 1px 3px rgba(0,0,0,.05),0 1px 0 #fff}textarea:hover,input[type=text]:hover,input[type=search]:hover,input[type=password]:hover{outline:none;border:1px solid #999}textarea:focus,input[type=text]:focus,input[type=password]:focus{border-color:#56b4ef;box-shadow:inset 0 1px 3px rgba(0,0,0,.05),0 0 8px rgba(82,168,236,.6)}input[type=text],input[type=search],input[type=password],textarea,select{display:inline-block;padding:9px;margin:0;outline:none;background-color:white;border:1px solid #CCC;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px}textarea{width:100%;resize:vertical;min-height:100px;max-height:450px}.clear { clear: both; }

#chatbox { height: 400px; overflow: auto; padding-right: 11px; }
.box { border: 1px solid #ccc; text-align: center; padding: 20px 10px; margin: 10px auto; background: white; }
.chats { padding: 9px 11px; margin: 6px 0; border-radius: 9px; }
.him { background: aliceblue; float: left; }
.me { background: lightgreen; float: right; }
.chatinput { width: 80%; margin-top: 11px; padding: 9px; }
</style>

<body>
