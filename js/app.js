$(document).ready(function(){
 $('.modal').modal();
 $('.notifications').click(function(){
    $("#notification_count").hide();
  });

  $.ajax({
  		url: "http://localhost/eei0219-master/output.php",
  		method: "GET",
  		success: function(data) {
  			console.log(data);
  			var count = [];
  			var month = [];

  			for(var i in data) {
  				month.push(data[i].month);
  				count.push(data[i].count);
  			}

  			var chartdata = {
  				labels: month,
  				datasets : [
  					{
  						label: 'Ticket Count',
  						backgroundColor: '#4b75ff',
  						borderColor: 'rgba(200, 200, 200, 0.75)',
  						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
  						hoverBorderColor: 'rgba(200, 200, 200, 1)',
  						data: count
  					}
  				]
  			};

  			var ctx = $("#mycanvas");

  			var barGraph = new Chart(ctx, {
  				type: 'horizontalBar',
  				data: chartdata,
          options:{
            responsive: true,
            maintainAspectRatio: true,
            layout: {
           padding: {
               left: 50,
               right: 0,
               top: 0,
               bottom: 0
           }
         },

            scales: {
              yAxes: [{
                barThickness:15,

              }],
            xAxes: [{

                ticks: {
                    min: 0,
                    stepSize: 10
                }
            }]
        }
          }
  			});
  		},
  		error: function(data) {
  			console.log(data);
  		}
  	});


 //live searching for user access request form
 $('.search-box input[type="text"]').on("keyup input", function(){
      /* Get input value on change */
      var inputVal = $(this).val();
      var resultDropdown = $(this).siblings(".result");
      if(inputVal.length){
          $.get("php_processes/search.php", {term: inputVal}).done(function(data){
              // Display the returned data in browser
              resultDropdown.html(data);
          });
      } else{
          resultDropdown.empty();
      }
  });
 $('.btn-edit').click(function () {
    var currentTD = $(this).parents('tr').find('td');
    if ($(this).html() == 'Edit') {
        currentTD = $(this).parents('tr').find('td');
        $.each(currentTD, function () {
            $(this).prop('contenteditable', true)
        });
    } else {
       $.each(currentTD, function () {
            $(this).prop('contenteditable', false)
        });
    }
    $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')
  });


  //change pasdword
  $("#forgot-password").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'php_processes/forgot-password.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(data)
       {
         swal({
            title: "Mail Sent!",
            text: "Change password instructions has been sent to your mail " ,
            type: "success",
            icon: "success"
        }).then(function(){
          window.location="../eei0219-master/index.php";
        });
       }
      })
   });
  //change password
   $("#reset-password").submit(function(e) {
     e.preventDefault();
     $.ajax({
       url: 'php_processes/reset.php',
       type: 'POST',
       data: $(this).serialize(),
       success: function(data)
        {
           ticketNo= JSON.parse(data);
          swal({
             title: "Password Changed!" ,
                text: "Your ticket number is: " +ticketNo,
             type: "success",
             icon: "success"
         }).then(function(){
           window.location="../eei0219-master/index.php";
         });
        }
       })
    });

 $("#save-edits").submit(function(e) {
  e.preventDefault();
  $.ajax({
    url: 'php_processes/admin-edits.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function(data)
     {
       swal({
          title: "Ticket Submitted!",
          text: "Your ticket number is: " +ticketNo,
          type: "success",
          icon: "success"
      }).then(function(){
        window.location="../eei/admin-settings.php";
      });
     }
    })
 });


  // Set search input value on click of result item
  $(document).on("click", ".result p", function(){
      $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
      $(this).parent(".result").empty();
  });

  //initialize select dropdown for materialize [DO NOT REMOVE]
  $('select').material_select();

 $('.tooltipped').tooltip({delay: 50});
  // Clickable table row
  jQuery(document).ready(function($) {
  $(".clickable-row").click(function() {
      window.location = $(this).data("href");
  });


  //if service request from 'New Ticket' dropdown menu is clicked..
  $('.service').click(function(){
    $(".main-content").hide();
    $("form#service").show();
    $("form#access").hide();
    $("form#new-requestor").hide();
    $(".batcht").hide();
  });

  //if access request from 'New Ticket' dropdown menu is clicked..
  $('.access').click(function(){
    $(".main-content").hide();
    $("form#access").show();
    $("form#service").hide();
    $("form#new-requestor").hide();
    $(".batcht").hide();
  });

  $('.requestor').click(function(){
    $(".main-content").hide();
    $("form#access").hide();
    $("form#service").hide();
    $("form#new-requestor").show();
    $("form#batch-upload").hide();
  });
  // $('.batch').click(function(){
  //   $(".main-content").hide();
  //   $("form#access").hide();
  //   $("form#service").hide();
  //   $("form#new-requestor").hide();
  //   $("form#batch-upload").show();
  // });

  $('#user').click(function(){
    window.location = "myprofile.php";
  });

 //character counter for ticket Title
  $('input#input_text, textarea#textarea1').characterCounter();

  //to prevent user from typing ticket title when charcount reaches 40
  var max = 40;
  $('.title').keypress(function(e) {
      if (e.which < 0x20) {
          // e.which < 0x20, then it's not a printable character
          // e.which === 0 - Not a character
          return;     // Do nothing
      }
      if (this.value.length == max) {
          e.preventDefault();
      } else if (this.value.length > max) {
          // Maximum exceeded
          this.value = this.value.substring(0, max);
      }
  });


  //initialize datepicker of materializecss
  $('.datepicker').pickadate({
     selectMonths: false, // Creates a dropdown to control month
     selectYears: false, // Creates a dropdown of 15 years to control year,
     // today: 'Today',
     today: 'Today',
     clear: 'Clear',
     close: 'Ok',
     closeOnSelect: false // Close upon selecting a date,
   });

 //set current date to field
  var now = new Date();
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
  $('#date_prepared').val(today);
  $('#date_prepared2').val(today);

  // Sweet Alert
  $("#service").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'php_processes/service_ticket_process.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(data)
       {
         ticketNo= JSON.parse(data);
         swal({
            title: "Ticket Submitted!",
            text: "Your ticket number is: " +ticketNo,
            type: "success",
            icon: "success"
        }).then(function(){
          window.location="my-tickets.php";
          $(".main-content").show();
        });
       }
      })
   });

  $("#access").submit(function(e) {
  e.preventDefault();
  $('.preloader-wrapper').show();
  $('.preloader-background').show();
  $.ajax({
    url: 'php_processes/access_ticket_process.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function(data)
     {
       ticketNo = JSON.parse(data);
       swal({
          title: "Ticket Submitted!",
          text: "Your ticket number is: " +ticketNo,
          type: "success",
          icon: "success"
      }).then(function(){
        window.location="my-tickets.php";
      });
     }
    })
 });

 //  PHPMailer and SWAL
  $('.preloader-background').hide();
  $("#new-requestor").submit(function(e) {
    e.preventDefault();
    $('.preloader-wrapper').show();
    $('.preloader-background').show();
    $.ajax({
      url: 'php_processes/new-requestor.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(data)
       {
           name = JSON.parse(data);
           swal({
              title: "User account created!",
              text: "An email has been sent to " +name,
              type: "success",
              icon: "success"
          }).then(function(){
            window.location="manageUsers.php";
          });
       },
       complete: function(){
         $('.preloader-wrapper').hide();
       }
    })
  });
 $("#confirm").submit(function(e) {
  e.preventDefault();
  $.ajax({
    url: 'php_processes/confirm-resolution.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function(data)
     {
         swal("Ticket Closed" , "success").then(function(){
           location.reload();
         });
     }
    })
  });
 $('#datatable tbody').on('click', 'tr', function () {
   window.location = $(this).data("href");
 } );
 $("#properties").submit(function(e) {
   e.preventDefault();
   $.ajax({
     url: 'php_processes/updateType-Severity.php',
     type: 'POST',
     data: $(this).serialize(),
     success: function()
      {
         swal({
            title: "Ticket Properties Saved!",
            text: "",
            type: "success",
            icon: "success"
        }).then(function(){
          location.reload();
          $("#ticket-properties").hide();
        });
      }
   })
 });
 $("#edit-properties").submit(function(e) {
   e.preventDefault();
   $.ajax({
     url: 'php_processes/edit_ticket_properties.php',
     type: 'POST',
     data: $(this).serialize(),
     success: function()
      {
         swal({
            title: "New ticket properties saved!",
            text: "",
            type: "success",
            icon: "success"
        }).then(function(){

          location.reload();

        });

      }
   })
 });
 $("#activity_log").submit(function(e) {
   e.preventDefault();
   $.ajax({
     url: 'php_processes/activitylog_process.php',
     type: 'POST',
     data: $(this).serialize(),
     success: function()
      {
         swal({
            title: "Activity log submitted!",
            text: "",
            type: "success",
            icon: "success"
        }).then(function(){
          location.reload();
        });

      }
   })
 });

 $('.preloader-background').hide();
 $("#check").submit(function(e) {
   e.preventDefault();
   swal({
   title: "Check this ticket?",
   text: "You will not be able to undo the action.",
   icon: "warning",
   buttons: ["Close", "Confirm"],
   dangerMode: true,
 }).then((willDelete) => {
   if(willDelete){
     $('.preloader-wrapper').show();
     $('.preloader-background').show();
     $.ajax({
       url: 'php_processes/check-process.php',
       type: 'POST',
       data: $(this).serialize(),
       success: function()
        {
          swal("Ticket Checked", " ", "success").then(function(){
            location.reload();
            $(".approve-reject").hide();
          });
        }
      })
  } else {
    swal("", "Ticket is not yet checked!","error");
  }
  });
});
 $("#cancel").submit(function(e) {
   e.preventDefault();
   swal({
   title: "Are you sure?",
   text: "You will not be able to undo the action and edit the ticket.",
   icon: "warning",
   buttons: ["Close", "Confirm"],
   dangerMode: true,
  })
  .then((willDelete) => {
   if (willDelete) {
     $.ajax({
         url: 'php_processes/cancel-process.php',
         type: 'POST',
         data: $(this).serialize(),
         success: function(data)
          {
              ticket_number= JSON.parse(data);
              swal("Ticket " +ticket_number + " is cancelled", " ", "success").then(function(){
                $(".modal-trigger").hide();
                location.reload();
              });
          }
         })
   } else {
     swal("", "Ticket is not cancelled!","success");
   }
  });
 });
 $("#approve").submit(function(e) {
   e.preventDefault();
   swal({
   title: "Approve this ticket?",
   text: "You will not be able to undo the action.",
   icon: "warning",
   buttons: ["Close", "Confirm"],
   dangerMode: true,
 }).then((willDelete) => {
   if(willDelete){
     $('.preloader-wrapper').show();
     $('.preloader-background').show();
     $.ajax({
       url: 'php_processes/approve-process.php',
       type: 'POST',
       data: $(this).serialize(),
       success: function()
        {
          swal("Ticket Approved", " ", "success").then(function(){
            location.reload();
            $(".approve-reject").hide();
          });
        }
      })
  } else {
    swal("", "Ticket is not yet approved!","error");
  }
  });
});

