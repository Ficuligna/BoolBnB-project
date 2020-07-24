

// ===========================================================
//                    * JAVASCRIPT *
// ===========================================================
//                        app.js
// ===========================================================

require('./bootstrap');

// window.Vue = require('vue');
// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// const app = new Vue({
//     el: '#app',
// });

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
  //funzioni riguardanti i tasti accedi e registrati da rivedere con collegamento al database



// const app = new Vue({
//     el: '#app',
// });
//*****************//
function turfjs(){
  var lat = $("#latitude").html();
  var long = $("#longitude").html();
  var center = [long,lat];
  var apiKey = 'luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt';
  var map = tt.map({
  key: apiKey,
  container: 'map',
  center: center,
  style: 'tomtom://vector/1/basic-main',
  zoom: 15
  });
  function findGeometry() {
    var SEARCH_QUERY = 'Roma';
    tt.services.fuzzySearch({
      key: apiKey,
      query: SEARCH_QUERY
    })
    .go()
    .then(getAdditionalData);
  }
  var marker = new tt.Marker({
    draggable: false
  }).setLngLat(center).addTo(map);
}




function address_to_coord(button, submit){

  $(button).click(function(){
    var address = $("#apt_address").val();
    var longitude,latitude;
    $.ajax({
        url: "https://api.tomtom.com/search/2/search/"+ address +".json?",
        method: "get",
        data: {
          key: "luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt",
          // query: address,
          // ext: "json"
        },
        success: function(data){
          var position = data.results[0]["position"];
        latitude =  position.lat;
        longitude = position.lon;
        $("#latitude").val(latitude);
        $("#longitude").val(longitude);

        },
        complete: function(){
          document.getElementById(submit).click()
        }
      })
    });
  }

//****************//


  function prova_api(){
    $.ajax({
      url:"http://127.0.0.1:8000/welcome_show",
      method: "GET",
      success: function(data){
        var variabile = JSON.parse(data);
        // console.log(variabile);

        for (var i = 0; i < variabile.length; i++) {

          $(".apartment").append('<img src='+variabile[i].images+'>').append('<h3>'+variabile[i].name+'</h3>');
        }
      }
    })
  }


