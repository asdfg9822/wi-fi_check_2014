</div>

<div class="col-md-8">
<div class="table-responsive">
  <table class="table">
      <tr>
        <th><span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;동영상 촬영 </th>
      </tr>
      <tr>  
        <td>
            
          <select class="form-control" style="background:white" id="video_time" >
          <option value="10">10초</option>
          <option value="600">10분</option>
          <option value="1200">20분</option>
          <option value="1800">30분</option>
          <option value="2400">40분</option>
          <option value="3000">50분</option>
          <option value="3600">60분</option>
          <option value="4200">70분</option>
          <option value="4800">80분</option>
          <option value="5400">90분</option>
          <option value="6000">100분</option>
          </select>
        
        <br>
        <div style="float:right;">
    <button type="button" class="btn btn-default btn" onclick="video_record();">
        <span class="glyphicon glyphicon-facetime-video"></span>&nbsp;&nbsp;촬영시작
    </button>
            <a href="/check_sys/check_web/index.php/setting/video_view">
        <button type="button" class="btn btn-default btn" >
            <span class="glyphicon glyphicon-play"></span>&nbsp;&nbsp;동영상 보기
        </button></a>
            </div>
        </td>
        </tr>
    </table>
    </div>
<div class="table-responsive">
  <table class="table">
      <tr>
        <th><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;학생의 Data On/Off</th>
      </tr>
      <tr>  
        <td>
        <select class="form-control" style="background:white" id="data">
            <option value="1">Data On</option>
            <option value="0">Data OFF</option>
        </select>
        <div style="float:right;">
            <br>
    <button type="button" class="btn btn-default btn" onclick="data_on_off()">
        <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;확인
    </button>
        </div>
        </td>
        </tr>
    </table>
    </div>
</div>
<script type="text/javascript">
function video_record(){

    var time = $('#video_time').val();
    
    $.ajax({
        type:'POST',
        url : 'setting/video_record',
        data : { 'time': time },
        dataType:'json',
        success: function(data){
            
        }
    });
    
    alert("Video Recording !!");
    
}

function data_on_off(){

    var data = $('#data').val();
    
    $.ajax({
        type:'POST',
        url : 'setting/data_on_off',
        data : { 'data': data },
        dataType:'json',
        success: function(data){
            if(data==1)
                alert("Data On..!!");
            else
                alert("Data Off..!!");
        }
    });
    
}

</script>