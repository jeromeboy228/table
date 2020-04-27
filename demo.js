$(document).ready(function(){
    $(".color_table tr:not(#first_tr)").addClass("colors");
    
    $(".colors:last").css("background-color", "#90ee90");
    var tr_clr = $(".colors:last").css("background-color");
    $(".colors:last").css("background-color", "white");
    
    $(".colors").hover(function(){
     if ($(this).css("background-color")!=tr_clr)
      $(this).css("background-color", "yellow")},function(){
     if ($(this).css("background-color")!=tr_clr)
      $(this).css("background-color", "white")
    });
    
    $(".colors").click(function(){
     if ($(this).css("background-color")!=tr_clr)
      $(this).css("background-color",tr_clr)
     else $(this).css("background-color","yellow")
     });
    });