function getData(data,id_canvas,type) {
  var months = [];
  var views = [];
  for (var month in data) {
    months.push(month)
    views.push(data[month])
  }
  var ctx = $('#' + id_canvas);
  var myChart = new Chart(ctx, {
      type: type,
      data: {
          labels: getMonth(),
          datasets: [{
              label: id_canvas,
              data: views,
              backgroundColor: [
                'rgba(150, 33, 146, 1)',
                'rgba(82, 40, 204, 1)',
                'rgba(4, 51, 255, 1)',
                'rgba(0, 146, 146, 1)',
                'rgba(0, 249, 0, 1)',
                'rgba(202, 250, 0, 1)',
                'rgba(255, 251, 0, 1)',
                'rgba(255, 199, 0, 1)',
                'rgba(255, 147, 0, 1)',
                'rgba(255, 80, 0, 1)',
                'rgba(255, 38, 0, 1)',
                'rgba(216, 34, 83, 1)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      stepsize:3,
                      // suggestedMax: 1000,
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}


function getMonth(){
  moment.locale("it");
  return moment.months();;
}
function create_paymethond_and_pay() {
    var button = document.querySelector('#submit-button');
    var token,apartment_id,price,title,start_date,nonce;
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/token_generate",
        success: function (token_generate) {
            token = token_generate;
            // console.log(token);
            braintree.dropin.create({
                authorization: "sandbox_ykkqhk4c_3fq8j6rpxv3kwq76"	,
                selector: '#dropin-container'
            }, function (err, instance) {
                button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                   nonce = payload.nonce;
                   apartment_id = $('#id').html();
                   price = $('#price').html();
                   title = $('#title').val();
                   start_date = $('#start_date').val();
                   $("#pay").removeClass("dispna");
                });
                })
               });
        }
    });
    $("#pay").click(function(){
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "http://127.0.0.1:8000/payment",
        method: "POST",
        data:{
          nonce: nonce,
          apartment_id: apartment_id,
          price: price,
          title: title,
          start_date: start_date
        },
        success: function(speriamo){


        },complete: function(speriamo){
          console.log(speriamo.responseText);
          if (speriamo.responseText == '"successo"') {
            var data = "ok";
          } else {
            var data = "NO";
          }
          window.location.href = 'http://127.0.0.1:8000/successo/' + data ;

        }
      });
    })
}
function keypress(){
    $(window).ready(function() {
          $("#apt_address").on("keypress", function (event) {
              console.log("aaya");
              var keyPressed = event.keyCode || event.which;
              if (keyPressed === 13) {
                event.preventDefault();
                var address = $("#apt_address").val();
                var longitude,latitude;
                $.ajax({
                    url: "https://api.tomtom.com/search/2/search/"+ address +".json?",
                    method: "get",
                    data: {
                      key: "luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt",
                      // query: address,
                      // ext: "json"
                    },
                    success: function(data){
                      var position = data.results[0]["position"];
                    latitude =  position.lat;
                    longitude = position.lon;
                    },
                    complete: function(){
                      $("#latitude").val(latitude);
                      $("#longitude").val(longitude);
                      document.getElementById('search').click()
                    }
                  })
                  return false;
              }
          });
    });
  }
  function layout_commands(){
    $(".tasto").click(
        function() {
          $(".accedi").removeClass("off").addClass("on");
          $(".registrati").removeClass("on").addClass("off");
        }
      );
      $(".continua").click(
        function() {
          $(".accedi").removeClass("on").addClass("off");
        }
      );

      // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
      $(".reg").click(
        function() {
          $(".registrati").removeClass("off").addClass("on");
          $(".accedi").removeClass("on").addClass("off");
        }
      );
      $(".continua").click(
        function() {
          $(".registrati").removeClass("on").addClass("off");
        }
      );
      $(".fa-bars").click(
        function() {
          $(".hamburger-menu").removeClass("off").addClass("on");
          $(".barre").removeClass("on").addClass("off");
        }
      );
      $(".continua").click(
        function() {
          $(".accedi").removeClass("on").addClass("off");
        }
      );
      $(".fa-times").click(
        function() {
          $(".hamburger-menu").removeClass("on").addClass("off");
          $(".barre").addClass("on");
        }
      );
      $(".continua").click(
        function() {
          $(".registrati").removeClass("on").addClass("off");
        }
      );
 }
 function filter_commands(){
  // BOTTONE FILTRO SERVIZI
    $(".serv").click(
        function() {
        if ($(".servizi").hasClass("off")){
            $(".servizi").removeClass("off").addClass("on")
        }
        else {
            $(".servizi").removeClass("on").addClass("off")
        }
        }
    );

    // BOTTONE FILTRO STANZE E LETTI
    $(".stanze").click(
        function() {
        if ($(".stanze_letti").hasClass("off")){
            $(".stanze_letti").removeClass("off").addClass("on")
        }
        else {
            $(".stanze_letti").removeClass("on").addClass("off")
        }
        }
    );
  }

  function init(){
    if (document.getElementById("search2")) {
      keypress()
      prova_api();
    }
    if (document.getElementById("dropin-container")) {
      create_paymethond_and_pay();
    }
    if (document.getElementById("map")) {
      turfjs();
    }
  if (document.getElementById("create2")) {
    address_to_coord('#create2', 'create');
  }
  if (document.getElementById("search2")) {
    address_to_coord('#search2', 'search');
  }
  if (document.getElementById("filtered2")) {
    address_to_coord('#filtered2', 'filtered');
  }
  if (document.getElementById("update2")) {
    address_to_coord('#update2', 'update');
  }
    if (typeof(list_of_views) != "undefined") {
      getData(list_of_views,'views','line');
    }
    if (typeof(list_of_messages) != "undefined") {
      getData(list_of_messages,'messages','line');
    }
    layout_commands();
    filter_commands();
  }
  $(document).ready(init);
