$(".recipeIcn").click(function(){
    console.log("hi");
    $(".recipeInfo").removeClass("hidden");
    $("html, body").animate({ scrollTop: $('#recipeSection').offset().top }, 1000);
});
