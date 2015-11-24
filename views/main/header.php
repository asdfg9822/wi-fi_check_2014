<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/check_sys/check_web/static/css/bootstrap.min.css" rel="stylesheet">

    <style>
      th{
        background:#428bca;
        color:white;
        border:1px #ddd solid;
      }
      tr{
        background:white;
        border:1px #ddd solid;
        text-align: center;
      }
      td{
        border:1px #ddd solid;
      }
      .outer {
    width: 30px;
    height: 140px;
    border: 2px solid #ccc;
    overflow: hidden;

    position: relative;

    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
}

.inner, .inner div {
    width: 100%;
    overflow: hidden;
    left: -2px;
    position: absolute;
}

.inner {
    border: 2px solid #999;
    border-top-width: 0;
    background-color: #999;

    bottom: 0;
    height: 0%;
}

.inner div {
    border: 2px solid orange;
    border-bottom-width: 0;
    background-color: orange;

    top: 0;
    width: 100%;
    height: 5px;
}
    </style>
  </head>
  <body style="background:#D2E0E6; padding-top: 70px; padding-left: 30px; padding-right: 30px;"><!--topbar때문에 top70px 패딩-->
  <div class="row"> <!--그리드 태그-->
  