"use strict";

// Setting Color
$(window).resize(function() {
    $(window).width();
});

// Apply stored settings on page load
$(document).ready(function() {
    // Retrieve and apply main header color
    var mainHeaderColor = localStorage.getItem('mainHeaderColor');
    if (mainHeaderColor) {
        if (mainHeaderColor == 'default') {
            $('.main-header').removeAttr('data-background-color');
        } else {
            $('.main-header').attr('data-background-color', mainHeaderColor);
        }
    }

    // Retrieve and apply background color
    var bodyBackgroundColor = localStorage.getItem('bodyBackgroundColor');
    if (bodyBackgroundColor) {
        $('body').attr('data-background-color', bodyBackgroundColor);
    }

    // Set selected classes for main header color
    $('.changeMainHeaderColor').each(function() {
        if ($(this).attr('data-color') == mainHeaderColor) {
            $(this).addClass('selected');
        }
    });

    // Set selected classes for background color
    $('.changeBackgroundColor').each(function() {
        if ($(this).attr('data-color') == bodyBackgroundColor) {
            $(this).addClass('selected');
        }
    });
});

$('.changeMainHeaderColor').on('click', function(){
    var color = $(this).attr('data-color');
    if (color == 'default') {
        $('.main-header').removeAttr('data-background-color');
    } else {
        $('.main-header').attr('data-background-color', color);
    }
    $(this).parent().find('.changeMainHeaderColor').removeClass("selected");
    $(this).addClass("selected");

    // Store the color setting
    localStorage.setItem('mainHeaderColor', color);
});

$('.changeBackgroundColor').on('click', function(){
    var color = $(this).attr('data-color');
    $('body').removeAttr('data-background-color');
    $('body').attr('data-background-color', color);
    $(this).parent().find('.changeBackgroundColor').removeClass("selected");
    $(this).addClass("selected");

    // Store the color setting
    localStorage.setItem('bodyBackgroundColor', color);
});

var toggle_customSidebar = false,
    custom_open = 0;

if (!toggle_customSidebar) {
    var toggle = $('.custom-template .custom-toggle');

    toggle.on('click', (function(){
        if (custom_open == 1){
            $('.custom-template').removeClass('open');
            toggle.removeClass('toggled');
            custom_open = 0;
        }  else {
            $('.custom-template').addClass('open');
            toggle.addClass('toggled');
            custom_open = 1;
        }
    }));
    toggle_customSidebar = true;
}
