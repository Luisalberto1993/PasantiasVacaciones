/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    var Body = $('body');
    Body.addClass('preloader-site');
});
$(window).load(function () {
    $('.preloader-wrapper').fadeOut();
    $('body').removeClass('preloader-site');
});