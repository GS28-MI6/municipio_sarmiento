!function(e){var o={};function t(n){if(o[n])return o[n].exports;var i=o[n]={i:n,l:!1,exports:{}};return e[n].call(i.exports,i,i.exports,t),i.l=!0,i.exports}t.m=e,t.c=o,t.d=function(e,o,n){t.o(e,o)||Object.defineProperty(e,o,{enumerable:!0,get:n})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,o){if(1&o&&(e=t(e)),8&o)return e;if(4&o&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(t.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&o&&"string"!=typeof e)for(var i in e)t.d(n,i,function(o){return e[o]}.bind(null,i));return n},t.n=function(e){var o=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(o,"a",o),o},t.o=function(e,o){return Object.prototype.hasOwnProperty.call(e,o)},t.p="./",t(t.s=1)}([,function(e,o,t){"use strict";t.r(o),t(6);var n=t(2),i=t(3),r={nonce:helpie_faq_nonce,init:function(){this.openFirstAccordion(),this.eventHandlers(),i.init(this.nonce),n.init(),t(4).init()},eventHandlers:function(){var e=this;jQuery("body").on("click",".accordion__header",(function(o){o.preventDefault(),e.onHeaderClick(this)}))},openFirstAccordion:function(){jQuery(".helpie-faq.accordions.open-first > .accordion:first").each((function(){var e=".accordion__item:first > .accordion__header";jQuery(this).find(e).addClass("active"),jQuery(this).find(e).next(".accordion__body").stop().slideDown(300)}))},onHeaderClick:function(e){jQuery(e).hasClass("active")?this.closeAccordion(e):(jQuery(e).closest(".helpie-faq.accordions").hasClass("toggle")&&(jQuery(e).closest(".accordion").find(".accordion__header").removeClass("active"),jQuery(e).closest(".accordion").find(".accordion__body").slideUp()),this.openAccordion(e))},openAccordion:function(e){jQuery(e).addClass("active"),jQuery(e).next(".accordion__body").stop().slideDown(300);var o=jQuery(e).attr("data-id");i.clickCounter(o)},closeAccordion:function(e){jQuery(e).removeClass("active"),jQuery(e).next(".accordion__body").stop().slideUp(300)}};jQuery(document).ready((function(){r.init()}))},function(o,t){var n={searchTerm:"",typingTimer:0,doneTypingInterval:2e3,showNoFAQsLabel:!1,accordionHeader:".accordion .accordion__item .accordion__header",setSearchAttr:function(){jQuery(this.accordionHeader).each((function(){var e=jQuery(this).text().toLowerCase();0<jQuery(this).closest(".accordion").closest(".accordion__body").closest(".accordion__item").length&&(e+=" "+jQuery(this).closest(".accordion").closest(".accordion__body").closest(".accordion__item").find(".accordion__header").first().text().toLowerCase()),jQuery(this).attr("data-search-term",e)})),jQuery(".accordions .accordion__section h3").each((function(){var e=jQuery(this).text().toLowerCase();jQuery(this).attr("data-search-term",e)}))},isContentMatch:function(e,o){return 0<=jQuery(e).closest(".accordion__item").find(".accordion__body").text().toLowerCase().indexOf(o)},isTitleMatch:function(e,o){return 0<jQuery(e).filter("[data-search-term *= "+o+"]").length||o.length<1},onSearchKeyup:function(e){var o=this,t=0,n=jQuery(e).val().toLowerCase();if(o.searchTerm=jQuery(e).val().toLowerCase(),jQuery(e).closest(".accordions").find(o.accordionHeader).each((function(){var e=o.isTitleMatch(this,n),i=o.isContentMatch(this,n);if(1==(e||i)){jQuery(this).closest(".accordion__item").show();var r=jQuery(this).closest(".accordion__item").closest(".accordion__body").closest(".accordion__item");0<r.length&&r.show(),t++}else jQuery(this).closest(".accordion__item").hide()})),0==o.showNoFAQsLabel&&(jQuery(e).closest(".accordions").append("<span class='no-faqs'>No FAQs found.</span>"),o.showNoFAQsLabel=!0),0!=t&&jQuery(".no-faqs").hide(),0==t&&jQuery(".no-faqs").show(),!(n.length<1))return jQuery(e).closest(".accordions").has(".accordion__section")?(jQuery(e).closest(".accordions").find(".accordion").each((function(){var e=!1;jQuery(this).find(".accordion__item").each((function(){var t=o.isTitleMatch(this,n),i=o.isContentMatch(this,n);e=e||t||i})),0==e?jQuery(this).closest(".accordion__section").hide():jQuery(this).closest(".accordion__section").show(),1==(0<jQuery(this).closest(".accordion__section").find("h3").filter('[data-search-term *= "'+n+'"]').length||n.length<1)&&(jQuery(this).closest(".accordion__section").show(),jQuery(this).closest(".accordion__section").find(".accordion .accordion__item").show())})),n):void 0;jQuery(e).closest(".helpie-faq.accordions").find(".accordion__section").show()},onSearchKeydown:function(){if(13==e.keyCode){e.preventDefault(),e.stopPropagation();var o=jQuery("input[class=live-search-box]").val();o&&(jQuery("<li/>",{text:o,"data-search-term":o.toLowerCase()}).appendTo(jQuery("ul")),jQuery("input[class=live-search-box]").val(""))}},init:function(){var e=this;e.setSearchAttr(),jQuery("body").on("keyup",".live-search-box",(function(){var o=e.onSearchKeyup(this);clearTimeout(e.typingTimer),e.typingTimer=setTimeout((function(){var t={action:"helpie_faq_search_counter",nonce:e.nonce,searchTerm:o};jQuery.post(my_faq_ajax_object.ajax_url,t,(function(e){}))}),e.doneTypingInterval)})),jQuery("input[class=live-search-box]").keydown((function(o){e.onSearchKeydown(this),clearTimeout(e.typingTimer)}))}};o.exports=n},function(e,o){var t={init:function(){},clickCounter:function(e){this.ajaxRequest(e)},ajaxRequest:function(e){var o={action:"helpie_faq_click_counter",nonce:this.nonce,id:e};jQuery.post(my_faq_ajax_object.ajax_url,o,(function(e){}))}};e.exports=t},function(e,o,t){var n=t(5),i={init:function(){this.eventHandler()},eventHandler:function(){this.toggleForm(),this.submitForm(),"premium"==helpie_faq_plan&&n.getLoggedEmail()},submitForm:function(){var e=this;jQuery("body").on("click",".form__submit",(function(o){var t=jQuery(this).closest(".form__section"),i=t.find(".form__text").val(),r=t.find(".form__email").val(),c=t.find(".form__textarea").val(),a=t.data("woo-product"),s=t.data("kb-category"),u={action:"helpie_faq_submission",nonce:e.nonce,question:i};r&&(u.email=r),c&&(u.answer=c),a&&(u.woo_product=a),s&&(u.kb_category=s),(i&&e._isEmail(r)||i&&null==r)&&(o.preventDefault(),n.postForm(u,t))}))},toggleForm:function(){jQuery("body").on("click",".form__toggle",(function(e){var o=jQuery(this).parent().next(".form__section");o.next().hide(),this.value===faqStrings.addFAQ?(this.value=faqStrings.hide,o.show()):(this.value=faqStrings.addFAQ,o.hide())}))},_isEmail:function(e){return!!/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(e)}};e.exports=i},function(e,o){var t={postForm:function(e,o){thisModule=this,jQuery.post(my_faq_ajax_object.ajax_url,e,(function(t){var n=JSON.parse(t);"publish"==n.postStatus?(thisModule._successMessage(o),thisModule._appendItem(e,o)):"pending"==n.postStatus&&thisModule._successMessage(o)})),o.find(".form__text").val(""),o.find(".form__email").val(""),o.find(".form__textarea").val(""),"premium"==helpie_faq_plan&&thisModule.getLoggedEmail()},getLoggedEmail:function(){thisModule=this;var e={action:"helpie_faq_submission_get_logged_email",nonce:thisModule.nonce},o=jQuery(".form__section .form__email");o&&jQuery.get(my_faq_ajax_object.ajax_url,e,(function(e){var t=JSON.parse(e);t.loggedEmail&&o.val(t.loggedEmail)}))},_appendItem:function(e,o){var t=o.parent().find(".accordion"),n={action:"helpie_faq_submission_get_item",nonce:thisModule.nonce,title:e.question};n.content=e.answer?e.answer:"Empty Content",jQuery.post(my_faq_ajax_object.ajax_url,n,(function(e){var o=JSON.parse(e);t.append(o.singleItem)}))},_successMessage:function(e){e.hide(),e.next().show()}};e.exports=t},function(e,o,t){}]);
//# sourceMappingURL=main.bundle.js.map