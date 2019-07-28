$(function() {
  let cmds = document.getElementsByClassName('friend-add')
  let Auth = document.getElementById('auth_name')
  console.log(Auth);
  let Auth_id = Auth.dataset.id
  let i;


  for (i = 0; i < cmds.length; i++){
    cmds[i].addEventListener('click',function(){

      let user_id = this.dataset.id
      $.ajax({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ action('HomeController@store') }}",
        type:'POST',
        data:{
          'Auth_id' : Auth_id,
          'user_id' : user_id,
        }
      })

      .done(function(data){
        console.log(data)
      })
      .fail(function(data){
        alert(data.responseJSON);
      })
    })
  }
});
