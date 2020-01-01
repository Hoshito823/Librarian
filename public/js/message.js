(function($, window) {
  $(function() {
    alert('Start jQuery function check.')
    /*if send button is clicked */
    $('#sendButton').on('click', function(e) {
      alert('you clicked button.');
      var url = '/api/messages/create';
      /*inputed text in text box*/
      var id = $('#receiverId').val();
      var inputText = $('#inputText').val();
      var me = $('#js-getVariable').data('name');
      alert('Your send message is "' + inputText + ' "');
    /*Below is for Ajax*/
      $.ajax({
        url: url,
        type: 'post',
        /*テキスト入力欄から文字を取得してデータとして渡す*/
        data: {
            text : inputText,
            receiverId : id
        }
      }).done(function(data, status, xhr) {
        /*以下URLにアクセスして返却された情報がdataに入ってかえってくる*/
        alert('Your Ajax communication is done!! Return messages is....');
        alert(data);
        
        /*吹き出しボックスの中に返却されたデータを追加する*/
        $("#message-container").append('<div class="message-container-right"><p class="username">' + me + '</p><div class="balloon1-right"><p>' + inputText + '</p></div></div>');
        
        /*Clear Input box*/
        $('#inputText').val("");
        
      }).fail(function(data, status, err) {
          alert('failed');
      });
      /*Above description is for Ajax*/
      alert('Now ajax communication... please wait for minutes...');
    });
    alert('Finish importing javasript.');
  });
})(jQuery, window);