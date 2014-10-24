$('.close_details_box_button').click(function(){
    $('.details_box').hide();
});

function showWithScaleEffect(selector)
{
    var selectedEffect = "scale";
    options = { percent:100 };
    $(selector).show(selectedEffect, options, 500);
}