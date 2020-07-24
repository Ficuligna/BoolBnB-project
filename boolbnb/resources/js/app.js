

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
  var apiKey = 'fSCco31rI9Of9Ud1l5pLOfJen1zv8Gw0';
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

function address_to_coord(button, submit, next_funct ){

  $(button).click(function(){
    var address = $("#apt_address").val();
    $('.autocomplete').hide();
    var longitude,latitude;
    $.ajax({
        url: "https://api.tomtom.com/search/2/search/"+ address +".json?",
        method: "get",
        data: {
          key: "fSCco31rI9Of9Ud1l5pLOfJen1zv8Gw0",
        },
        success: function(data){
            console.log(data.results[0]);
            if (data.results[0] != undefined) {
              var position = data.results[0]["position"];
              latitude =  position.lat;
              longitude = position.lon;
              $("#latitude").val(latitude);
              $("#longitude").val(longitude);
              if (next_funct) {
                next_funct()
              }
              if (submit) {
                document.getElementById(submit).click()
              }

            }else {
              alert("Gionni, stai provando ad hackerare il sito? E secondo te non dovevo trovarti. Ho capito. Ho gia avvisato la finanza. Corri. Tanto lo so che non hai il CIR e sei abusivo")
            }
          },
     });
    });
}



  function autocomplete(){
    $(window).ready(function() {
      $("#apt_address").on("keyup", function () {
        var keyPressed = event.keyCode || event.which;
        if (keyPressed === 13) {
            $('.autocomplete').hide();
            return false;
        }
        var address = $("#apt_address").val();
        if (address.length < 2) {
          $('.autocomplete').hide();

        }else {

          $('.autocomplete').hide();
          address = address.charAt(0).toUpperCase() + address.slice(1);
          $.ajax({
            url: "https://api.tomtom.com/search/2/search/" + address + ".json?",
            method: "GET",
            data: {
              key: "luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt"
            },
            success: function(data){
              $('.autocomplete div').html('');
              var final_address = [];
              for (var i = 0; i < data['results'].length; i++) {
                var found_address = data['results'][i]['address'];
                for (var variable in found_address) {
                  var found_address_value = found_address[variable];
                  found_address_value = found_address_value.charAt(0).toUpperCase() + found_address_value.slice(1);
                  if (found_address_value.includes(address) && !(final_address.includes(found_address_value))) {
                    final_address.push(found_address_value);
                  }
                  break;
                }
              }
              if (data['results'].length > 0) {
                $('.autocomplete').show();
              }
              if (final_address.length > 5) {
                number_autocomplete(5,final_address);
              } else {
                number_autocomplete(final_address.length,final_address);
              }
            },
            complete: function(){
              // console.log(data);
            }
          })
        }
            // return false;
      });
    });
  }
  function number_autocomplete(array_length,array) {
    for (var i = 0; i < array_length; i++) {
      $('.autocomplete div').append('<p>' + array[i] + '</p>')
    }
  }
  function click_after_autocomplete(search_button){
    $('body').on( "click", ".autocomplete div p", function(){
      var each_address = $(this).text();
      $('#apt_address').val(each_address);
      document.getElementById(search_button).click();
      $('.autocomplete').hide();
    });
  }
  //****************//


  function prova_api(){
    $.ajax({
      url:"http://localhost:8000/welcome_show",
      method: "GET",
      success: function(data){
        var apartments_found = JSON.parse(data)
        // console.log(data);
        for (var apartment of apartments_found) {
            var id = apartment["id"];
            var add_class = "sponsored_apt"
            var title = apartment["name"]
            var image_route = apartment["images"]
            var address = apartment["address"]
            var is_sponsored = "SPONSORED";
            description_characters(apartment['description'], 130);
            var print_template = set_template(add_class,title,image_route,address,is_sponsored,id,final_description);
            $("#welcome_sponsored_apt").append(print_template)

        }
      }
    })
  }
