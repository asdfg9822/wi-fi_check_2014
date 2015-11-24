 <div class="col-md-9">
<div class="jumbotron " style="background:white">
              <h1>현재 수업시간인 수업이 없습니다.</h1><br>
          <h2></h2>
          </div>
 </div>

        <div class="col-md-3" id="sidebar" role="navigation">
         
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