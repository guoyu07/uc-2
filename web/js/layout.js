/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	__webpack_require__(2);
	module.exports = __webpack_require__(3);


/***/ },
/* 1 */,
/* 2 */
/***/ function(module, exports) {

	
	$('.site-seminars form').on('beforeSubmit', function(e) {
	    var form = $(this);
	    var formData = form.serialize();
	    $.ajax({
	        url: form.attr("action"),
	        type: form.attr("method"),
	        data: formData,
	        success: function (data) {
	            var btn = $('a.btn[data-seminar=' + data.attributes.seminar_id + '][data-type-id=' + data.attributes.orders_type_id + ']');
	            var btnform = btn.next().find('form');
	            var btnformpanel = btn.next().find('.panel-body');

	            var success_text = data.attributes.orders_type_id == 1 ? 'Заявка на семинар была успешно отправлена!' : 'Вопрос по семинару был успешно отправлен!';

	            btnform.remove();
	            btn.remove();
	            btnformpanel.html('<div class="form-sent"><span class="glyphicon glyphicon-ok"></span> ' + success_text + '</div>');
	        },
	        error: function () {
	            console.log("Something went wrong");
	        }
	    });
	}).on('submit', function(e){
	    e.preventDefault();
	});

	$('.site-seminars .one-form-show').click(function(){
	    if($(this).hasClass('order')) {
	        $(this).parent().find('.panel-form.order').toggle();
	    }

	    if($(this).hasClass('question')) {
	        $(this).parent().find('.panel-form.question').toggle();
	    }
	});

/***/ },
/* 3 */
/***/ function(module, exports) {

	console.log("stuff");

	$('.html-content img').each(function() {
	    $(this).addClass("img-thumbnail");
	    $(this).wrap($("<a>", {
	        href: $(this).attr('src'),
	        class: 'test',
	        'data-lightbox': 'all',
	    }));
	    $(this).show();
	});

/***/ }
/******/ ]);