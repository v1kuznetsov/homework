$(document).ready(function(){
  $.ajax({
    url: '/table.php',
    method: 'POST',
    contentType: 'application/json',
    data: JSON.stringify(),
    success: function (data){
      let objData = data
      const mainContainer = document.querySelector('#table')
      for(let elemData of Object.values(objData)) {
        mainContainer.insertAdjacentHTML('beforeend','<tr>' + '<td>' + elemData.name + '</td>' + '<td>' + elemData.price + '</td>' + '<td>' + elemData.season +'</td>' + '<td>' + elemData.id + '<td/>' + '</tr>')
      }
    }
  })
});


$(document).ready(function () {
  $('#addProduct').submit(function (event) {
    event.preventDefault();
    let product = {
      'id': $("#addProduct input[name= 'id']").val(),
      'name': $("#addProduct input[name= 'name']").val(),
      'price': $("#addProduct input[name= 'price']").val(),
      'season': $("#addProduct input[name= 'season']").val(),
    };

    $.ajax({
      url: '/execution.php',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(product)
  })

    .done(function() {
      alert( "second success" );

      let $id = $('input#id')
      let $name = $('input#name')
      let $pr = $('input#price')
      let $season = $('input#season')

      $('#history').append('<tr>' + '<td>' + $name.val()+ '</td>' + '<td>' + $pr.val() + '</td>' + '<td>' + $season.val() + '</td>' + '<td>' + $id.val()+ '</td>' + '</tr>')

      $id.val('')
      $name.val('')
      $pr.val('')
      $season.val('')
    })
    .fail(function() {
      alert( "error" );
    })
    .always(function() {
      alert( "finished" );
      let $id = $('input#id')
      let $name = $('input#name')
      let $pr = $('input#price')
      let $season = $('input#season')
      $id.val('')
      $name.val('')
      $pr.val('')
      $season.val('')
    });
  });
});