// se descrizione oltre i 300 caratteri
function description_characters(description, characters) {
    var description_hidden = "...";

    if (description.length > characters) {

        var over_description = description.substring(characters, description.length);
        final_description = description.replace(over_description, description_hidden);
        console.log(final_description);

        return final_description;
    }else{
        final_description = description;
        return final_description;
    };

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
                '#61ce4e'
              ],
              borderColor: [
                  '#1b3c59'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      stepsize:3,
                      suggestedMax: 10,
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
        url: "http://localhost:8000/token_generate",
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
        url: "http://localhost:8000/payment",
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
          console.log(speriamo);
          if (speriamo.responseText == '"successo"') {
            var data = "ok";
          } else {
            var data = "NO";
          }
          window.location.href = 'http://localhost:8000/successo/' + data ;

        }
      });
    })
}
function keypress(button,space){
    $(window).ready(function() {
          $(space).on("keypress", function (event) {
              var keyPressed = event.keyCode || event.which;
              if (keyPressed === 13) {
                event.preventDefault();
                var address = $("#apt_address").val();
                var longitude,latitude;
                document.getElementById(button).click()
                  return false;
              }
          });
    });
  }
  function layout_commands(){
    $('.navbar-toggler').click(function() {
        $(".navbar-collapse").slideToggle("slow");
      });
    $('.ham').hide();
    $(".fa-times").hide();
    $(".tasto").click(
        function() {
          $(".accedi").removeClass("off").addClass("on");
          $(".registrati").removeClass("on").addClass("off");
          $('#myModalAccedi').appendTo("body").modal('show');
        }
      );
      $(".continua").click(
        function() {
          $(".accedi").removeClass("on").addClass("off");
        }
      );

      $(".reg").click(
        function() {
          $(".registrati").removeClass("off").addClass("on");
          $(".accedi").removeClass("on").addClass("off");
          $('#myModalRegistrati').appendTo("body").modal('show');
        }
      );
      $(".continua").click(
        function() {
          $(".registrati").removeClass("on").addClass("off");
        }
      );
      $(".fa-bars").click(
        function() {
          $(".hamburger-menu").toggleClass("off");
          $(".barre").toggleClass("off");
          $(".fa-times").addClass('on');
          $(".ham").show();
          $(".fa-times").show();

        }
      );
      $(".continua").click(
        function() {
          $(".accedi").removeClass("on").addClass("off");
        }
      );
      $(".fa-times").click(
        function() {
          $(".hamburger-menu").toggleClass("off");
          $(".barre").toggleClass("off");
          $(".ham").hide();
        }
      );
      $(".continua").click(
        function() {
          $(".registrati").removeClass("on").addClass("off");
        }
      );

 }

  function filtered_search_api(){
    var add =  $('#apt_address').val();
    var latitude = $('#latitude').val();
    var longitude = $('#longitude').val();
    var search_radius = $('#search_radius').val();
    var rooms = $('#rooms').val();
    var beds = $('#beds').val();
    var services=[];
    for (var i = 0; i < $(".checkbox").length; i++) {
      if ($(".checkbox")[i].checked) {
        services.push($(".checkbox")[i].getAttribute("value"));
      }
    }
     $('#longitude').val();

    $.ajax({

      url:'http://localhost:8000/first_search',
      method:'GET',
      data: {
        add: add,
        latitude: latitude,
        longitude: longitude,
        search_radius: search_radius,
        rooms: rooms,
        beds: beds,
        services: services

      },
      success:function(data){
        $("#sponsored_apt").html("");
        $("#normal_apt").html("");

        console.log(JSON.parse(data));
        var apartments_found = JSON.parse(data)
        //qui c e da usare handlebars
        for (var apartment of apartments_found["sponsored"]) {
          var id = apartment["id"];
          var add_class = "sponsored_apt"
          var title = apartment["name"]
          var image_route = apartment["images"]
          var address = apartment["address"]
          var is_sponsored = "SPONSORED"
          var description = apartment['description']
          var print_template = set_template(add_class,title,image_route,address,is_sponsored,id,description);
          $("#sponsored_apt").append(print_template)

        }
        if(!apartments_found["sponsored"].length){
          $("#appartamenti").html("");
        };
        for (var apartment of apartments_found["normal"]) {
          var id = apartment["id"];
          var add_class = "normal_apt";
          var title = apartment["name"];
          var image_route = apartment["images"];
          var address = apartment["address"];
          var is_sponsored = "";
          var description = apartment['description']
          var print_template = set_template(add_class,title,image_route,address,is_sponsored,id,description);
          $("#normal_apt").append(print_template)
        }
      }
    });

  }
  function set_template(add_class,title,image_route,address,is_sponsored,id,description){
    var source = $("#giacomino-template").html();
    var template = Handlebars.compile(source);
    var apartment_template = {
    "id": id,
     "add_class": add_class,
     "title": title,
     "image_route": image_route,
     "address":address,
     "sponsorship": is_sponsored,
     "description": description
    }
    var print_apt = template(apartment_template);
    return print_apt;

  }
  $(window).scroll(function() {
    if ($(document).scrollTop() > 90) {
      if ($(".navbar").hasClass('scrollHeader') == false) {
        $(".navbar").css("display", "none");
        $(".navbar").addClass("scrollHeader");
         $(".navbar").removeClass("bg-light");
        $(".btn-outline-success").css({"backgroundColor":"#61ce4e", "color":"white","borderColor":"#61ce4e"} );

        $(".navbar").fadeIn(800);
      }
    } else {
      if ($(".navbar").hasClass('scrollHeader')) {
        $(".navbar").removeClass("scrollHeader");
        $(".btn-outline-success").css({"backgroundColor":"#1b3c59", "color":"white","borderColor":"#1b3c59"} );
      }
    }
  });

  function init(){
    if (document.getElementById("search_welcome2")){
      autocomplete();
      address_to_coord('#search_welcome2', 'search_welcome');
      click_after_autocomplete('search_welcome2');
      keypress("search_welcome2", "#apt_address")
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
    keypress("create2",document)
  }
  if (document.getElementById("search2")) {
    keypress("search2");

    address_to_coord('#search2', 'search');
  }
  if (document.getElementById("filtered2")) {
    autocomplete();
    keypress("filtered2","#apt_address" );
    address_to_coord('#filtered2',null, filtered_search_api);
    click_after_autocomplete("filtered2");
    filtered_search_api();
  }
  if (document.getElementById("update2")) {
    address_to_coord('#update2', 'update');
    keypress("update2", document)
  }
    if (typeof(list_of_views) != "undefined") {
      getData(list_of_views,'views','line');
    }
    if (typeof(list_of_messages) != "undefined") {
      getData(list_of_messages,'messages','line');
    }
    layout_commands();
  }
  $(document).ready(init);