$("#reject").submit(function(e) {
  e.preventDefault();
  swal({
  title: "Reject this ticket?",
  text: "Ticket will be closed and you will not be able to undo the action.",
  icon: "warning",
  buttons: ["Close", "Confirm"],
  dangerMode: true,
}).then((willDelete) => {
  if(willDelete){
    $('.preloader-wrapper').show();
    $('.preloader-background').show();
    $.ajax({
      url: 'php_processes/reject-process.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function()
       {
         swal("Ticket Rejected", " ", "success").then(function(){
           location.reload();
           $(".approve-reject").hide();
         });
       }
     })
 } else {
   swal("", "Ticket is not yet rejected!","error");
 }
 });
});
 $("#assignee").submit(function(e) {
   e.preventDefault();
   $.ajax({
     url: 'php_processes/assign-ticket.php',
     type: 'POST',
     data: $(this).serialize(),
     success: function(data)
      {
        assignee= JSON.parse(data);
        swal({
           title: "Ticket Agent Assigned!",
           text: "Ticket agent is now " +assignee,
           type: "success",
           icon: "success"
       }).then(function(){
         location.reload();
       });
      }
     })
 });
 $( "#reassign-button" ).click(function() {
   $( "#reassign" ).toggle( "slow" );
 });
 $( ".btn-activitylog" ).click(function() {
    $( ".comment_input" ).toggle( "slow" );
  });
 $('.edit-button').click(function () {
   for (i = 0; i < 5; i++) {
     document.getElementsByClassName('pflBody')[i].contentEditable = true;
   }
   });

  $("#btn-cancel").click(function(){
   location.reload();
 });
 $(".accesstickets").click(function(){
   $(".technicals-tickets").hide();
   $(".network-tickets").hide();
   $(".all-tickets").hide();
   $(".access-tickets").show();
 });

});
});
