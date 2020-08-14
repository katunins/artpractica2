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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/portfolio-block.js":
/*!*****************************************!*\
  !*** ./resources/js/portfolio-block.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function refreshTags() {
  console.log(66);
  var activeTags = [];
  document.querySelectorAll('.tag').forEach(function (el) {
    if (el.classList.contains('active')) {
      activeTags.push(el.getAttribute('value'));
    }
  });

  if (activeTags.length == 0) {
    document.querySelectorAll('.portfolio-block').forEach(function (block) {
      block.classList.remove('hide');
    });
  } else {
    document.querySelectorAll('.portfolio-block').forEach(function (block) {
      // let general_hide = true
      block_tags = block.getAttribute('tags').split("||");
      var general_result = 1;
      activeTags.forEach(function (acttag) {
        var result = 0;
        block_tags.forEach(function (tag) {
          if (tag == acttag) result = 1;
        });
        general_result *= result;
      });

      if (general_result == 0) {
        block.classList.add('hide');
      } else {
        block.classList.remove('hide');
      }
    });
  }
}

function hrefTOtags() {
  var tags = window.location.search; // var b = new Object();

  tags = tags.substring(1).split("&");
  return tags;
}

function tagsTOhref() {
  var href = '?';
  document.querySelectorAll('.tag').forEach(function (element) {
    if (element.classList.contains('active')) {
      if (href.toString().slice(-1) != '?') href += '&';
      href += element.getAttribute('value');
    }
  });

  if (href == '?') {
    var link = window.location.href;
    window.location.href = link.split('?')[0];
  } else {
    window.location.search = href;
  }
}

function blocksReformat() {
  // отформатируем блоки
  var blocks = document.querySelectorAll('.portfolio-block:not(.hide)');
  var i = 0;
  var screenWidth = document.querySelector('.portfolio-block-group').offsetWidth; //ширина экрана

  var maxOfBlocksInLine = 3; // максимум квадратных карточек в строке

  var margin = 3; // расстояние между кадрами
  // стандартные размеры для этого экрана

  var types = {
    pano: Math.round(screenWidth * 0.66),
    square: Math.round(screenWidth * 0.25),
    vert: Math.round(screenWidth * 0.25),
    land: Math.round(screenWidth * 0.33)
  };

  while (i < blocks.length) {
    // console.log('цикл')
    // высчитаем сколько карточек помещается в строке
    var countOfBlocksInLine = 0;
    var pixelSumm = 0;

    do {
      pixelSumm += Number(blocks[i + countOfBlocksInLine].getAttribute('landWidth'));
      countOfBlocksInLine++;
    } while (countOfBlocksInLine + i < blocks.length && countOfBlocksInLine < maxOfBlocksInLine); // в строке помещается countOfBlocksInLine блоков
    // общей шириной pixelSumm пикселей
    // let blockHeight = Math.round(screenWidth / countOfBlocksInLine)


    var blockHeight = Math.round(screenWidth / pixelSumm) - margin * 2;
    var scale = pixelSumm / countOfBlocksInLine;
    console.log('блоков', countOfBlocksInLine, pixelSumm);
    console.log('высота', blockHeight);
    console.log('scale', scale);

    for (var index = 0; index < countOfBlocksInLine; index++) {
      // console.log(blocks[i+index])
      blockWidth = Math.round(blocks[i + index].getAttribute('landWidth') / scale * screenWidth / countOfBlocksInLine) - margin * 2; // console.log('Width', blockWidth)

      blocks[i + index].setAttribute("style", "width: " + blockWidth + "px; height: " + blockHeight + "px; margin: " + margin + "px");
    }

    i += countOfBlocksInLine; // i++
  }
}

document.addEventListener('DOMContentLoaded', function () {
  activeHREFtags = hrefTOtags(); // console.log (activeHREFtags)

  document.querySelectorAll('.tag').forEach(function (element) {
    // console.log (element.getAttribute('value'), activeHREFtags.indexOf(element.getAttribute('value'))>=0)
    if (activeHREFtags.indexOf(element.getAttribute('value')) >= 0) {
      element.classList.add('active');
    }

    element.addEventListener('click', function (event) {
      if (event.target.classList.contains('active')) {
        event.target.classList.remove('active');
      } else {
        event.target.classList.add('active');
      }

      refreshTags();
      tagsTOhref();
    });
  });
  refreshTags();
  blocksReformat();
}); // let itBlock = blocks[i].getAttribute('imgType')
// let secondBlock = (i < blocks.length - 1) ? blocks[i + 1].getAttribute('imgType') : false
// let thirdBlock = (i < blocks.length - 2) ? blocks[i + 2].getAttribute('imgType') : false
// let forthBlock = (i < blocks.length - 2) ? blocks[i + 3].getAttribute('imgType') : false
// console.log(itBlock)
// console.log(secondBlock)
// //PANO
// if (itBlock.getAttribute('imgType') == 'pano' && secondBlock.getAttribute('imgType') == 'pano') {
//     // PANO + PANO
// } else { 
//     // PANO + ANY
// }
// //VERT || SQUARE
// if (itBlock.getAttribute('imgType') == 'pano') {
// }
// //VERT || SQUARE
// if (itBlock.getAttribute('imgType') == 'pano') {
// }
// //LAND
// if (itBlock.getAttribute('imgType') == 'pano') {
// }

/***/ }),

/***/ 2:
/*!***********************************************!*\
  !*** multi ./resources/js/portfolio-block.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/pavelkatunin/Documents/artpractica2/resources/js/portfolio-block.js */"./resources/js/portfolio-block.js");


/***/ })

/******/ });