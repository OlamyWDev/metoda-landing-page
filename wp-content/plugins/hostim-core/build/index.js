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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/contact-info/index.js":
/*!***********************************!*\
  !*** ./src/contact-info/index.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('hostim-block/hostim-contact-info-widget', {
  title: 'Hostim Contact Info Widget',
  icon: 'phone',
  category: 'widgets',
  keywords: ['contact info', 'hostim', 'contact'],
  attributes: {
    title: {
      type: 'string',
      source: 'html',
      selector: 'h4'
    },
    iconColor: {
      type: 'string'
    },
    textColor: {
      type: 'string'
    },
    phone: {
      type: 'string',
      source: 'html',
      selector: '.hostim-block-phone-number'
    },
    email: {
      type: 'string',
      source: 'html',
      selector: '.hostim-block-email-id'
    },
    location: {
      type: 'string',
      source: 'html',
      selector: '.hostim-block-location-address'
    },
    showSociallinks: {
      type: 'boolean',
      default: false
    },
    facebook: {
      type: 'string',
      source: 'attribute',
      selector: '.ultraland-social-facebook',
      attribute: 'href'
    },
    twitter: {
      type: 'string',
      source: 'attribute',
      selector: '.ultraland-social-twitter',
      attribute: 'href'
    },
    instagram: {
      type: 'string',
      source: 'attribute',
      selector: '.ultraland-social-instagram',
      attribute: 'href'
    },
    dribbble: {
      type: 'string',
      source: 'attribute',
      selector: '.ultraland-social-dribbble',
      attribute: 'href'
    },
    linkedin: {
      type: 'string',
      source: 'attribute',
      selector: '.ultraland-social-linkedin',
      attribute: 'href'
    }
  },
  supports: {
    color: true // Enables background and text

  },
  edit: ({
    attributes,
    setAttributes
  }) => {
    const {
      title,
      phone,
      email,
      location,
      facebook,
      twitter,
      instagram,
      dribbble,
      linkedin,
      iconColor,
      textColor,
      showSociallinks
    } = attributes;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Style')
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["ColorPalette"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Icon Color'),
      value: iconColor,
      onChange: colorValue => setAttributes({
        iconColor: colorValue
      }),
      allowReset: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["ColorPalette"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Text Color'),
      value: textColor,
      onChange: colorValue => setAttributes({
        textColor: colorValue
      }),
      allowReset: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Social Links')
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Show Social-links'),
      value: showSociallinks,
      checked: showSociallinks,
      onChange: val => setAttributes({
        showSociallinks: val
      })
    }), showSociallinks && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Facebook'),
      value: facebook,
      onChange: val => setAttributes({
        facebook: val
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Twitter'),
      value: twitter,
      onChange: val => setAttributes({
        twitter: val
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Instagram'),
      value: instagram,
      onChange: val => setAttributes({
        instagram: val
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Dribbble'),
      value: dribbble,
      onChange: val => setAttributes({
        dribbble: val
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Linkedin'),
      value: linkedin,
      onChange: val => setAttributes({
        linkedin: val
      })
    })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ultraland_block_contact_info_widget"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("ul", {
      className: "hostim-block-contact-info"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      className: "hostim-block-phone"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fas fa-phone-alt",
      style: {
        color: iconColor
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      key: "phone",
      className: "icon-label hostim-block-phone-number",
      tagName: "span",
      value: phone,
      allowedFormats: ['core/bold', 'core/italic'],
      onChange: phone => setAttributes({
        phone
      }),
      placeholder: "Phone..."
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      className: "hostim-block-email"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "far fa-envelope"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      key: "email",
      className: "hostim-block-email-id",
      tagName: "span",
      value: email,
      allowedFormats: ['core/bold', 'core/italic'],
      onChange: email => setAttributes({
        email
      }),
      placeholder: "Email..."
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      className: "hostim-block-location"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fas fa-map-marker-alt"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      key: "location",
      className: "hostim-block-location-address",
      tagName: "span",
      value: location,
      allowedFormats: ['core/bold', 'core/italic'],
      onChange: location => setAttributes({
        location
      }),
      placeholder: "Location..."
    }))), showSociallinks && (facebook || twitter || instagram || linkedin || dribbble || title) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      key: "title",
      className: "hostim-block-social-title",
      tagName: "h4",
      value: title,
      allowedFormats: ['core/bold', 'core/italic'],
      onChange: title => setAttributes({
        title
      }),
      placeholder: "Social Title..."
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("ul", {
      className: "hostim-block-social-link"
    }, facebook && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      className: "ultraland-social-facebook"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fab fa-facebook"
    }))), twitter && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      className: "ultraland-social-twitter"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fab fa-twitter"
    }))), instagram && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      className: "ultraland-social-instagram"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fab fa-instagram"
    }))), linkedin && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      className: "ultraland-social-linkedin"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fab fa-linkedin"
    }))), dribbble && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      className: "ultraland-social-dribbble"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fab fa-dribbble"
    })))))));
  },
  save: ({
    attributes
  }) => {
    const {
      title,
      phone,
      email,
      location,
      facebook,
      twitter,
      instagram,
      linkedin,
      dribbble,
      iconColor,
      textColor,
      showSociallinks
    } = attributes;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ultraland_block_contact_info_widget"
    }, (phone || email || location) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("ul", {
      className: "hostim-block-contact-info"
    }, phone && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      className: "hostim-block-phone"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "feather-phone",
      style: {
        color: iconColor
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "hostim-block-phone-number",
      style: {
        color: textColor
      }
    }, phone)), email && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      className: "hostim-block-email"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "feather-mail",
      style: {
        color: iconColor
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "hostim-block-email-id",
      style: {
        color: textColor
      }
    }, email)), location && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      className: "hostim-block-location"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "feather-map-pin",
      style: {
        color: iconColor
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "hostim-block-location-address",
      style: {
        color: textColor
      }
    }, " ", location))), showSociallinks && (facebook || twitter || instagram || linkedin || dribbble || title) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h4", {
      className: "hostim-block-social-title"
    }, title), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("ul", {
      className: "hostim-block-social-link"
    }, facebook && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: facebook,
      className: "ultraland-social-facebook",
      target: "_blank",
      rel: "noopener noreferrer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fa fa-facebook"
    }))), twitter && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: twitter,
      className: "ultraland-social-twitter",
      target: "_blank",
      rel: "noopener noreferrer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fa fa-twitter"
    }))), instagram && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: instagram,
      className: "ultraland-social-instagram",
      target: "_blank",
      rel: "noopener noreferrer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fa fa-instagram"
    }))), linkedin && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: linkedin,
      className: "ultraland-social-linkedin",
      target: "_blank",
      rel: "noopener noreferrer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fa fa-linkedin"
    }))), dribbble && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      href: dribbble,
      className: "ultraland-social-dribbble",
      target: "_blank",
      rel: "noopener noreferrer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("i", {
      className: "fa fa-dribbble"
    })))))));
  }
});

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _newsletter_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./newsletter/index */ "./src/newsletter/index.js");
/* harmony import */ var _contact_info_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./contact-info/index */ "./src/contact-info/index.js");
// import './about-widget/index';



/***/ }),

/***/ "./src/newsletter/index.js":
/*!*********************************!*\
  !*** ./src/newsletter/index.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])('hostim-block/newsletter-widget', {
  title: 'Hostim Newsletter',
  'icon': 'email-alt',
  'category': 'common',
  'keywords': ['newsletter', 'hostim', 'content box'],
  attributes: {
    title: {
      type: 'string'
    },
    content: {
      type: 'string'
    },
    btn_text: {
      type: 'string'
    }
  },
  edit: ({
    attributes,
    setAttributes
  }) => {
    const {
      content,
      btn_text
    } = attributes;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__["useBlockProps"])(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Newsletter Widget Content', 'hostim-core')
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Description', 'hostim-core'),
      value: content,
      onChange: content => setAttributes({
        content
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Button Text', 'hostim-core'),
      value: btn_text,
      onChange: btn_text => setAttributes({
        btn_text
      })
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Disabled"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default.a, {
      block: "hostim-block/newsletter-widget",
      attributes: attributes
    }))));
  }
});

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/server-side-render":
/*!******************************************!*\
  !*** external ["wp","serverSideRender"] ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["serverSideRender"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map