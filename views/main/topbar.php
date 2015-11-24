<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">No pain, Yes Attendance</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($act==1) echo "active";?>"><a href="/check_sys/check_web/index.php/home/main">실시간 통계</a></li>
            <li class="<?php if($act==2) echo "active";?>"><a href="/check_sys/check_web/index.php/main/group">수업 정보</a></li>
              <li class="<?php if($act==3) echo "active";?>"><a href="/check_sys/check_web/index.php/setting">설정</a></li>
          </ul>
        </div>
      </div>
    </div>
    