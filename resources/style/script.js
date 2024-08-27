$(".dropdown-trigger").dropdown();



document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

$(document).ready(function(){
    $('.modal').modal();
  });



document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.timepicker');
    var instances = M.Timepicker.init(elems, options);
  });

$(document).ready(function(){
    $('.timepicker').timepicker();
  });



document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
});

$(document).ready(function(){
    $('.datepicker').datepicker();
});