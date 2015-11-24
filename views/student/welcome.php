<div class="container">
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
    <h3>환영합니다.</h3>
  </div>
    </form>
</div> <!-- /container -->
<script type="text/javascript">
function get_stu_info(){

    var s_num = $('#exampleInputEmail1').val();
    
    $.ajax({
        type:'POST',
        url : 'student/get_stu_info',
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