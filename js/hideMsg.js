function hideMsg() {
    var time = setInterval( function() {
      var msg = $(".msgSucesso");
          msg.slideUp('slow');
    }, 2000);
}