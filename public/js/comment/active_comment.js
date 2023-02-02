/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/js/comment/active_comment.js ***!
  \************************************************/
$(document).ready(function () {
  $('.btn_active').click(function () {
    var data = {
      'comment_id': $(this).data('comment_id')
    };
    $.ajax({
      type: 'post',
      url: 'http://localhost:8000/api/comment/active',
      data: data,
      success: function success(response) {
        location.reload();
      }
    });
  });
});
/******/ })()
;