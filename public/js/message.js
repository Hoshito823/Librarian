(function($, window) {
  $(function() {
    /*if send button is clicked */
    $('#sendButton').on('click', function(e) {
    //   alert('you clicked button.');
      var url = '/api/messages/create';
      /*inputed text in text box*/
      var id = $('#receiverId').val();
      var inputText = $('#inputText').val();
      var myName = $('#js-getVariable').data('name');
      var myId = $('#js-getVariable').data('id');
    //   alert('Your send message is "' + inputText + ' "');
      
    /*Below is for Ajax*/
      $.ajax({
        /*if you post some data, you need to write csrf token.*/
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'post',
        /*write data you wanna send to MessageController.*/
        data: {
            text : inputText,
            receiverId : id,
            myId : myId
        },
      }).done(function(data, status, xhr) {
        /*以下URLにアクセスして返却された情報がdataに入ってかえってくる*/
        // alert('Your Ajax communication is done!! Return messages is....');
        // alert(data);
        
        /*吹き出しボックスの中に返却されたデータを追加する*/
        $("#message-container").append('<div class="message-container-right"><p class="username">' + myName + '</p><div class="balloon1-right"><p>' + inputText + '</p></div></div>');
        
        /*Clear Input box*/
        $('#inputText').val("");
        
        // alert('Move to Buttom');
        /*Move to buttom page.*/
        var target = $('#backButton');
        $(window).scrollTop(target.offset().top);
    
        
      }).fail(function(data, status, err) {
        //   alert('failed');
        //   alert(err);
      });
      /*Above description is for Ajax*/
    //   alert('Now ajax communication... please wait for minutes...');
    });
  });
})(jQuery, window);


//====================== Below is js source that properly works =====================================//
/*Below is for checking JS function.*/
// (function($, window) {
//   $(function() {
//     alert('Start jQuery function check.')
//     /*if send button is clicked */
//     $('#sendButton').on('click', function(e) {
//       alert('you clicked button.');
//       var url = '/api/messages/create';
//       /*inputed text in text box*/
//       var id = $('#receiverId').val();
//       var inputText = $('#inputText').val();
//       var me = $('#js-getVariable').data('name');
//       alert('Your send message is "' + inputText + ' "');
//     /*Below is for Ajax*/
//       $.ajax({
//         url: url,
//         type: 'post',
//         /*テキスト入力欄から文字を取得してデータとして渡す*/
//         data: {
//             text : inputText,
//             receiverId : id
//         }
//       }).done(function(data, status, xhr) {
//         /*以下URLにアクセスして返却された情報がdataに入ってかえってくる*/
//         alert('Your Ajax communication is done!! Return messages is....');
//         alert(data);
        
//         /*吹き出しボックスの中に返却されたデータを追加する*/
//         $("#message-container").append('<div class="message-container-right"><p class="username">' + me + '</p><div class="balloon1-right"><p>' + inputText + '</p></div></div>');
        
//         /*Clear Input box*/
//         $('#inputText').val("");
        
//       }).fail(function(data, status, err) {
//           alert('failed');
//       });
//       /*Above description is for Ajax*/
//       alert('Now ajax communication... please wait for minutes...');
//     });
//     alert('Finish importing javasript.');
//   });
// })(jQuery, window);

//====================== Below is js sources2 that properly works =====================================//
// (function($, window) {
//   $(function() {
//     /*if send button is clicked */
//     $('#sendButton').on('click', function(e) {
//       alert('you clicked button.');
//       var url = '/api/messages/create';
//       /*inputed text in text box*/
//       var id = $('#receiverId').val();
//       var inputText = $('#inputText').val();
//       var myName = $('#js-getVariable').data('name');
//       var myId = $('#js-getVariable').data('id');
//       alert('Your send message is "' + inputText + ' "');
      
//     /*Below is for Ajax*/
//       $.ajax({
//         /*if you post some data, you need to write csrf token.*/
//         headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         url: url,
//         type: 'post',
//         /*write data you wanna send to MessageController.*/
//         data: {
//             text : inputText,
//             receiverId : id,
//             myId : myId
//         },
//       }).done(function(data, status, xhr) {
//         /*以下URLにアクセスして返却された情報がdataに入ってかえってくる*/
//         alert('Your Ajax communication is done!! Return messages is....');
//         alert(data);
        
//         /*吹き出しボックスの中に返却されたデータを追加する*/
//         $("#message-container").append('<div class="message-container-right"><p class="username">' + myName + '</p><div class="balloon1-right"><p>' + inputText + '</p></div></div>');
        
//         /*Clear Input box*/
//         $('#inputText').val("");
        
//         alert('Move to Buttom');
//         /*Move to buttom page.*/
//         var target = $('#backButton');
//         $(window).scrollTop(target.offset().top);
    
        
//       }).fail(function(data, status, err) {
//           alert('failed');
//           alert(err);
//       });
//       /*Above description is for Ajax*/
//       alert('Now ajax communication... please wait for minutes...');
//     });
//   });
// })(jQuery, window);