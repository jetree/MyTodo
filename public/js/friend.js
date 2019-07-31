// // pair登録処理
$(function() {
  let cmds_add = document.getElementsByClassName('friend-add');
  let cmds_remove = document.getElementsByClassName('friend-remove');
  let Auth = document.getElementById('auth_name');
  let Auth_id = Auth.dataset.id;
  let i;
  let user_id;

  // console.log(cmds_add);
  // console.log(cmds_remove);

  for (i = 0; i < cmds_add.length; i++){
    cmds_add[i].addEventListener('click',function(){
      user_id = this.dataset.id;
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
          area = document.getElementById('left_conteiner');
          console.log(user_id)
          icon = area.querySelectorAll("[data-id='" + user_id +"']")
          console.log(icon)
          // icon.classList.toggle('hidden')
        })
        .fail(function(data){
          alert(失敗しました);
        })
    })
  }


  for (i = 0; i < cmds_remove.length; i++){
    cmds_remove[i].addEventListener('click',function(){
      user_id = this.dataset.id;
      $.ajax({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ action('HomeController@destroy') }}",
        type:'POST',
        data:{
          'Auth_id' : Auth_id,
          'user_id' : user_id,
          '_method' : 'DELETE'
        }
      })
        .done(function(data){
          area = document.getElementById('left_conteiner');
          console.log(user_id)
          icon = area.querySelectorAll("[data-id='" + user_id +"']")
          // icon.classList.toggle('hidden')
        })
        .fail(function(data){
          alert(失敗しました);
        })
    })
  }

});
