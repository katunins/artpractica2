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

  blocksReformat();
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
  var screenWidth = document.querySelector('.portfolio-block-group').offsetWidth - 4; //ширина экрана

  var margin = 2; // расстояние между кадрами px

  if (screenWidth > 768) {
    var maxOfBlocksInLine = 3;
  } else {
    var maxOfBlocksInLine = 2;
  }

  var lastHeight = 0;

  while (i < blocks.length) {
    // высчитаем сколько карточек помещается в строке
    var countOfBlocksInLine = 0;
    var pixelSumm = 0;

    do {
      pixelSumm += Number(blocks[i + countOfBlocksInLine].getAttribute('landWidth'));
      countOfBlocksInLine++;
    } while (countOfBlocksInLine + i < blocks.length && countOfBlocksInLine < maxOfBlocksInLine);

    var blockHeight = Math.round(screenWidth / pixelSumm) - margin * 2;
    if (blockHeight > screenWidth / 2.2) blockHeight = Math.round(screenWidth / 3);
    var scale = pixelSumm / countOfBlocksInLine;

    for (var index = 0; index < countOfBlocksInLine; index++) {
      // если изображение осталось одно и оно не панорамное
      if (countOfBlocksInLine == 1) {
        if (lastHeight != 0) blockHeight = lastHeight; // blockHeight = lastHeight == 0 ? (Math.round(screenWidth / maxOfBlocksInLine / blocks[i + index].getAttribute('landWidth')) - margin * 2) : lastHeight

        blockWidth = Math.round(blockHeight * blocks[i + index].getAttribute('landWidth')); // blockWidth = Math.round(blocks[i + index].getAttribute('landWidth') / scale * screenWidth / maxOfBlocksInLine) - margin * 2
        // console.log ('loop')
        // break
      } else {
        blockWidth = Math.round(blocks[i + index].getAttribute('landWidth') / scale * screenWidth / countOfBlocksInLine) - margin * 2;
      }

      blocks[i + index].setAttribute("style", "width: " + blockWidth + "px; height: " + blockHeight + "px; margin: " + margin + "px ");
    }

    i += countOfBlocksInLine;
    lastHeight = blockHeight;
  }
}

document.addEventListener('DOMContentLoaded', function () {
  var portfolioBlock = document.querySelector('.portfolio-block-group');
  portfolioBlock.setAttribute('style', 'opacity: 0');

  window.onresize = function (event) {
    blocksReformat();
  };

  activeHREFtags = hrefTOtags(); // console.log (activeHREFtags)

  document.querySelectorAll('.tag').forEach(function (element) {
    // console.log (element.getAttribute('value'), activeHREFtags.indexOf(element.getAttribute('value'))>=0)
    if (activeHREFtags.indexOf(element.getAttribute('value')) >= 0) {
      element.classList.add('active');
    }

    element.addEventListener('click', function (event) {
      portfolioBlock.setAttribute('style', 'opacity: 0');

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
  portfolioBlock.setAttribute('style', 'opacity: 1');
});

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