<div class="container">
    <form action="#" method="POST">
  <!-- Static navbar -->
  <div class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">No Pain,Yes Attendance</a>
      </div>
      <div class="navbar-collapse collapse">
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </div>

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h3>Login Page</h3>
    <br>
    <label for="exampleInputEmail1">학번</label>
    <input type="email" name=s_num class="form-control" id="exampleInputEmail1" placeholder="Enter ID">
    <br>
    <button type="button" style="float:right" class="btn btn-success" onclick="submit();">제출하기</button>
    <button type="button" style="float:right" class="btn btn-success" onclick="get_stu_info();">내 정보 확인</button>
    <br>
  </div>
    </form>
</div> <!-- /container -->
<script type="text/javascript">
function get_stu_info(){

    var s_num = $('#exampleInputEmail1').val();
    
    $.ajax({
        type:'POST',
        url : 'slogin/get_stu_info',
        data : { 's_num': s_num },
        dataType:'json',
        success: function(data){
            
            string = "학과 :"+data.s_dept+"\n";
            string+= "학년 :"+data.s_year+"\n";
            string+= "이름 :"+data.s_name+"\n";
            string+= "학번 :"+data.s_num+"\n";
            
            alert(string);
            
        }
    });
    
}

</script>
