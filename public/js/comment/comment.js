/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/comment/comment.js ***!
  \*****************************************/
$(document).ready(function () {
  getListComment();
  // $('#btnComment').click(function(){
  //    $.ajax({
  //       type: 'POST',
  //
  //    });
  // });
});

function renderCommentView(data) {
  data.forEach(function (element) {
    $('#post').append('<div class="row"> <span>' + element.user.first_name + '</span></div>');
    $('#post').append('<div class="row"> <p>' + element.comment + '</p></div>');
  });
}
function getListComment() {
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/list_comment',
    dataType: 'json',
    success: function success(response) {
      console.log(response.data);
      // renderCommentView(response.data.comments)
    },

    error: function error(_error) {
      console.log(_error);
    }
  });
}
/******/ })()
;