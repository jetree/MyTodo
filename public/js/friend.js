// // pair登録処理
$(function() {
  'use strict'

  const cmds_add = document.getElementsByClassName('friend-add');
  const cmds_remove = document.getElementsByClassName('friend-remove');
  const Auth = document.getElementById('auth_name');
  const Auth_id = Auth.dataset.id;
  let i;
  let user_id;

  const friend_list = document.getElementById('friend_list').children
  const follower_list = document.getElementById('follower_list').children
  const follow_list = document.getElementById('follow_list').children

  for (i = 0; i < cmds_add.length; i++){
    cmds_add[i].addEventListener('click',function $member_add(){
      user_id = this.dataset.id;
      $.ajax({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ action('friendsController@store') }}",
        type:'POST',
        data:{
          'Auth_id' : Auth_id,
          'user_id' : user_id,
        }
      })
        .done(function(data){
          // アイコン+-入れ替え処理
          const area = document.getElementById('left_conteiner');
          const icons = area.querySelectorAll("[data-id='" + user_id +"']")
          icons.forEach(icon => icon.classList.toggle('hidden'))

          // アイコンの移動処理
          // friend_idをもつliを取得
          const li_friend = area.querySelectorAll("[data-friend-id='" + user_id +"']")
          // length=1  => follow/follower/friend いずれでもない
          if(li_friend.length == 1){
            // コピーしてfollowに追加
            // li_friendやfollow_listは配列っぽく帰ってくるので[0]にする
            const li_friend_copy = $(li_friend[0]).clone(true,true)
            // コピーした子要素のアイコンにクリックイベントを追加する
            // follow_listの最初に追加
            follow_list[0].insertBefore(li_friend_copy[0],follow_list.firstChild)
          }else{
            console.log('2個だよ')
            // follow/follower/friend　どれに属するか
            // follower->friendに移動
            friend_list[0].insertBefore(li_friend[1],friend_list.firstChild)
            // follow->ありえない
            // friend->ありえない
          }
        })
        .fail(function(data){
          alert(失敗しました);
        })
    })
  }


  for (i = 0; i < cmds_remove.length; i++){
    cmds_remove[i].addEventListener('click',function $member_remove(){
      user_id = this.dataset.id;
      $.ajax({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ action('FriendsController@destroy') }}",
        type:'POST',
        data:{
          'Auth_id' : Auth_id,
          'user_id' : user_id,
          '_method' : 'DELETE'
        }
      })
        .done(function(data){
          // アイコン+-入れ替え処理
          const area = document.getElementById('left_conteiner');
          const icons = area.querySelectorAll("[data-id='" + user_id +"']")
          icons.forEach(icon => icon.classList.toggle('hidden'))

          // アイコンの移動処理
          // friend_idをもつliを取得
          const li_friend = area.querySelectorAll("[data-friend-id='" + user_id +"']")
          console.log(li_friend)
          if(li_friend.length == 1){
            console.log('1個だよ')
            // follow/follower/friend いずれでもない
            // deleateはありえない
          }else{
            console.log('2個だよ')
            console.log(follow_list)
            // /friend　どれに属するか
            // follower->ありえない
            console.log(follow_list[0].contains(li_friend[1]))
            if(follow_list[0].contains(li_friend[1])){
              // follow->nodeの削除
              li_friend[1].remove()
            }else{
              // friend->followerに移動
              follower_list[0].insertBefore(li_friend[1],follower_list.firstChild)
            }
          }
        })
        .fail(function(data){
          alert(失敗しました);
        })
    })
  }

});
