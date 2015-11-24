

    <div class="container">
        
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">과목 변경</button>
          </p>
          <div class="jumbotron ">
              <h1><?php echo $data['c_name'][0]->c_name?></h1><br>
          <?php if($data['result'][0]->result==1){?>
            <p>현재 출석률(<?php echo $data['per'];?>%)</p>
            <div class="progress progress-striped active ">
              <div class="progress-bar "  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $data['per'];?>%;">
              </div>
            </div>
          <?php } 
          else{
            echo "<h3>현재 수업시간이 아닙니다.</h3>";
          }?>
          </div>
          <div class="row">
          

            <div class="col-6 col-sm-6 col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon  glyphicon-ok"></span> 출석 현황<span class="badge pull-right">4</span></h3>
                </div>
                <div class="panel-body s_names">
                  <?php if($data['result'][0]->result==1){?>
                  <?php foreach($data['att_stu_list'] as $entry){?>
                    <a class="s_names" onclick=""><?php echo $entry->s_name;?></a>
                  <?php }?><br><br><br><br><br><br><br><br-><br>
                  <?php }?>
                </div>
              </div>
              
            </div><!--/span-->


            <div class="col-6 col-sm-6 col-lg-4">
              <div class="panel panel-default" style="max-height:1.67;">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon  glyphicon-remove"></span> 미출석 현황<span class="badge pull-right">2</span></h3>
                </div>
                <div class="panel-body ">


                <?php if($data['result'][0]->result==1){?>
                <?php foreach($data['n_att_stu_list'] as $entry){?>
                   <a class="no_s_names" onclick=""><?php echo $entry->s_name;?></a>
                <?php } ?><br><br><br><br><br><br><br><br><br>
                <?php }?>
                </div>
              </div>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon  glyphicon-align-left"></span> 지각 RANK</h3>
                </div>
                <div class="panel-body">
                <?php if($data['result'][0]->result==1){?>
                <?php foreach($data['late_list'] as $i => $entry){;  ?>
                    <?php echo ($i+1)."위. ".$entry->s_name;?>
                    <div class="progress">
                    <a style="color:black"><?php echo $entry->late."회"?></a>
                    <?php if($i==0){?>
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="15" style="width:<?php echo (75/($i+1));?>%">
                      <?php } ?>
                      <?php if($i==1){?>
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="15" style="width:<?php echo (75/($i+1));?>%">
                      <?php } ?>
                      <?php if($i==2){?>
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="15" style="width:<?php echo (75/($i+1));?>%">
                      <?php } ?>
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>
                <?php 
                if($i==2){break;}
                } ?>
                 <?php }
                 ?>
                </div>
              </div>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon  glyphicon-pencil"></span>가산/감산 입력</h3>
                </div>
                <div class="panel-body">
                    <?php if($data['result'][0]->result==1){?>
                      <form action="/check_sys/check_web/index.php/home/add_point" method="post">
                          <select multiple class="form-control" name="add_point" id="add_point">
                          <?php foreach ($data['stu_list'] as $i => $entry) {?>
                            <option value="<?php echo $entry->s_num?>"><?php echo $entry->s_name;?></option>
                            <?php } ?>
                          </select> 
                          <br>
                          <input type="text" id="c_num" name="c_num" style="display:none" value="<?php echo $data['c_num'];?>">
                          <input class="btn btn-default" type="submit" value="+1점부여" style="float: right;">
                        </form>
                        <br><br><br>
                    <?php } ?>
                </div>
              </div>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon  glyphicon-align-left"></span> 가산 RANK</h3>
                </div>
                <div class="panel-body">
                    <?php if($data['result'][0]->result==1){?>
                    <?php foreach($data['point_list'] as $i => $entry){?>
                          <?php echo ($i+1)."위. ".$entry->s_name;?>
                          <div class="progress">
                            <?php echo "+".$entry->point;?> 
                            <?php if($i==0){?>
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (75/($i+1));?>%">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          <?php } ?>
                          <?php if($i==1){?>
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (75/($i+1));?>%">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          <?php } ?>
                          <?php if($i==2){?>
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (75/($i+1));?>%">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          <?php } ?>
                          </div>
                    <?php if($i==2){break;}} ?>
                    
                    <?php } ?>
                </div>
              </div>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon  glyphicon-heart-empty"></span> 공지 사항</h3>
                </div>
                <div class="panel-body">
                <?php if($data['result'][0]->result==1){?>
                    <?php foreach ($data['notify_list'] as $i => $entry) {
                      echo "[".$entry->regi_date."]  ".$entry->title."<br>";
                    }?><br><br><br><br><br><br>
                <?php }?>
                </div>
              </div>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
         
            <ul class="list-group">
                <li class="list-group-item" style="text-align:center;background:#428bca;color:white;border:1px #ddd solid;" ><b>수업목록</b></li>
              <?php
              foreach($data['c_list'] as $entry){
                ?>
                <li class="list-group-item" >
                  <span class="badge"><?php echo $entry->c_num ?></span>
                  <a href="/check_sys/check_web/index.php/home/main/<?php echo $entry->c_num ?>"><?php echo $entry->c_name?></a>
                </li>
                <?php 
              }   
              ?>
            </ul>
                    
        </div><!--/span-->
      </div><!--/row-->

      <hr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <footer>
        <p>©Daejin UniversityCapston Design Project</p>
      </footer>

    </div><!--/.container-->

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/js/bootstrap.min.js"></script>
  </body>
</html>
<script type="text/javascript">
function add_point_func(){

    //alert(s_num);
    var s_num = $('#add_point').val();
    var c_num = <?php echo $c_num;?>
    
    alert(c_num);

    $.ajax({
        type:'POST',
        url : '/check_sys/check_web/index.php/main/add_point',
        data : { 's_num': s_num ,'c_num': c_num},
        dataType:'json',
        success: function(data){
            
            alert(data);
            
        }
    });
    
}

</script>

<script>

click();
function clicks(){
    var skillBar = $('.skill').siblings().find('.inner');
    var skillVal = skillBar.attr("data-progress");
    $(skillBar).animate({
        height: skillVal
    }, 800);

}
function view_stu_detaily(s_num){

    alert(s_num);
    $.ajax({
        type:'POST',
        url:"/index.php/admin/main/test/"+s_num,
        success:function(result){
            //alert(result);
    }});

}

</script>