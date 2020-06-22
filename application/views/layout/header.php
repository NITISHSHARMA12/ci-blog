<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blog</title>
    <link rel="icon" href="../../favicon.ico">
    <!-- <link href="css/prettyPhoto.css" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?php echo base_url('public/css/style.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="<?php echo base_url('public/fontawesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- Theme skin -->
    <link id="t-colors" href="<?php echo base_url('public/css/default.css');?>" rel="stylesheet" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body cz-shortcut-listen="true">
    <nav class="navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url();?>"><span style="color: #f55f07bf;">B</span>log</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="float: right;">
              <li><a href="<?php echo site_url();?>">Home</a></li>
              <li><a href="<?php echo site_url();?>">About Us</a></li>
              <?php if ($this->session->has_userdata('isUserLoggedIn')): ?>
                <li class="dropdown">
                  <a href="#"><?php echo $this->session->user_name;?><i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('create/post');?>">Create Post</a></li> 
                    <li><a href="<?php echo site_url('view/post');?>">View Post</a></li> 
                    <li><a href="<?php echo site_url('user/profile');?>">Profile</a></li> 
                    <li><a href="<?php echo site_url('logout');?>">Logout</a></li>
                  </ul>
                </li>
              <?php else: ?>
                <li><a href="<?php echo site_url('register');?>">Register</a></li>
                <li><a href="<?php echo site_url('login');?>">Login</a></li>
              <?php endif; ?>
                
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div style="padding-bottom: 25px;"></div>
    