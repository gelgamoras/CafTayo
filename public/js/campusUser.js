/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/campusUser.js":
/*!************************************!*\
  !*** ./resources/js/campusUser.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//Autocomplete ajax for searching for campuses in user.create
$(document).ready(function () {
  var campus = $('#campuses').tagsinput({
    itemValue: 'id',
    itemText: 'text',
    confirmKeys: [128, 149]
  }); //@error('campuses') is-invalid @enderror

  var campusParent = $('#campuses');

  if (campusParent.siblings('span').children('strong').length) {
    campusParent.siblings('.bootstrap-tagsinput').addClass('is-invalid');
  }

  if (campusParent.val() !== '') {
    var _token = $('input[name="_token"]').val();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/admin/campus/fetchCampuses",
      method: "POST",
      data: {
        query: campusParent.val(),
        _token: _token
      },
      dataType: "json",
      success: function success(data) {
        data.forEach(function (i) {
          $('#campuses').tagsinput('add', {
            id: i.id,
            text: i.name
          });
        });
      }
    });
  }

  $(campus[0].$input).keyup(function () {
    var query = $(this).val();

    if (query != '') {
      var _token = $('input[name="_token"]').val();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "/admin/campus/fetchCampus",
        method: "POST",
        data: {
          query: query,
          _token: _token
        },
        dataType: "json",
        success: function success(data) {
          var htmlMK = '<ul class="dropdown-menu autocomplete autocomplete-pos">';
          data.forEach(function (i) {
            htmlMK = htmlMK + '<li class="p-1"><a class="p-1" style="text-decoration:none;color:black" href="#">' + i.id + ' | ' + i.name + '</a></li>';
          });

          if (data.length == 0) {
            htmlMK = htmlMK + '<li class="p-1">NO RESULT FOUND</li>';
          }

          htmlMK = htmlMK + '</ul>';
          $('#campus').html(htmlMK);
          $('#campus').fadeIn();
        }
      });
    }
  });
  $(document).on('click', '#campus li', function () {
    var details = $(this).text().split('|');
    $(campus[0].$input).val('');
    $('#campuses').tagsinput('add', {
      id: details[0],
      text: details[1]
    });
    $('#campus').fadeOut();
  });
  document.getElementById("campuses").addEventListener("blur", function () {
    $('#campus').fadeOut();
  });
  $('html').click(function (e) {
    if (!$(e.target).hasClass('autocomplete')) {
      $('#campus').fadeOut();
    }
  });
});

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/js/campusUser.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/rjbobeles/Sites/caftayo_app/resources/js/campusUser.js */"./resources/js/campusUser.js");


/***/ })

/******/ });