$("#btn").click(function(){
  $("#card").append("\
      <div class='alert alert-primary' role='alert'>\
      你的唤醒地址是:<br>\
      <a href='task.php?ip="+$("#ip").val()+"&port="+$("#port").val()+"&mac="+$("#mac").val()+"'>唤醒链接</a><br>\
      你可以直接访问此链接,<br>也可以收藏以便之后的访问。\
    </div>\
  ")
})
